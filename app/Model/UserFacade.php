<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Passwords;


/**
 * Facade for handling operations related to user.
 */
final class UserFacade
{
	/**
	 * Dependency injection of the database.
	 */
	public function __construct(
		private Nette\Database\Explorer $database,
		private Passwords $passwords,
	) {}

	/**
	 * Add a new user to the database.
	 * Throws a DuplicateNameException if the username is already taken.
	 */
	public function add(string $username, string $email, string $password): void
	{
		// Validate the email format
		Nette\Utils\Validators::assert($email, 'email');

		$this->isValidUsername($username, '');
		$this->isValidEmail($email, '');

		// Attempt to insert the new user into the database
		$this->database->table('users')->insert([
			'username' 	=> $username,
			'password' 	=> $this->passwords->hash($password),
			'email' 	=> $email,
			'is_active' => 0,
		]);
	}

	public function update(string $id, $data): void
	{
		$this->isValidUsername($data['username'], $id);
		$this->isValidEmail($data['email'], $id);

		if (empty($data['password'])) {
			unset($data['password']);
		} else {
			$data['password'] = $this->passwords->hash($data['password']);
		}
		$user = $this->database
			->table('users')
			->get($id);
		$user->update($data);
	}

	public function delete(string $id): void
	{
		$user = $this->database
			->table('users')
			->get($id);
		$user->delete();
	}

	public function getUserById($id)
	{
		return $this->database->table('users')->get($id);
	}

	public function getUserByUsername($username)
	{
		return $this->database->table('users')->get(['username' => $username]);
	}

	public function getUserByEmail($email)
	{
		return $this->database->table('users')->get(['email' => $email]);
	}

	public function isValidUsername($username, $id)
	{
		$user = $this->getUserByUsername($username);

		if ($user === null || $user->id == $id) {
			return;
		} else {
			throw new DuplicateNameException();
		}
	}

	public function isValidEmail($email, $id)
	{
		$user = $this->getUserByEmail($email);

		if ($user === null || $user->id == $id) {
			return;
		} else {
			throw new DuplicateEmailException();
		}
	}


	/**
	 * Fetches all users.
	 * Users are ordered by username.
	 */
	public function getAllUsers()
	{
		return $this->database
			->table('users')
			->order('id ASC');
	}
}

/**
 * Custom exception for duplicate usernames.
 */
class DuplicateNameException extends \Exception {}

/**
 * Custom exception for duplicate email.
 */
class DuplicateEmailException extends \Exception {}
