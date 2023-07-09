<?php
    require_once("model/ProductsModel.php");
    class BuyController extends Controller{
        
        function __construct(){
            
            $productsModel = new ProductsModel();
            Controller::$data["products"] = $productsModel->getProducts();

            $this->loadViews(["top", "buy","bottom"]);
        }


    }
?>