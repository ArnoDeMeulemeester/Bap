<?php
require_once 'models/User.php';
require_once 'utils/Request.php';
require_once ("Service/Service.php");
require_once 'Repository/Repository.php';
require_once 'utils/Response.php';

class Controller {

    public function getAllUsers() {
        $service = new Service();
        $users = $service->getAllUsers();
        Response::json($users, 201);
    }

    public function getUserById($id) {
        $service = new Service();
        if ($id){
            $user = $service->getUserById($id);
            Response::json($user, 201);
        } else {
            Response::json(['error' => 'User not found'], 404);
        }
    }

    public function createUser($input) {
        $service = new Service();
        $user = $service->saveUser($input);
        Response::json($user, 201);
    }

    public function deleteUser($id) {
        $service = new Service();
        if ($id) {
            $service->deleteUser($id);
            Response::json(['message' => 'User deleted']);
        } else {
            Response::json(['error' => 'User not found'], 404);
        }
    }

    public function updateUser($input, $id) {
        $service = new Service();
        if ($id) {
            $user = $service->updateUser($input, $id);
            Response::json($user, 200);
            Response::json(['message' => 'User updated']);
        } else {
            Response::json(['error' => 'User not found'], 404);
        }
        Response::json($user, 201);
    }
}
