<?php

class ChapterManager {


	private  $_bd;

	public function construct($db) {

	}

	public function add(chapter $chapter) {
		/*Préparer la requête*/
		/*Assigner les valeurs*/
		/*Exécuter la requête*/

	}

	public function update(chapter $chapter) {
		/*Préparer la requête*/
		/*Modifier les valeurs*/
		/*Exécuter la requête*/

	}

	public function delete($id) {
		/*Récupérer l'identifiant de type int*/
		/*Préparer la requête*/
		/* ... */
		/*Exécuter la requête*/

	}

	public function save(chapter $chapter) {
		/*Vérifier la validité du chapitre*/
		/*S'il est nouveau : l'ajouter, s'il existe déjà : le modifier*/

	}

	public function publish(chapter $chapter) {


	}

	public function countDrafts() {
		/*Requête : compter le nombre de chapitres dont le statut est 'draft'*/

	}

	public function countPublished() {
		/*Requête : compter le nombre de chapitres dont le statut est 'published'*/

	}

	public function countChapters() {
		/*Requête : compter le nombre de chapitres total*/

	}


	/**
	 * Obtenir un chapitre selon son identifiant

	 */
	public function getUnique($id) {
		/*Récupérer l'identifiant de type int*/
		/*Préparer la requête*/
		/* ... */
		/*Exécuter la requête*/


	}

	/**
	 * Obtenir la liste de tous les chapitres
	 */
	public function getList() {

	}

	public function setDb(PDO $db) {

	}


}
?>