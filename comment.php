<?php

class Comment extends Entity
{

	private  $_author,
			 $_content,
			 $_publishedDate,
			 $_authorMail,
			 $_status = published; // Commentaire : publié ou signalé

	//SETTERS

	public function setAuthor($author) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setContent($content) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setPublishedDate(DateTime $pubishedDate) {

	}

	public function setAuthorMail($authorMail) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setStatus($status) {
		/*Vérifier que la valeur soit bien de type string et non vide */
		/*Vérifier que la valoir soit : soit 'published' soit 'reported'*/

	}

	// GETTERS

	public function author() {
		return $this->_author;
	}

	public function content() {
		return $this->_content;
	}

	public function publishedDate() {
		return $this->_publishedDate;
	}

	public function authorMail() {
		return $this->_authorMail;
	}

	public function status() {
		return $this->_status;
	}


}
?>