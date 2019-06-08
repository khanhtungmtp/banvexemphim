<?php

class Controller
{
    public function model($model)
    {
        require_once "../app/models/".$model .".php";
        return new $model();
    }

    public function view($view, $data = [])
    {
        $view_path = "../app/views/{$view}.php";

        if (file_exists($view_path)) {
            require $view_path;
        }else{
            die("view không tồn tại $view_path");
        }
    }
}