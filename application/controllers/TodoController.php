<?php
    namespace application\controllers;

    class TodoController extends Controller {
        public function index() {
            switch(getMethod()) {
                case _GET:
                    return $this->model->selTodoList();
                case _POST:
                    $todo = $_POST['todo'];
                    $param = ['todo' => $todo];
                    $result = $this->model->insTodo($param);
                    return ["result" => $result];
                case _DELETE:
                    $urlPaths = getUrlPaths();
                    $param = ['itodo' => 0 ];
                    if(isset($urlPaths[2])) {
                        $param["itodo"] = intval($urlPaths[2]);
                    }
                    $result = $this->model->delTodo($param);
                    return ["result" => $result];
            }
        }
    }