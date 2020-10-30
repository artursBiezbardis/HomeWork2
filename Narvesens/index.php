<?php declare(strict_types=1);

require_once 'Product.php';
require_once 'ProductStorage.php';
require_once 'Store.php';
require_once 'ProductFormatter.php';
require_once 'Person.php';

$storage = new ProductStorage('products.txt');
$store = new Store('Narvesen Ķengarags', $storage->getProductList());
$shopper = new Person('Artūrs Biezbārdis', 'wallet.txt', 'listOfItems.txt');


echo 'For storekeeper enter (1), for customer (2)';
$choseObject = (int)readline('> ');
switch ($choseObject) {
    case 1:
        echo 'Hello Janis!' . PHP_EOL;
        echo 'You can add new Product by entering (1), to see available products enter (2), to burn Store enter( 3)';
        $choseObject = (int)readline('> ');

        switch ($choseObject) {
            case 1:
                $exit = '';
                while ($exit !== '1') {

                    if (file_get_contents($storage->getPath()) != "") {
                        foreach ($storage->getProductList() as $key => $value) {
                            echo '(' . $key . ')' . ' ';
                            echo $storage->getName($value) . ' ';
                            echo ProductFormatter::price($storage->getPrice($value)) . ' ';
                            echo ProductFormatter::amount($storage->getAmount($value)) . ' ';
                            echo PHP_EOL;
                        }
                    } else {
                        echo 'The Store is empty, add new Products';
                    }


                    $productName = (string)readline('Enter product: ');
                    $productPrice = (int)readline('Enter price in cents: ');
                    $productAmount = (int)readline('Enter Amount: ');

                    $newProduct = new Product($productName, $productPrice, $productAmount);
                    $storage->addItemToProductsList($newProduct);
                    echo 'If you want add more products press Enter otherwise press (1) and then Enter' . PHP_EOL;
                    $exit = readline('>');
                }
                break;
            case 2:

                $storage->getProductList();


                break;
            default:
                echo 'Wrong choice!' . PHP_EOL;
                break;
        }
        break;

    case 2:
        echo "To buy a product press (1) Enter, to see balance (2), to see bought items (3)";
        $choseObject = readline('>');
        switch ($choseObject) {

            case 1:

                echo 'Chose product by Product number()' . PHP_EOL;
                foreach ($store->getAllProducts() as $key => $value) {
                    echo 'Product number (' . $key . ')' . ' ';
                    echo $store->getProduct($value) . ' ';
                    echo ProductFormatter::price($store->getPrice($value)) . PHP_EOL;
                }
                $indexOfCustomerChoice = (int)readline('>');
                while ($shopper->getBalance() > $store->chosenProductPrice($indexOfCustomerChoice)) {
                    $shopper->addBoughtItem($store->chosenProductName($indexOfCustomerChoice));
                    $shopper->payForProduct($store->chosenProductPrice
                    ($indexOfCustomerChoice));

                    $storage->storeProductList($store->deleteProductZeroAmount
                    ($store->decreaseAmount($indexOfCustomerChoice)));
                    echo 'Thanks for shopping!' . PHP_EOL;
                    break;
                }
                if ($shopper->getBalance() <= $store->chosenProductPrice($indexOfCustomerChoice)) {
                    echo 'Sorry you don\'t have enough money!' . PHP_EOL;

                }
                break;
            case 2:

                echo 'Your balance is ' . ProductFormatter::valueInUsd($shopper->getBalance()) . '.' . PHP_EOL;

                break;

            case 3:

                echo $shopper->getProductList() . PHP_EOL;


        }


}




