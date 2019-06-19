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

	/**
	 * Méthode permettant d'ajouter un article.
	 * @param string $title   Titre de l'article à ajouter.
	 * @param string $content Contenu de l'article à ajouter.
	 * @return bool Renvoie true si l'ensertion a bien été effectuée
	 */
	public function addPost($title, $content)
	{
		$dataBase = $this->dbConnect('projet4');
		$request = $dataBase->prepare('INSERT INTO posts(title, content, post_date) VALUES (?,?, NOW())');
		$succes = $request->execute(array($title, $content));

		return $succes;
	}

	/**
	 * Supprime un article
	 * @param  int $id Id de l'article à supprimer.
	 * @return bool     Renvoie true si l'article a bien été supprimé
	 */
	public function delete($id)
	{
		$dataBase = $this->dbConnect('projet4');
		$request = $dataBase->prepare('DELETE FROM posts WHERE id = ?');
		$succes = $request->execute(array($id));

		return $succes;
	}

	/**
	 * Méthode permettant de mettre à jour un article existant
	 * @param  int $id      Id de l'article à mettre à jour.
	 * @param  string $title   Nouveau titre de l'article
	 * @param  string $content Nouveau contenu de l'article
	 * @return bool          Renvoie true si l'article à bien été mis à jour
	 */
	public function update($id, $title, $content)
	{
		$dataBase = $this->dbConnect('projet4');
		$request = $dataBase->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
		$succes = $request->execute(array($title, $content, $id));

		return $succes;
	}
}