<?php


class ProductStorage
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function getName($value): string
    {
        return $value[0];
    }

    public function getPrice($value): int
    {
        return $value[1];
    }

    public function getAmount($value): int
    {
        return $value[2];
    }


    public function addItemToProductsList($newProduct): void
    {
        if (filesize($this->path) > 0) {
            $newProductStr = $newProduct->getName() . ' ' . $newProduct->getPrice() . ' ' . $newProduct->getAmount();
            $file = fopen($this->path, 'a+');
            fwrite($file, "\n" . $newProductStr);
            fclose($file);
        } else {
            $newProductStr = $newProduct->getName() . ' ' . $newProduct->getPrice() . ' ' . $newProduct->getAmount();
            $file = fopen($this->path, 'a+');
            fwrite($file, $newProductStr);
            fclose($file);

        }

    }

    public function getProductList(): array
    {
        $twoDArray = [];
        $i = 0;
        $file = fopen($this->path, 'r');
        $products = fread($file, filesize($this->path));
        fclose($file);
        $productArray = explode("\n", $products);


        foreach ($productArray as $item) {
            $twoDArray[] = explode(" ", $item);
            settype($twoDArray[$i][1], "int");
            settype($twoDArray[$i][2], "int");
            $i++;
        }


        return $twoDArray;
    }

    public function storeProductList(array $changedArrayFromStore): void
    {
        file_put_contents($this->path, "");
        foreach ($changedArrayFromStore as $item) {
            if (file_get_contents($this->path) !== "") {
                $changedItems = implode(' ', $item);
                $file = fopen($this->path, 'a+');
                fwrite($file, "\n" . $changedItems);
                fclose($file);
            } else {
                $changedItems = implode(' ', $item);
                $file = fopen($this->path, 'a+');
                fwrite($file, $changedItems);
                fclose($file);
            }
        }

    }
}
