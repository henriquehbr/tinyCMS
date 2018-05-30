<?php

##### FUNÇÕES #####

class Article {
	// Pega os dados de todos os posts no banco de dados (MySQL)
	public function fetch_all() {
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM articles");
		$query->execute();	

		return $query->fetchAll();
	}
}

?>