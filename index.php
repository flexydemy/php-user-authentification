<?php 
require 'controller/Controller.php';

$app = new Controller();


if (isset($_GET['action'])) {
	if ($_GET['action'] == 'home') {
        $app->index();
	}else if ($_GET['action'] == 'inscription') {
		$app->inscrip();
    }else if ($_GET['action'] == 'connexion') {
    $app->connexion();
    }else if ($_GET['action'] == 'update') {
    $app->update();
    }else if ($_GET['action'] == 'logout') {
    $app->logout();
    }else if (isset($_GET['action']) == 'delete') {
    $app->delete();
    }else{
        $app->index();
    }
}else{
    $app->connexion();
}