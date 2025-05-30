<?php

require_once "Repository/Repository.php";

class Service {

  public $repo;

  public function __construct() {
    $this->repo = new Repo();
  }

  public function getAllUsers() {
      $users = $this->repo->findAll();
      Response::json($users, 201);
  }

  public function getUserById($id){
    $user = $this->repo->findById($id);
    Response::json($user, 201);
  }

  public function updateUser($user, $id){
    if($id){
      $this->repo->save($user, $id);
      $user = $this->repo->findById($id);
      return end($user);
    } else {
      throw new Exception("No ID given");
    }
  }

  public function saveUser($user){
    $user['id'] = null;
    $this->repo->save($user);
    $users = $this->repo->findAll();
    return end($users);
  }
  
  public function deleteUser($id){
    $this->repo->delete($id);
  }
}