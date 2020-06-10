<?php

class ProductModel
{
    public $id;
    public $stock;
    public $name;
    public $image;

    public function __construct($id)
    {
        $allProducts = json_decode(file_get_contents(__DIR__ . '/../models/products.json'));

        foreach ($allProducts as $product) {
            if ($product->id === $id) {
                $this->id = $product->id;
                $this->stock = $product->stock;
                $this->name = $product->name;
                $this->image = $product->image;
            }
        }
    }
}
