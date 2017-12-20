<?php
// DESLOGA DA CONTA DO ADMIN

session_start();

session_destroy();

header('Location: index.php');

?>