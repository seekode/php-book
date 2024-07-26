<?php
require_once 'models/Database.php';

/**
 * Create a like
 * @param int $idBook id of the book
 * @return bool if the like is created
 */
function newLike($idBook, $idUser)
{
	$db = connect();

	$sql = "INSERT INTO `likes`(`id_books`, `id_users`) VALUES (:idBook, :idUser)";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':idBook', $idBook, PDO::PARAM_INT);
	$queryExecute->bindValue(':idUser', $idUser, PDO::PARAM_INT);

	return $queryExecute->execute();
}

/**
 * Delete a like
 * @param int $idBook id of the book
 * @param int $idUser id of the user
 * @return bool if the like is deleted
 */
function deleteLike($idBook, $idUser)
{
	$db = connect();

	$sql = "DELETE FROM `likes` WHERE `id_books` = :idBook AND `id_users` = :idUser";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':idBook', $idBook, PDO::PARAM_INT);
	$queryExecute->bindValue(':idUser', $idUser, PDO::PARAM_INT);

	return $queryExecute->execute();
}

/**
 * Get all likes of a book
 * @param int $idBook id of the book
 * @return array of objects
 */
function getLikes($idBook)
{
	$db = connect();

	$sql = "SELECT * FROM `likes` WHERE `id_books` = :idBook";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':idBook', $idBook, PDO::PARAM_INT);

	$queryExecute->execute();
	return $queryExecute->fetchAll(PDO::FETCH_OBJ);
}

/**
 * Check if a user like a book
 * @param int $idBook id of the book
 * @param int $idUser id of the user
 * @return bool if the user like the book
 */
function isLiked($idBook, $idUser)
{
	$db = connect();

	$sql = "SELECT * FROM `likes` WHERE `id_books` = :idBook AND `id_users` = :idUser";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':idBook', $idBook, PDO::PARAM_INT);
	$queryExecute->bindValue(':idUser', $idUser, PDO::PARAM_INT);

	$queryExecute->execute();
	$result = $queryExecute->fetch(PDO::FETCH_OBJ);
	return $result ? true : false;
}
