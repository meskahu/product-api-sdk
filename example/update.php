<?php
include_once '../MeskaProductApi.php';

include_once '_config_meska.php';

$api = new MeskaProductApi($api_key, $shop_id, $api_server_url, $mode);

$product_code = (int)$_GET['product_code'];

if ($product_code > 0){
    $product['product_code'] = $product_code;
    $product['price'] = 1000;
    var_dump($api->update_product($product_code, json_encode($product)));
} else {
    echo 'product_code_error';
}
