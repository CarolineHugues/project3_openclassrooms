<?php

class Chapter {

	private  $_id,
			 $_title,
			 $_author,
			 $_content,
			 $_excerpt,
			 $_addDate,
			 $_updateDate,
			 $_publishedDate,
	         $_status = draft; // Chapitre : brouillon ou publié


	public function construct($donnees) {

	}

	public function hydrate($donnes) {

	}

	// SETTERS

	public function setId($id) {
		/*Vérifier que la valeur soit de type int*/

	}

	public function setTitle($title) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setAuthor($author) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setContent($content) {
		/*Vérifier que la valeur soit bien de type string et non vide */

	}

	public function setExcerpt($excerpt) {
		/*Vérifier que la valeur soit bien de type string et non vide */
		/*Vérifier que le texte ne dépasse pas un certain nombre de caractères */

	}

	public function setAddDate(DateTime $addDate) {

	}

	public function setUpdateDate(DateTime $updateDate) {

	}

	public function setPublishedDate(DateTime $publishedDate) {

	}

	public function setStatus($status) {
		/*Vérifier que la valeur soit bien de type string et non vide */
		/*Vérifier que la valoir soit : soit 'draft' soit 'published', selon que le chapitre est publié ou non */

	}



	// GETTERS
	
	public function id() {
		return $this->_id;
	}

	public function title() {
		return $this->_title;
	}

	public function author() {
		return $this->_author;
	}

	public function content() {
		return $this->_content;
	}

	public function excerpt() {
		return $this->_excerpt;
	}

	public function addDate() {
		return $this->_addDate;

	}

	public function updateDate() {
		return $this->_updateDate;
	}

	public function publishedDate() {
		return $this->_publishedDate;
	}

	public function status() {
		return $this->_status;
	}


}
?>