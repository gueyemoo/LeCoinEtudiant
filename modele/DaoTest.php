<?php
require_once('../modele/Client.class.php');
require_once('DAO.class.php');

// Récupération des données de configuration
$config = parse_ini_file('../config/config.ini');

// Creation de l'instance DAO
$DAO = new DAO($config['database_path']);

$m = $DAO->get(1);//On récupere le premier objet
$e = $DAO->get(2);//On récupere le premier objet

var_dump($m);//On teste si le $DAO fonctionne correctement et retourner le premier objet
var_dump($e);//On teste si le $DAO fonctionne correctement et retourner le second objet

?>
