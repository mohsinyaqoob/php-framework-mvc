<?php
    class RouteConfig{

        protected $defaultController = "HomeController";
        protected $defaultMethod = "Index";

        function __construct(){
            
            $url = $this -> getUrl();

            if(isset($url[0])){
                $calledController = $url[0];
                if(file_exists(APPROOT."/controller/".$calledController."Controller.php")){
                    $this -> defaultController = $calledController."Controller";
                    unset($url[0]);
                }else{
                    die("ERROR 404! FILE NOT FOUND.");
                }
            }

            require_once(APPROOT."/controller/".$this->defaultController.".php");
            $control = new $this->defaultController();

            if(isset($url[1])){
                $passedMethod = $url[1];
                if(method_exists($control, $passedMethod)){
                    $this -> defaultMethod = $passedMethod;
                    unset($url[1]);
                }else{
                    die("ERROR 404! FILE NOT FOUND");
                }
            }

            if($url != null){
                $url = $url;
            }else{
                $url = [];
            }

            call_user_func_array([$control, $this -> defaultMethod], $url);
        }

        function getUrl(){
            if(isset($_GET['url'])){

                $url = $_GET['url'];
                $url = rtrim($url,"/");
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode("/",$url);
                return $url;

            }
        }
    }