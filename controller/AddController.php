<?php
    require_once("model/ProductsModel.php");
    class AddController extends Controller{
        
        function __construct(){
            
            $productsModel = new ProductsModel();
        
            if(isset($_POST["submit"])&&$this->checkData()){
                $productsModel->createProduct($_POST["name"], $_POST["price"]);
                header("Location: buy");
            }

            $this->loadViews(["top", "add","bottom"]);
        }

        private function checkData(){
            $error = 0;

            if($_POST["price"]<1)$error=6;
            else if(strlen($_POST["name"])<3||strlen($_POST["name"])>50)$error=7;


            if($error!=0)header("Location: error?type=$error");
            else return true;
        }

    }
?>