<?php
class ErrorController extends Controller{
    function __construct(){
        if(isset($_GET["type"])){
            $t = $_GET["type"];
        }else $t="";

        switch ($t) {
            case '1':
                $text = "Name can only contain letters";
                break;

            case '2':
                $text = "No products selected";
                break;

            case '3':
                $text = "You have to buy at least one product and 1000 at most";
                break;

            case '4':
                $text = "Wrong email format";
                break;

            case '5':
                $text = "Wrong phone number format";
                break;

            case '6':
                $text = "The price must be above 0";
            break;

            case '7':
                $text = "The name must be between 3 and 50 characters long";
            break;
            
            default:
            $text = "Page not found";
                break;
        }

        Controller::$data["message"] = $text;

        $this->loadViews(["top","error","bottom"]);
    }
}
?>