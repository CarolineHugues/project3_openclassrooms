<?php

class User {

	private  $_id,
			 $_name,
			 $_firstname,
			 $_login,
			 $_password,
			 $_email,
			 $_avatar;

	public function construct($donnees) {

	}

	public function hydrate($donnees) {

	}

	//SETTERS

	public function setId($id) {
		/*Vérifier que la valeur soit de type int*/

	}

	public function setName($name) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function SetFirstname($firstname) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setLogin($login) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setPassword($password) {
		/*Vérifier que la valeur soit bien de type string et non vide */
		/*Vérifier que sa longueur soit d'un certain nombre de caractères*/

	}

	public function setEmail($email) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setAvatar($avatar) {
		/*Vérifier que l'attribut ne soit pas vide*/
		/*Vérifier l'extension du fichier, qu'il s'agisse bien d'un format image */

	}


	// GETTERS

	public function id() {
		return $this->_id;
	}

	public function name() {
		return $this->_name;
	}

	public function firstname() {
		return $this->_firstname;
	}

	public function login() {
		return $this->_login;
	}

	public function password() {
		return $this->_password;
	}

	public function email() {
		return $this->_email;
	}

	public function avatar() {
		return $this->_avatar;
	}


}
?>