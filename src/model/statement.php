<?php
namespace src\model;
use \PDO;
/**
 * Created by PhpStorm.
 * User: CLAUDEL KROS
 * Date: 8/20/2018
 * Time: 8:54 AM
 */
require 'config.php';
class Statement
{

    private $pdo;

    public function getPDO(){
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host='.dbase_host.';dbname='.dbase_name.';charset=utf8', dbase_user, dbase_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $pdo;
    }

}