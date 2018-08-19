<?php

/**
 * summary
 */
class Database
{
    /**
     * summary
     */
    private $dbase_name;
    private $dbase_user;
    private $dbase_pass;
    private $dbase_host;
    private $pdo;

    public function __construct($dbase_name = 'work', $dbase_user = 'root', $dbase_pass = '', $dbase_host = 'localhost')
    {
    	$this->dbase_name = $dbase_name;
    	$this->dbase_user = $dbase_user;
    	$this->dbase_pass = $dbase_pass;
    	$this->dbase_host = $dbase_host;
    }

    private function getPDO(){
    	if ($this->pdo === null) {
    		$pdo = new PDO('mysql:host=localhost;dbname=works;charset=utf8', 'root', '');
    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$this->pdo = $pdo;
    	}
    	
    	return $pdo;
    }

    public function join($username, $email, $password){
    	$req = $this->getPDO()->prepare('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)');
    	$req->execute(array(
    		'username' => $username,
    		'email' => $email,
    		'password' => $password
    	));
    }

    public function update($id, $email, $password, $first_name, $last_name){
        $req = $this->getPDO()->prepare('UPDATE users SET email= :email, password= :password, first_name= :first_name, last_name= :last_name WHERE id = :id');
        $req->execute(array(
            'email' => $email,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'id' => $id
        ));
        return true;
    }

    public function delete($id){
        $req = $this->getPDO()->query('DELETE username FROM users WHERE id = 17');
        return true;
    }

    public function login($username, $password){
    	$req = $this->getPDO()->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    	$req->execute(array(
    		'username' => $username,
    		'password' => $password
    	));
    	$data = $req->fetchAll(PDO::FETCH_OBJ);
    	$datas = count($data);
    	return $datas;
    }

    public function getParams($username){
    	$req = $this->getPDO()->prepare('SELECT * FROM users WHERE username = :username');
    	$req->execute(array(
    		'username' => $username
    	));
    	$datas = $req->fetchAll(PDO::FETCH_OBJ);
    	return $datas;
    }

    public function verif_username($username){
        $req = $this->getPDO()->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array(
            'username' => $username
        ));
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        $data = count($datas);
        return $data;
    }

    public function verif_email($email){
        $req = $this->getPDO()->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array(
            'email' => $email
        ));
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        $data = count($datas);
        return $data;
    }

}