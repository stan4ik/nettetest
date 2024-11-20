<?php

declare(strict_types=1);

namespace App\UI\Accessory;

use Nette;
use Nette\Application\UI\Form;


/**
 * Factory for creating general forms with CSRF protection.
 */
final class FormFactory
{
	/**
	 * Create a new form instance. Add CSRF protection.
	 */
	public function create(): Form
	{
		$form = new Form;
		$form->addProtection();

		return $form;
	}

	public function getCreateForm(): Form
	{
		$form = $this->create();
		$form->addText('username', 'Pick a username:')
			->setRequired('Please pick a username.')
			->setHtmlAttribute('class', 'form-control');

		$form->addEmail('email', 'Your e-mail:')
			->setRequired('Please enter your e-mail.')
			->setHtmlAttribute('class', 'form-control');

		$form->addPassword('password', 'Create a password:')
			->setOption('description', 'at least 6 characters')
			->setRequired('Please create a password.')
			->addRule($form::MinLength, null, 6)
			->addRule($form::Pattern, 'Must contain number', '.*[0-9].*')
			->setHtmlAttribute('class', 'form-control');

		$form->addSubmit('send', 'Sign up')
			->setHtmlAttribute('class', 'btn btn-primary');

		return $form;
	}

	public function getEditForm(): Form
	{
		$form = $this->create();
		$form->addText('username', 'Username:')
			->setHtmlAttribute('class', 'form-control');

		$form->addEmail('email', 'Email:')
			->setHtmlAttribute('class', 'form-control');

		$form->addPassword('password', 'Password:')
			->setOption('description', 'at least 6 characters')
			->addRule($form::MinLength, null, 6)
			->addRule($form::Pattern, 'Must contain number', '.*[0-9].*')
			->setHtmlAttribute('class', 'form-control');

		$form->addCheckbox('is_active', 'Is active?');

		$form->addSubmit('send', 'Edit')
			->setHtmlAttribute('class', 'btn btn-primary');

		return $form;
	}

	public function getDeleteForm(): Form
	{
		$form = $this->create();
		$form->addSubmit('send', 'Delete')
			->setHtmlAttribute('class', 'btn btn-danger');

		$form->addSubmit('no', 'No')
			->setHtmlAttribute('class', 'btn btn-primary');

		return $form;
	}
}
