<?php

include_once '../model/customers.php';
class customerController extends Customer
{
    public function index(){
        return $this->getCustomer();
    }
    public function InsertedController(){
        return $this->Insert($_POST);
    }

}

?>