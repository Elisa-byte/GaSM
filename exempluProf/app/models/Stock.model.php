<?php 

class StockModel {
    public $products = [];

    public function __construct()
    {
        $allProducts = json_decode(file_get_contents(__DIR__ . '/products.json'));

        foreach ($allProducts as $product) {
            array_push($this -> products, (object)["id" => $product -> id, "name" => $product -> name, "image" => $product -> image]);
            
        }
    }
}