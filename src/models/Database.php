<?php

/**
 * Fonction permettant de se connecter à la base de données
 * @return PDO
 */
function connect()
{
	try {
		return new PDO('mysql:host=172.18.0.2;dbname=tp;charset=utf8', 'root', 'pw');
	} catch (Exception $e) {
		// Si la tentative échoue on termine le script courant avec die en affichant un message d'érreur récupérer dans l'exception $e
		die('Erreur : ' . $e->getMessage());
	}
}
