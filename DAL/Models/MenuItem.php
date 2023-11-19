<?php
class MenuItem{

    public $menuitem_id;

    public $title ;
    public $default_price;

    public $description;

    public $discount;

    public $rating;

    public $is_active;

    public $is_featured;
    public $image;

    public $query;
    
    public $ingredients = [];//this is line 20

    public $variants = [];

    public $category = [];
}

?>