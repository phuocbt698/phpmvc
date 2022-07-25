<?php
    class Session{
        static public function dataSession($key = '', $value = ''){
            $sessionKey = self::isInvalid();
            if(!empty($value)){
               if(!empty($key)){
                    $_SESSION[$sessionKey][$key] = $value;
                    return true;
               }
               return false;
            }else{
                if(empty($key)){
                    if(isset($_SESSION[$sessionKey])){
                        return $_SESSION[$sessionKey];
                    }
                }else{
                    if(isset($_SESSION[$sessionKey][$key])){
                        return $_SESSION[$sessionKey][$key];
                    }
                }
                
            }
           
        }

        static public function flashData($key = '', $value = ''){
            $dataFlash = self::dataSession($key, $value);
            if(empty($value)){
                self::deleteSession($key);
            }
            return $dataFlash;
        }

        static public function deleteSession($key = ''){
            $sessionKey = self::isInvalid();
            if(!empty($key)){
                if(isset($_SESSION[$sessionKey][$key])){
                    unset($_SESSION[$sessionKey][$key]);
                    return true;
                }
                return false;
            }else{
                unset($_SESSION[$sessionKey]);
            }
        }

        static public function isInvalid(){
            global $config;
            if(!empty($config['session'])){
                $sessionConfig = $config['session'];
                if(!empty($sessionConfig['session_key'])){
                    $sessionKey = $sessionConfig['session_key'];
                    return $sessionKey;
                }else{
                    die("Thiếu cấu hình session_key! Vui lòng kiểm tra lại!");
                }
            }else{
                die("Không tồn tại config['session']! Vui lòng kiểm tra lại!");
            }
        }
    }
?>