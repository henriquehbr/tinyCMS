<?php

##### DESLOGA DO PAINEL DE CONTROLE #####

session_start();

session_destroy();

header('Location: index.php');

?>