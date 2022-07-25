<?php
    class BaseController{

        public function model($model){
            $model = ucfirst($model) . 'Model';          
            if(file_exists(_DIR_ . '/app/Models/' . $model . '.php')){
                require_once _DIR_ . '/app/Models/' . $model . '.php';
                if(class_exists($model)){
                    $model = new $model();
                    return $model;
                }
            }
            return false;
        }

        public function view($view, $data = []){
            extract($data);
            
            if(file_exists(_DIR_ . '/app/Views/' . $view . '.php')){
                require_once _DIR_ . '/app/Views/' . $view . '.php';
            }
        }

        public function request(){
            $request = new Request();
            return $request;
        }


        public function validate(){
            $validate = new Request();
            return $validate;
        }

        public function redirect(){
            $redirect = new Request();
            return $redirect;
        }
    }
?>