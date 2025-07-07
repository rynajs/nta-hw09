<?php


class Router
{
    public function handleRequest()
    {
        // параметри з URL:
        $controllerParam = isset($_GET['controller']) ? $_GET['controller'] : 'test';
        $actionParam = isset($_GET['action']) ? $_GET['action'] : 'index';
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        // ім’я класу контролера:
        $controllerName = ucfirst($controllerParam) . 'Controller';
        $action = $actionParam;

        // перевірки й виклик:
        if (!class_exists($controllerName)) {
            return $this->jsonResponse(
                ['error' => "Controller $controllerName not found"], 404
            );
        }

        $controller = new $controllerName();

        if (!is_subclass_of($controller, 'Controller')) {
            return $this->jsonResponse(
                ['error' => "$controllerName must extend base Controller"], 500
            );
        }

        if (!method_exists($controller, $action)) {
            return $this->jsonResponse(
                ['error' => "Action $action not found in $controllerName"], 404
            );
        }

        // викликаємо action
        $response = $controller->$action($_SERVER['REQUEST_METHOD'], $id);
        $this->jsonResponse($response);
    }

    // JSON helper:
    private function jsonResponse($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
