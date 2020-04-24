<?php

namespace App\Controller;
use App\Model\UserModel;
use Core\Controller\Controller;
use Core\Model\DbInterface;

class UserController extends Controller{

    public function __construct()
    {
        $this->model = new UserModel();
        $this->interface = new DbInterface();
    }

    public function signup(){
        if(!empty($_POST)){
            $this->interface->save($_POST, 'user');
            return $this->redirectToRoute('home');
        }
        return $this->render("user/signup");
    }

    public function login(){
        if(!empty($_POST)){
            $user = $this->model->findOneBy(['username' => $_POST["username"]]);
            if (!is_null($user)){
                if($user->password === $_POST["password"]){
                    $_SESSION["user"] = $user;
                }
                return $this->redirectToRoute("home");
            }
        }
        return $this->render('user/login');

    }

    public function logout(){
        session_destroy();
        return $this->redirectToRoute("home");

    }
}