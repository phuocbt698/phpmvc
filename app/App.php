<?php
    class App {
        private $controller;
        private $action;
        private $param;
        private $urlAdmin;
        public function __construct()
        {
            $this->controller = 'Home';
            $this->action = 'index';
            $this->param = [];
            $this->handleUrl();
        }

        public function getUrl(){
            if(!empty($_SERVER['PATH_INFO'])){
                $url = $_SERVER['PATH_INFO'];
            }else{
                $url = '/';
            }
            return $url;
        }

        public function handleUrl(){
            $url = $this->getUrl();
            $urlArray = explode('/', $url);
            $urlArray = array_filter($urlArray);
            $urlArray = array_values($urlArray);
            $urlCheck = '';
            //Kiem tra xem url do co phai la file hay ko
            if(!empty($urlArray)){
                foreach($urlArray as $key=>$item){
                    $urlCheck .= ucfirst($item) . '/';
                    $fileCheck = rtrim($urlCheck, '/');
                    $fileArray = explode('/', $fileCheck);
                    $fileArray[count($fileArray) - 1] = ucfirst($fileArray[count($fileArray) - 1]);
                    $fileCheck = implode('/', $fileArray);
                    if (!empty($urlArray[$key-1])){
                        unset($urlArray[$key-1]);
                    }
                    if (file_exists('app/Controllers/' . ($fileCheck) . 'Controller.php')) {
                        $urlCheck = $fileCheck;
                        break;
                    }        
                    
                }
                //xep lai mang urlArray ke tu khi check ra duoc do la file
                $urlArray = array_values($urlArray);
                $this->urlAdmin = $urlArray[0];
            }
            if(empty($urlArray[0])){
                $this->controller = ucfirst($this->controller) . 'Controller';
            }else
            {
                $this->controller = ucfirst($urlArray[0]) . 'Controller';
            }
        
            if(empty($urlCheck)){
               $urlCheck = $this->controller;
            }
            else{
                $urlCheck = $urlCheck . 'Controller';
            }

            //Xu ly controller
            if(file_exists('app/Controllers/' . $urlCheck . '.php')){
                require_once "app/Controllers/" . $urlCheck . '.php';
                if(class_exists($this->controller)){
                    $this->controller = new $this->controller();
                    unset($urlArray[0]);
                }else{
                    $this->loadError();
                }
            }else{
                $this->loadError();
            }
            //Xu ly action
            if(!empty($urlArray['1'])){
                $this->action = $urlArray['1'];
                unset($urlArray[1]);
            }
             //Xử lý param
             $this->param = array_values($urlArray);
             //Kiểm tra method tồn tại
             if (method_exists($this->controller, $this->action)){
                 call_user_func_array([$this->controller, $this->action], $this->param);
             }else{
                $this->loadError();
             }

        }

        public function loadError($name = '404'){
            var_dump($this->urlAdmin);
            if($this->urlAdmin = 'admin'){
                require_once 'Views/Admin/Errors/' . $name . '.php';
            }else{
                require_once 'Views/Errors/' . $name . '.php';
            }
           
        }
    }