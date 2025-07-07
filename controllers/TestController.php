<?php


class TestController extends Controller
{
    public function index($method, $id = null)
    {
        return [
            'method' => $method,
            'action' => 'index',
            'id' => $id,
            'message' => 'Testing index route'
        ];
    }

    public function show($method, $id = null)
    {
        return [
            'method' => $method,
            'action' => 'show',
            'id' => $id,
            'message' => "Showing item with ID $id"
        ];
    }

    public function create($method, $id = null)
    {
        return [
            'method' => $method,
            'action' => 'create',
            'message' => 'Calling action "Create"'
        ];
    }
}

