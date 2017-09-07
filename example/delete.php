<?php
include_once '../MeskaProductApi.php';

include_once '_config_meska.php';

$api = new MeskaProductApi($api_key, $shop_id, $api_server_url, $mode);

$product_code = (int)$_GET['product_code'];

if ($product_code > 0){
    var_dump($api->delete_product($product_code));
} else {
    echo 'product_code_error';
}
