<?php
include_once '../MeskaProductApi.php';

include_once '_config_meska.php';

$api = new MeskaProductApi($api_key, $shop_id, $api_server_url, $mode);

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
            'id' => 76,
            'name' => 'Gomb'
        )
    ),
    'Technics' => array(
        array(
            'id' => 1,
            'name' => 'Agyagozás'
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
            'id' => 535,
            'name' => 'Arany'
        )
    ),
    'Images' => array(
        'https://www.meska.hu/img/product/original/m/i/milanteszt_product_1780_151119084325_506750.jpeg'
    )
);

var_dump($api->create_product(json_encode($product)));
