<?php

##### DESLOGA DA PÁGINA DO ADMIN #####

session_start();

session_destroy();

header('Location: index.php');

?>