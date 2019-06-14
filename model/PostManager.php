<?php

require_once("Manager.php");

/**
 * Classe permetant de gérer les articles.
 */
class PostManager extends Manager
{
	/**
	 * Méthode permettant d'obtenir l'ensemble des articles.
	 * @return PDOStatement Requête obtenue à partir de la table posts.
	 */
	public function getPosts()
	{
		$dataBase = $this->dbConnect('projet4');
		$request = $dataBase->query('SELECT id, title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr FROM posts ORDER BY id DESC');

		return $request;
	}

	/**
	 * Méthode permettant d'obtenir un article par son id.
	 * @param  int $postId id de l'article
	 * @return  mixed        Résultat de la requête
	 */
	public function getPost($postId)
	{
		$dataBase = $this->dbConnect('projet4');
		$request = $dataBase->prepare('SELECT id, title, content, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin%ss\') AS post_date_fr FROM posts WHERE id = ?');
		$request->execute(array($postId));
		$post = $request->fetch();

		return $post;
	}
}