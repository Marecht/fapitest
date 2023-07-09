<?php
class RoutingController extends Controller {
  protected $page;

  function __construct(){
    $url = $_SERVER["REQUEST_URI"];

    $this->page = explode("?", explode("/", $url)[count(explode("/", $url))-1])[0];

    $controllerPath = "controller/".ucfirst($this->page)."Controller.php";
    $modelPath = "model/".ucfirst($this->page)."Model.php";

    if(strlen( $this->page)==0)$this->goto("buy"); //default page
    else if(file_exists( $controllerPath))  $this->loadClass($controllerPath, $modelPath);  //load class
    else $this->goto("error"); //error page


    
  }

  function loadClass($controllerPath, $modelPath){
    if(file_exists( $modelPath))require_once($modelPath);
      require_once($controllerPath);
      
      Controller::$data['page']=$this->page;
      $controllerName =  ucfirst($this->page)."Controller";
      $this->controller= new $controllerName;

      
      
  }




}
?>