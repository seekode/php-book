<?php
require_once 'models/Database.php';

/**
 * Get user by id
 * @param int $id - id of the user to get
 * @return object|bool - user or false
 */
function getUser($id)
{
	$db = connect();

	$sql = "SELECT * FROM users WHERE `id` :id";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':id', $id, PDO::PARAM_INT);

	$queryExecute->execute();
	return $queryExecute->fetch(PDO::FETCH_OBJ);
}

/**
 * get user by email
 * @param string $email - email of the user to get
 * @return object|bool - user or false
 */
function getUserByEmail($email)
{
	$db = connect();

	$sql = "SELECT * FROM users WHERE `email` = :email";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':email', $email, PDO::PARAM_STR);

	$queryExecute->execute();
	return $queryExecute->fetch(PDO::FETCH_OBJ);
}

/**
 * Create user
 * @param string $firstname
 * @param string $lastname
 * @param string $email
 * @param string $password
 * @return bool
 */
function createUser($firstname, $lastname, $email, $password)
{
	$db = connect();

	$sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':firstname', $firstname, PDO::PARAM_STR);
	$queryExecute->bindValue(':lastname', $lastname, PDO::PARAM_STR);
	$queryExecute->bindValue(':email', $email, PDO::PARAM_STR);
	$queryExecute->bindValue(':password', $password, PDO::PARAM_STR);

	return $queryExecute->execute();
}

/**
 * Delete user
 * @param int $id - id of the user to delete
 * @return bool
 */
function deleteUser($id)
{
	$db = connect();

	$sql = "DELETE FROM users WHERE `id` = :id";
	$queryExecute = $db->prepare($sql);
	$queryExecute->bindValue(':id', $id, PDO::PARAM_INT);

	return $queryExecute->execute();
}
