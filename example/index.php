<?php
include_once '../MeskaProductApi.php';

$api_key = 'api_key';
$shop_id = 123;
$api_server_url = 'api_url';
$mode = 'sandbox'; //production|sandbox

$api = new MeskaProductApi($api_key, $shop_id, $api_server_url, $mode);
var_dump($api->get_categories());

//var_dump($api->get_shelves());


$product = array(
    'product_name' => 'api test',
    'product_description' => 'api test product',
    'price' => 500,
    'unit' => 'db',
    'unit_price' => 0,
    'db' => 10,
    'pack_quantity' => 0,
    'to_order_product_time' => 0,
    'to_order_product' => 0,
    'shelve_id' => null,
    'recommended' => 0,
    'product_nature' => 'from_shop',
    'product_different_description' => '',
    'product_different' => '',
    'automatic_renew' => 0,
    'Categories' => array(
        array(
            'id' => 304,
            'name' => 'Állatfelszerelések'
        )
    ),
    'Technics' => array(
        array(
            'id' => 472,
            'name' => 'Baba-és bábkészítés'
        )
    ),
    'Material' => array(
        'test'
    ),
    'Keywords' => array(
        'test'
    ),
    'Colors' => array(
        array(
            'id' => 512,
            'name' => 'Arany'
        )
    ),
    'Images' => array(
        'https://www.meska.hu/img/product/original/m/i/milanteszt_product_1780_151119084325_506750.jpeg'
    )
);

//var_dump($api->create_product(json_encode($product)));

$product_code = 123456;

$product['product_code'] = $product_code;
$product['price'] = 1000;
//var_dump($api->update_product($product_code, json_encode($product)));

//var_dump($api->delete_product($product_code));
