<?php
require 'models/Database.php';

/**
 * Get all books
 * @return array of objects
 */
function getBooks()
{
	$db = connect();

	$sql = "SELECT `books`.`id`, `name`, `description`, `id_categories`, `books`.`id_users`, COUNT(`likes`.`id`) as `nb_likes` FROM `books`
	LEFT JOIN `likes`
	ON `likes`.`id_books` = `books`.`id`
	GROUP BY `books`.`id`;
	";
	$queryExecute = $db->prepare($sql);
	$queryExecute->execute();
	return $queryExecute->fetchAll(PDO::FETCH_OBJ);
}

/**
 * Get all books
 * @param int $id id of the book
 * @return object
 */
function getBook($id)
{
	$db = connect();

	$sql = "SELECT * FROM `books` WHERE `id` = :id";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':id', $id, PDO::PARAM_INT);

	$queryExecute->execute();
	return $queryExecute->fetch(PDO::FETCH_OBJ);
}

/**
 * Get all books of a user
 * @param int $idUser id of the user
 * @return array of objects
 */
function getBooksOfUser($idUser)
{
	$db = connect();

	$sql = "SELECT * FROM `books` WHERE `id_users` = :idUser";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':idUser', $idUser, PDO::PARAM_INT);

	$queryExecute->execute();
	return $queryExecute->fetchAll(PDO::FETCH_OBJ);
}

/**
 * Get all books of a category
 * @param int $idCategory id of the category
 * @return array of objects
 */
function getBooksByCategory($idCategory)
{
	$db = connect();

	$sql = "SELECT * FROM `books` WHERE `id_categories` = :idCategory";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':idCategory', $idCategory, PDO::PARAM_INT);

	$queryExecute->execute();
	return $queryExecute->fetchAll(PDO::FETCH_OBJ);
}

/**
 * Create a book
 * @param string $name name of the book
 * @param string $description description of the book
 * @param int $idCategory id of the category
 * @param int $idUser id of the user
 * @return bool if the book is created
 */
function createBook($name, $description, $idCategory, $idUser)
{
	$db = connect();

	$sql = "INSERT INTO `books`(`name`, `description`, `id_categories`, `id_users`) VALUES (:name, :description, :idCategory, :idUser)";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':name', $name, PDO::PARAM_STR);
	$queryExecute->bindValue(':description', $description, PDO::PARAM_STR);
	$queryExecute->bindValue(':idCategory', $idCategory, PDO::PARAM_INT);
	$queryExecute->bindValue(':idUser', $idUser, PDO::PARAM_INT);

	return $queryExecute->execute();
}

/**
 * delete a book
 * @param int $id id of the book
 * @return bool if the book is deleted
 */
function deleteBook($id)
{
	$db = connect();

	$sql = "DELETE FROM `books` WHERE `id` = :id";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':id', $id, PDO::PARAM_INT);

	return $queryExecute->execute();
}
