<?php
    class Request{

        private $rules = [];
        private $messages = [];
        public $errors = [];
        public $getUnique;
        public function getMethod(){
            return strtolower($_SERVER['REQUEST_METHOD']);
        }

        public function isGet(){
            if ($this->getMethod() === 'get'){
                return true;
            }else{
                return false;
            }
        }

        public function isPost(){
            if ($this->getMethod() === 'post'){
                return true;
            }else{
                return false;
            }
        }

        public function getFields(){
            $data = [];
            if ($this->isGet()){
                if(!empty($_GET)){
                    foreach($_GET as $key => $value){
                        if(is_array($value)){
                            $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                        }
                        else{
                            $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                        }
                    }
                }
            }

            if ($this->isPost()){
                if(!empty($_POST)){
                    foreach($_POST as $key => $value){
                        if(is_array($value)){
                            $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                        }
                        else{
                            $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                        }
                    }
                }
            }

            return $data;
        }

        public function redirect($url = ''){
            if(!preg_match('~^(http | https)~is', $url)){
                $url = $url;
            }else{
                $url = _URL_ . '/' . $url;
            }
            header("Location:" . $url);
            exit();
        }


        public function validate($rules = [], $messages = []){
            $this->rules = $rules;
            $this->messages = $messages;
            $this->rules = array_filter($this->rules);
            $dataFields = $this->getFields();
            $checkValidate = true;
            if(!empty($this->rules)){
                foreach($this->rules as $fieldName=>$value){
                    $itemRulesArray = explode('|', $value);
                    
                    foreach($itemRulesArray as $rules){
                        $ruleName = null;
                        $ruleValue = null;
                        $rulesArray = explode(':', $rules);
                        $ruleName = reset($rulesArray);
                        if(count($rulesArray) > 1){
                            $ruleValue = end($rulesArray);
                        }
                        
                        if($ruleName == 'required'){
                            if (empty($dataFields[$fieldName])){  
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if($ruleName == 'min'){
                            if (strlen($dataFields[$fieldName]) < $ruleValue){  
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if($ruleName == 'max'){
                            if (strlen($dataFields[$fieldName]) > $ruleValue){  
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if($ruleName == 'email'){
                            if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)){  
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if($ruleName == 'match'){
                            if (trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])){  
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if($ruleName == 'phone'){
                            $regex_Phone = "/^(0?)^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/";
                            if (!preg_match($regex_Phone, $dataFields[$fieldName])){  
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }
                        if($ruleName == 'num'){
                            $regex_Num= "/^[0-9]$/";
                            if (!preg_match($regex_Num, $dataFields[$fieldName])){  
                                $this->setErrors($fieldName, $ruleName);
                                $checkValidate = false;
                            }
                        }

                        if($ruleName == 'unique'){
                            $tableName = null;
                            $column = null;
                            if (!empty($rulesArray[1])){  
                                $tableName = $rulesArray[1];
                            }
                            if (!empty($rulesArray[2])){  
                                $column = $rulesArray[2];
                            }
                            if(!empty($tableName) && !empty($column)){
                                    $this->getUnique = new BaseModel();
                                    $sql = "SELECT * FROM ${tableName} WHERE ${column} = '$dataFields[$fieldName]'";
                                    $unique = $this->getUnique->query($sql)->num_rows;                         
                                    if(!empty($unique)){
                                        $this->setErrors($fieldName, $ruleName);
                                        $checkValidate = false;
                                    }
                            }
                        }
                    }
                }
            }
            return $checkValidate;
        }

        public function getErrors($fieldName = ''){
            if(!empty($this->errors)){
                if(empty($fieldName)){
                    $errorArray = [];
                    foreach($this->errors as $key => $error){
                        $errorArray[$key] = reset($error);
                    }
                    return $errorArray;
                }
                
                return reset($this->errors[$fieldName]);
            }
            return false;
        }

        public function setErrors($fieldName, $ruleName){
            $this->errors[$fieldName][$ruleName] = $this->messages[$fieldName.'.'. $ruleName];
        }
    }
?>