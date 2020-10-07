<?php


class Store
{

    private string $storeName;

    protected array $products;

    function __construct($storeName, array $products)
    {
        $this->storeName = $storeName;
        $this->products = $products;
    }

    public function chosenProductName($indexOfCustomerChoice)
    {
        return $this->products[$indexOfCustomerChoice][0];

    }

    public function chosenProductPrice($indexOfCustomerChoice)
    {
        return $this->products[$indexOfCustomerChoice][1];

    }

    public function getProduct($value): string
    {
        return $value[0];
    }

    public function getPrice($value): int
    {
        return $value[1];
    }

    /**
     * @return array
     */
    public function getAllProducts(): array
    {
        return $this->products;
    }

    public function decreaseAmount(int $indexOfCustomerChoice): array
    {
        $array = $this->products;
        $array[$indexOfCustomerChoice][2] = $array[$indexOfCustomerChoice][2] - 1;
        return $array;
    }


    public function deleteProductZeroAmount(array $decreaseAmount): array
    {
        $noEmptyProductValue = $decreaseAmount;
        foreach ($noEmptyProductValue as $key => $value) {
            if ($value[2] === 0) {
                unset($noEmptyProductValue[$key]);
            }

        }
        return $noEmptyProductValue;
    }

}