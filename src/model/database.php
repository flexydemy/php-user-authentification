<?php
namespace src\model;
use src\model\Statement;
use \PDO;
/**
 * summary
 */
class Database
{
    /**
     * summary
     */
    private $statement;
    public function __construct()
    {
        $this->statement = new Statement();
    }

    public function join($username, $email, $password){
        $req = $this->statement->getPDO()->prepare('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)');
        $req->execute(array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        ));
        return true;
    }

    public function update($id, $email, $password, $first_name, $last_name){
        $req = $this->statement->getPDO()->prepare('UPDATE users SET email= :email, password= :password, first_name= :first_name, last_name= :last_name WHERE id = :id');
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
        $req = $this->statement->getPDO()->query('DELETE FROM users WHERE id = '.$id);
        return true;
    }

    public function login($username, $password){
        $req = $this->statement->getPDO()->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
        $req->execute(array(
            'username' => $username,
            'password' => $password
        ));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $datas = count($data);
        return $datas;
    }

    public function getParams($username){
        $req = $this->statement->getPDO()->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array(
            'username' => $username
        ));
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    public function verif_username($username){
        $req = $this->statement->getPDO()->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array(
            'username' => $username
        ));
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        $data = count($datas);
        return $data;
    }

    public function verif_email($email){
        $req = $this->statement->getPDO()->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array(
            'email' => $email
        ));
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        $data = count($datas);
        return $data;
    }

}