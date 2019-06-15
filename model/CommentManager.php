<?php

require_once("Manager.php");

/**
 * Classe permetant de gérer les commentaires.
 */
class CommentManager extends Manager
{
	/**
	 * Méthode permettant d'obtenir les commentaires d'un article.
	 * @return PDOStatement Requête obtenue à partir de la table comment.
	 */
	public function getComments($postId)
	{
		$dataBase = $this->dbConnect('projet4');
		$comments = $dataBase->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY id DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	/**
	 * Méthode enregistrant le commentaire dans la base de données
	 * @param  int $postId  id du post dans lequel on veut inclure le commentaire
	 * @param  string $author  Auteur du commentaire
	 * @param  string $comment Le commentaire
	 * @return bool          Retourne true si l'enregistrement s'est bien effectué
	 */
	public function postComment($postId, $author, $comment)
	{
		$dataBase = $this->dbConnect('projet4');
		$comments = $dataBase->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?,?,?, NOW())');
		$succes = $comments->execute(array($postId, $author, $comment));

		return $succes;
	}

	public function signal($commentId)
	{
		$dataBase = $this->dbConnect('projet4');
		$signalement = $dataBase->prepare('SELECT signalement FROM comments WHERE id = ?');
		$signalement->execute(array($commentId));

		$signalFetch = $signalement->fetch();
		$signalNumber = (int)$signalFetch['signalement'];
		$signalNumber++;

		$signalement->closeCursor();
		$signalement = $dataBase->prepare('UPDATE comments SET signalement = ? WHERE id = ?');
		$succes = $signalement->execute(array($signalNumber, $commentId));
		return $succes;
	}
}