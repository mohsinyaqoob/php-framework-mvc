<?php

    class Controller{

        //Send Codmites as title by default
        function View($viewName, $dataArray){
        if(file_exists(APPROOT."/views/".$viewName.".php")){
                require_once(APPROOT."/views/".$viewName.".php");
            }else{
                echo "View Not Found!";
            }
        }
    }

?>