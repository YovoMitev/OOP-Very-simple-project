<?php

declare(strict_types=1);
namespace Services;

use Data\RegisterViewData;
use Data\City;
use Data\User;

class UserService{

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }


    public function userRegistration(string $name,int $city_id, string $password){
        $stmt = $this->db->prepare("INSERT INTO user (username,city_id,password) VALUES(?, ?, ?)");

        return $stmt->execute([
                $name,
                $city_id,
                $password]);
    }

    public function usernameExist($username){
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);

        return !!$stmt->fetch();
    }


    public function login(string $username, string $password){

        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);

        $user = $stmt->fetchObject(User::class);

        return $user;

    }

    public function viewRegistData(): RegisterViewData{

        $viewData = new RegisterViewData();

        $stmt = $this->db->prepare("SELECT * FROM cityes");
        $stmt->execute();

        $generator = function () use ($stmt){
          while ($city = $stmt->fetchObject(City::class)){
              yield $city;
          }
        };

        $viewData->setCityes($generator);

        return $viewData;
    }

    public function getUserInfo($id){

        $stmt = $this->db->prepare("SELECT 
                u.username,
                u.password,
                c.name AS city
                FROM user AS u
                INNER JOIN cityes AS c
                ON c.id = u.city_id
                WHERE u.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(User::class);
    }

    public function editUserInfo($username,$password,$id){

        $stmt = $this->db->prepare("UPDATE user
        SET username = ?, password = ?
        WHERE id = ?");

        return $stmt->execute([$username,$password,$id]);

    }

    public function logout(){
        return session_destroy();
    }


}