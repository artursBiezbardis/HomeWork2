<?php declare(strict_types=1);


class Person
{
    private string $name;
    private string $walletPath;
    private string $boughtItemsPath;

    function __construct(string $name, string $walletPath, string $listOfBoughtItems)
    {

        $this->name = $name;
        $this->walletPath = $walletPath;
        $this->boughtItemsPath = $listOfBoughtItems;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    public function getBalance(): int
    {
        $file = fopen($this->walletPath, 'r');
        $balance = (int)fread($file, filesize($this->walletPath));
        fclose($file);
        return $balance;

    }

    public function getProductList(): string
    {

        $file = fopen($this->boughtItemsPath, 'r');
        $products = fread($file, filesize($this->boughtItemsPath));
        fclose($file);
        return $products;

    }

    public function addBoughtItem($productName)
    {

        if (filesize($this->boughtItemsPath) > 0) {
            $newItem = $productName;
            $file = fopen($this->boughtItemsPath, 'a+');
            fwrite($file, "\n" . $newItem);
            fclose($file);
        } else {
            $newItem = $productName;
            $file = fopen($this->boughtItemsPath, 'a+');
            fwrite($file, $newItem);
            fclose($file);

        }

    }

    public function payForProduct(int $productPrice): void
    {
        $file = fopen($this->walletPath, 'r');
        $oldBalance = (int)fread($file, filesize($this->walletPath));
        fclose($file);

        $newBalance = $oldBalance - $productPrice;
        $file = fopen($this->walletPath, 'w');
        fwrite($file, (string)$newBalance);
        fclose($file);
    }
}