<?php

declare(strict_types=1);

namespace App\UI\Home;

use Nette;
use App\Model\UserFacade;
use Nette\Application\UI\Form;
use App\UI\Accessory\FormFactory;
use App\Model\DuplicateNameException;
use App\Model\DuplicateEmailException;

final class HomePresenter extends Nette\Application\UI\Presenter
{
    /**
	 * Dependency injection of the database.
	 */
	public function __construct(
		private UserFacade $facade,
		private FormFactory $formFactory,
	) {
	}

	/**
	 * Create a registration form with fields for username, email, and password.
	 * On successful submission, the user is redirected to the dashboard.
	 */
	protected function createComponentRegistrationForm(): Form
	{
		$form = $this->formFactory->getCreateForm();

		// Handle form submission
		$form->onSuccess[] = function (Form $form, \stdClass $data): void {
			try {
				// Attempt to register a new user
				$this->facade->add($data->username, $data->email, $data->password);
				$this->flashMessage('User ' . $data->username . ' successfully registered.');

				$activateUrl = $this->getHttpRequest()->getUrl()->getHost() . '/www/user/activate?username=' . $data->username;
				$mail = new Nette\Mail\Message;
				$mail->setFrom('Nette registration <test@example.com>')
					->addTo($data->email)
					->setSubject('Register Confirmation')
					->setHtmlBody("Hello, Your have been registered on site. Visit link to activete account <a href='" . $activateUrl . "'>Activate</a>");
				$mailer = new Nette\Mail\SendmailMailer;
				$mailer->send($mail);

				$this->redirect('Home:dashboard');
			} catch (\Exception $e) {

				if ($e instanceof DuplicateNameException) {
					// Handle the case where the username is already taken
					$form['username']->addError('Username is already taken.');
				}

				if ($e instanceof DuplicateEmailException) {
					// Handle the case where the email is already taken
					$form['email']->addError('Email is already taken.');
				}
			}
		};

		return $form;
	}

	public function renderDashboard(): void
	{
		$this->template->users = $this->facade
			->getAllUsers();
	}
}
