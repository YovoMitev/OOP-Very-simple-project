<?php
require_once "app.php";
/** @var  $user User */
if(isset($_POST['LogUser'])){

    $userService = new \Services\UserService($db);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userService->login($username,$password);
    if(!$user){
        throw new \Exception("Invalid username. Try Again!");
    };
    if($password != $user->getPassword()){
        throw new \Exception("Invalid password. Try Again!");
    };
    $_SESSION['userId'] = $user->getId();
    header("Location: welcome_user.php");

}
include "frontends/login_frontend.php";