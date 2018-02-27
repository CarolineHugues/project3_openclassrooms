<?php

class CommentManager {

	private  $_db;

	public function __construct($db) {

	}

	public function add(comment $comment) {
		/*Préparer la requête*/
		/*Assigner les valeurs*/
		/*Exécuter la requête*/

	}

	public function delete($id) {
		/*Récupérer l'identifiant de type int*/
		/*Préparer la requête*/
		/* ... */
		/*Exécuter la requête*/

	}

	public function countComments() {
		/*Requête : compter le nombre de commentaires */

	}

	public function countReportedComments() {
		/*Requête : compter le nombre de commentaires signalés*/

	}


	/**
	 * Les utilisateurs peuvent signaler les commentaires indésirables
	 */
	public function reportComment() {
		/*Modifier le statut en signalé*/

	}

	public function get($id) {

	}

	public function getList() {

	}

	public function setDb(PDO $db) {

	}


}
?>