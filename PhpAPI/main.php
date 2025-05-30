    <?php
    header("Content-Type: application/json");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
    require_once("Controller/Controller.php");
    $controller = new Controller();
if ($uri === '/users' && $method === 'GET') {
    return $controller->getAllUsers();
} elseif (preg_match('#^/users/(\d+)$#', $uri, $matches) && $method === 'GET') {
    $userId = $matches[1];
    return $controller->getUserById($userId);
} elseif ($method === 'POST'){
    $input = json_decode(file_get_contents("php://input"), true);
    return $controller->createUser($input);
} elseif (preg_match('#^/users/(\d+)$#', $uri, $matches) && $method === 'PUT'){
    $userId = $matches[1];
    $input = json_decode(file_get_contents("php://input"), true);
    return $controller->updateUser($input, $userId);
} elseif (preg_match('#^/users/(\d+)$#', $uri, $matches) && $method === 'DELETE') {
    $userId = $matches[1];
    return $controller->deleteUser($userId);
}else {
    http_response_code(404);
    return json_encode(['error' => 'Not found']);
}

    ?>
