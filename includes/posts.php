<?php

class Article {
	public function fetch_all() {
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM articles");
		$query->execute();	

		return $query->fetchAll();
	}
}

?>