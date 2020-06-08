<?php
class Product extends Controller
{
    public function index($productId = '')
    {
        $product = $this->model('Product', [$productId]);

        if (!$product->id) {
            $this->view('product/not-found', ["productId" => $productId]);
        } else {
            $this->view('product/index', ["product" => $product]);
        }
    }
}
