<?php
    class HomeController extends Controller{
    
        function Index(){
            // You can also declare an array with array
            // and pass that to the view
            $this -> View("Home/Index", ["title" => "Codemites"]);
        }
    }