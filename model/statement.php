<?php
/**
 * Created by PhpStorm.
 * User: CLAUDEL KROS
 * Date: 8/20/2018
 * Time: 8:54 AM
 */

class Statement
{

    private $dbase_name;
    private $dbase_user;
    private $dbase_pass;
    private $dbase_host;
    private $pdo;

    public function __construct($dbase_name = 'works', $dbase_user = 'root', $dbase_pass = '', $dbase_host = 'localhost')
    {
        $this->dbase_name = $dbase_name;
        $this->dbase_user = $dbase_user;
        $this->dbase_pass = $dbase_pass;
        $this->dbase_host = $dbase_host;
    }

    public function getPDO(){
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host='.$this->dbase_host.';dbname='.$this->dbase_name.';charset=utf8', $this->dbase_user, $this->dbase_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $pdo;
    }
}