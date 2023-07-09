
<?php
abstract class Controller{

    protected $controller;
   
    protected static $data = array();
    

    function goTo($place){
        header("Location: $place");
    }

    function loadViews($views){
        Controller::$data["css"]="<link rel='stylesheet' href='css/colorsLight.css'>";
        Controller::$data["css"].="<link rel='stylesheet' href='css/base.css'>";
        Controller::$data["css"].="<link rel='stylesheet' href='css/frame.css'>";

        
        
        extract(Controller::$data);
        foreach ($views as $view) {
            require_once("view/$view.phtml");
        }
    }

}
?>