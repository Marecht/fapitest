<?php
require_once("model/ProductsModel.php");
    class SummaryController extends Controller{
        
        function __construct(){
            $productsModel = new ProductsModel();
            Controller::$data["product"] = $productsModel->getProduct($_POST["product"]);
            
            $this->checkData();
            

            $this->loadViews(["top", "summary","bottom"]);
        }

        private function checkData(){
            $error = 0;
            if(!$this->containsOnlyLetters($_POST["fname"])||!$this->containsOnlyLetters($_POST["lname"]) )$error=1;
            else if($_POST["product"]=="null")$error=2;
            else if($_POST["count"]<1||$_POST["count"]>1000)$error=3;
            else if(!$this->validateEmail($_POST["email"]))$error=4;
            else if(!$this->validatePhoneNumber($_POST["tel"]))$error=5;


            else if(!isset($_POST["submit"]))$error=100;

            if($error!=0)header("Location: error?type=$error");
        }

        private function containsOnlyLetters($string) {
            $pattern = '/^[\p{L}]+$/u';
            return preg_match($pattern, $string) === 1;
        }

        public function validateEmail($email) {
            $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            return preg_match($pattern, $email);
        }
       
        function validatePhoneNumber($phoneNumber) {
            $pattern = '/^\d{9}$/';
            return preg_match($pattern, $phoneNumber);
        }
    }
?>