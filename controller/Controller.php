 <?php

 require 'model/database.php';
/**
 * summary
 */

/**
 * summary
 */
class Controller {
    /**
     * summary
     */

    public $errors = [];
    public function index(){
        $model = new Database();
        $reponse = $model->getParams($_GET['user']);
        foreach ($reponse as $response){
            $user_name = $response->username;
            $user_id = $response->id;
        }
        session_start();
        if (empty($_SESSION)){
            header("Location:?action=connexion");
        }
        $_SESSION['username'] = $user_name;
        $_SESSION['id'] = $user_id;

        if ($_GET['user'] == ''){
            header("Location:?action=connexion");
        }

        require 'view/home.php';
    }

    public function logout(){
        require 'view/disconnect.php';
    }

    public function update(){
        session_start();
        if (empty($_SESSION)){
            header("location:?action=connexion");
        }
        $model = new Database();
        $rep = $model->getParams($_SESSION['username']);
        foreach ($rep as $value) {

        }
        if (isset($_POST['update'])){
            $_user = htmlspecialchars($_POST['username']);
            $_email = htmlspecialchars($_POST['email']);
            $_password = htmlspecialchars($_POST['new_password']);
            $_password_verif = htmlspecialchars($_POST['news_password']);
            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = htmlspecialchars($_POST['last_name']);

            if (isset($_email)){
                if (!empty($_password)) {
                    if ($_password == $_password_verif){
                        $model = new Database();
                        $reponse = $model->update($_SESSION['id'], $_email, $_password, $first_name, $last_name);
                        if ($reponse){
                            $errors = "Votre profil a ete modifier";
                        }else{
                            $errors = "Votre profil n'a pas ete modifier";
                        }
                    }else{
                        $errors = "les mots de passe ne sont pas identiques";
                    }
                }else{
                    $errors = "le mot de passe ne doit pas etre vide";
                }
            }else{
                $errors = "L'Email ne peux pas etre vide";
            }
        }
        if (isset($_POST['delete'])){
            $model = new Database();
            $model->delete($_SESSION['id']);
            if ($rep){
                header("Location:?action=connexion");
            }
        }
        require 'view/users.php';
    }

    public function connexion(){

    	if (isset($_POST['connect'])) {
            $_username = htmlspecialchars($_POST['username']);
            $_password = htmlspecialchars($_POST['password']);
            $model = new Database();
            $reponse = $model->login($_username, $_password);

            if ($reponse > 0) {
                $model = new Database();
                $res = $model->getParams($_username);
                foreach ($res as $response){
                    $user_name = $response->username;
                    var_dump($user_name);
                    $_SESSION['username'] = $user_name;
                }
                header("Location:?action=home&user=".$user_name);
            }else{
                $errors =  "Identifiants incorrectes";
            }
        }

        require 'view/connexion.php';
    }

    public function inscrip(){

        if (isset($_POST['submit'])) {
            $_username = htmlspecialchars($_POST['username']);
            $_email = htmlspecialchars($_POST['email']);
            $_password = htmlspecialchars($_POST['password']);
            $model = new Database();
            $verif_user = $model->verif_username($_username);
            if (!empty($_username) && strlen($_username) > 6) {
                if ($verif_user == 0){
                    if (!empty($_email)) {
                        $model = new Database();
                        $verif_email = $model->verif_email($_email);
                        if ($verif_email == 0){
                            if (!empty($_password) && $_password == $_POST['verif_password']) {
                                if (strlen($_password) > 6){
                                    $model = new Database();
                                    $reponse = $model->join($_username, $_email, $_password);

                                    if ($reponse) {
                                        $model = new Database();
                                        $res = $model->getParams($_username);
                                        foreach ($res as $response){
                                            $user_name = $response->username;
                                            $_SESSION['username'] = $user_name;
                                        }
                                        header("Location:?action=home&user=".$user_name);
                                    }else{
                                        $errors =  "Identifiants incorrectes";
                                    }
                                }else{
                                    $errors = "Le mot de passe doit contenir au moins 6 caracteres";
                                }
                            }else{
                                $errors = "le mot de passe ne sont pas identique ";
                            }
                        }else{
                            $errors = "Adresse mail deja utilise";
                        }
                    }else{
                        $errors = "L'Email n'est pas correct ";
                    }
                }else{
                    $errors = "Cet Nom est deja utilise";
                }
            }else{
                $errors = "le Nom d'utilisateur doit contenir au moins 6 caracteres ";
            }
        }
        require 'view/inscription.php';
    }
}