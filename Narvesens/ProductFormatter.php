<?php


class ProductFormatter
{
    static function price(int $price)
    {
        return 'price ' . (number_format($price, 2, '.', ' ') / 100) . '$';
    }

    static function amount(int $amount)
    {
        return 'available ' . $amount . ' items.';
    }

    static function valueInUsd(int $value)
    {
        return (number_format($value, 2, '.', ' ') / 100) . '$';
    }
}