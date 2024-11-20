<?php

declare(strict_types=1);

namespace App\UI\User;

use Nette;
use App\Model\UserFacade;
use App\Model\DuplicateNameException;
use App\Model\DuplicateEmailException;
use App\UI\Accessory\FormFactory;
use Nette\Application\UI\Form;

/**
 * Presenter for displaying and managing individual users.
 */
final class UserPresenter extends Nette\Application\UI\Presenter
{
	/**
	 * Dependency injection of the database.
	 */
	public function __construct(
		private UserFacade $userFacade,
		private FormFactory $formFactory,
	) {
	}

	/**
	 * Create a add form with fields for username, email, and password.
	 * On successful submission, the user is redirected to the dashboard.
	 */
	protected function createComponentCreateForm(): Form
	{
		$form = $this->formFactory->getCreateForm();

		// Handle form submission
		$form->onSuccess[] = function (Form $form, \stdClass $data): void {
			try {
				// Attempt to register a new user
				$this->userFacade->add($data->username, $data->email, $data->password);
				$this->flashMessage('New user ' . $data->username . ' created.');
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

	protected function createComponentEditForm(): Form
	{
		$form = $this->formFactory->getEditForm();

		// Handle form submission
		$form->onSuccess[] = function (Form $form, \stdClass $data): void {
			try {
				$id = $this->getParameter('id');
				$this->userFacade->update($id, [
					'username' => $data->username, 
					'email' => $data->email, 
					'password' => $data->password,
					'is_active' => $data->is_active ? 1 : 0,
				]);	
				$this->flashMessage('User ' . $data->username . ' edited.');
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

	protected function createComponentDeleteForm(): Form
	{
		$form = $this->formFactory->getDeleteForm();

		// Handle form submission
		$form->onSuccess[] = function (Form $form, \stdClass $data): void {
			if ($form['send']->isSubmittedBy()) {
				$id = $this->getParameter('id');

				if ($id !== null) {
					$this->userFacade->delete($id,);	
					$this->flashMessage('User deleted.');
				} else {
					$this->error('User not found');
				}
				
			}

			$this->redirect('Home:dashboard');
		};

		return $form;
	}

	public function actionActivate(string $username) {
		$user = $this->userFacade->getUserByUsername($username);

		if ($user !== null) {
			$this->userFacade->update((string)$user->id, [
				'username' => $user->username,
				'is_active' => 1,
			]);
			$this->flashMessage('User activated.');
			$this->redirect('Home:dashboard');
		}
	}

	/**
	 * Render the edit view for a specific user.
	 */
	public function renderEdit(int $id): void
	{
		$user = $this->userFacade->getUserById($id);

		if (!$user) {
			$this->error('User not found');
		}

		$this->getComponent('editForm')->setDefaults($user->toArray());
	}

	public function renderDelete(int $id): void 
	{
		$user = $this->userFacade->getUserById($id);
	}

	/**
	 * Fetches the user, then sends them to the template.
	 */
	public function renderShow(int $id): void
	{
		$user = $this->userFacade->getUserById($id);
		if (!$user) {
			$this->error('User not found');
		}

		$this->template->item = $user;
	}

}