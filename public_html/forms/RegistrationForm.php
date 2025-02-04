<?php

class RegistrationForm {
	private $username;
	private $password;
	private $passwordConfirm;
	/**
	 * @param array $data
	 */
	function __construct( Array $data ) {
		$this->username        = isset( $data['username'] ) ? $data['username'] : null;
		$this->password        = isset( $data['password'] ) ? $data['password'] : null;
		$this->passwordConfirm = isset( $data['passwordConfirm'] ) ? $data['passwordConfirm'] : null;
	}

	public function validate() {
		return ! empty( $this->username ) && ! empty( $this->password ) && ! empty( $this->passwordConfirm ) && $this->passwordsMatch();
	}

	public function passwordsMatch() {
		return $this->password == $this->passwordConfirm;
	}


	/**
	 * @return mixed
	 */
	public function getPasswordConfirm() {
		return $this->passwordConfirm;
	}

	/**
	 * @param mixed $passwordConfirm
	 */
	public function setPasswordConfirm( $passwordConfirm ) {
		$this->passwordConfirm = $passwordConfirm;
	}


	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword( $password ) {
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername( $username) {
		$this->username = $username;
	}


}