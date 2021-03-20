<?php


namespace App\Models;

trait HasPriceTrait
{
    public int $price;



    public function getPrice(): float
    {
        return '1.25';
    }
}
