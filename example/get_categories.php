<?php
include_once '../MeskaProductApi.php';

include_once '_config_meska.php';

$api = new MeskaProductApi($api_key, $shop_id, $api_server_url, $mode);
var_dump($api->get_categories());
