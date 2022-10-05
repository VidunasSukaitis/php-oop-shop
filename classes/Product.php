<?php

require_once dirname(__FILE__) . '/../support/FileReader.php';

class Product
{
    // TODO: add missing parameters

    public $title;
    public $id;
    public $images;
    public $price;
    public $ratings;
    public $maker;
    public $description;
    public $url;


    public function __construct($title, $price, $id, $images, $ratings, $url, $description, $maker)
    {
    
        $this->title = $title;
        $this->price = $price;
        $this->id = $id;
        $this->images = $images;
        $this->ratings = $ratings;
        $this->url = $url;
        $this->description = $description;
        $this->maker = $maker;

    }

    public static function find($id): Product
    {
        // How to load data:
        $content = Product::getProducts('./data/products.json');
        if(isset($_GET['id'])) {
            return $content;
        }
        else {

            echo "Failed";
        }

        // TODO: check if given product exists, if exists return as object else return false
    }

    public static function getProducts($path): array
    {
        $content = FileReader::readJsonFile($path, true);

        $products = [];

        if (!$content) {
            return $products;
        }

        foreach ($content as $product) {
            $products[] = new static($product['title'], $product['price'], $product['id'], $product['images'], $product['ratings'], $product['url'], $product['description'], $product['maker'] );
        }

        return $products;
    }
}
