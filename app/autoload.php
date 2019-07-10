<?php

    require_once("config/config.php");


    //Include all the libraries

    require_once(APPROOT."/lib/Controller.php");
    require_once(APPROOT."/lib/RouteConfig.php");
    require_once(APPROOT."/lib/Database.php");

    $route = new RouteConfig(); 