<?php

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$new = [];
$numbers = $new;
$products = [
    ['name' => 'Mobile phone'],
    ['name' => 'Smart watch'],
    ['name' => 'Laptop'],
    ['name' => 'Headphones'],
    ['name' => 'Tablet']
];

// if ($numbers) {
//     for ($i = 0; $i <= count($numbers); $i++) {
//         echo $i . '<br />';
//     }
// } elseif ($numbers !== $new) {
//     for ($i =0; $i <= 100; $i++) {
//         echo $i . '<br />';
//     }
// } elseif (!$numbers) {
//     $i = 0;

//     while ($i < count($products)) {
//         echo $products[$i]['name'] . '<br />';
//         $i++;
//     }
// }
// else {
//     foreach ($products as $product) {
//         echo $product['name'];
//         echo '<br />';
//     }
// }

// functions

$name = "Mr. Chioke";

function morning ($name) {
    global $name;
    //$name = 'Mann';
    echo "Goodmorning $name <br />";
}

morning('Manager');

echo $name . '<br />';

function someAccesories ($accesories) {
    // echo "{$accesories['name']} goes for #{$accesories['price']} <br />";
    return "{$accesories['name']} goes for #{$accesories['price']} <br />";
}

$newAccesories = someAccesories(['name' => 'Charger', 'price' => 1500]);
echo $newAccesories . '<br />';

function add(...$nums) {
    $sum = 0;
    foreach($nums as $num) {
        $sum += $num;
    }
    return $sum;
}
echo add(1, 2, 9, 4, 5, 8) . '<br />';

function sum($a, $b) {
    return $a * $b;
}
echo sum(3, 67) . '<br />';

$longText = "
Hello, my names remain my name.
I've seen over 3 decades,
I love babies.
";
echo $longText. '<br>';
echo nl2br($longText). '<br>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Products</h1>
    <ul>
        <?php foreach ($products as $product) { ?>
            <h3><?php echo $product['name'] . '<br />'; ?></h3>
        <?php } ?>
    </ul>

    <div>
        
    </div>
</body>

</html>