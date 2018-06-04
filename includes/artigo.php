<?php

##### FUNÇÕES #####

class Artigo {
	// Pega os dados de todos os posts no banco de dados
	public function obter_todos() {
		global $conectar;

		$db = $conectar->prepare("SELECT * FROM artigos");
		$db->execute();	

		return $db->fetchAll();
	}

	// Pega os dados de um post especifico no banco de dados
	public function obter_dados($artigo_id) {
		global $conectar;

		$db = $conectar->prepare("SELECT * FROM artigos WHERE artigo_id = ?");
		$db->bindValue(1, $artigo_id);
		$db->execute();

		return $db->fetch();
	}
}

?>