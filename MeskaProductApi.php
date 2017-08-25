<?php

/**
 * Meska product api SDK
 */
class MeskaProductApi
{
    private $meskacurl;
    private $urls = array(
        'categories' => '/api/queries/categories',
        'shelves' => '/api/queries/shelves',
        'products' => '/api/products',
        'product' => '/api/products/'
    );

    public function __construct($api_key, $shop_id, $api_server_url, $mode)
    {
        $this->meskacurl = new MeskaProductApiCurl($api_key, $shop_id, $api_server_url, $mode);;
    }

    public function get_categories()
    {
        return $this->meskacurl->get($this->urls['categories']);
    }

    public function get_shelves()
    {
        return $this->meskacurl->get($this->urls['shelves']);
    }

    public function get_products()
    {
        return $this->meskacurl->get($this->urls['products']);
    }

    public function create_product($product_json)
    {
        return $this->meskacurl->post($this->urls['products'], $product_json);
    }

    public function update_product($product_code, $product_json)
    {
        return $this->meskacurl->patch($this->urls['products'], $product_code, $product_json);
    }

    public function delete_product($product_code)
    {
        return $this->meskacurl->delete($this->urls['products'], $product_code);
    }
}

class MeskaProductApiCurl
{
    private $headers = array(
        'content-type: application/json'
    );
    private $base_url;
    private $_ch;
    private $mode;

    function __construct($api_key, $shop_id, $base_url, $mode)
    {
        $this->headers[] = 'x-meska-api-key: ' . $api_key;
        $this->headers[] = 'x-meska-shop-id: ' . $shop_id;
        $this->base_url = $base_url;
        $this->mode = $mode;
    }

    private function _init()
    {
        $this->_ch = curl_init();
        curl_setopt($this->_ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, 1);
    }

    public function get($url)
    {
        $this->_init();
        curl_setopt($this->_ch, CURLOPT_URL, $this->base_url . $url);
        return $this->call();
    }

    public function post($url, $product_json)
    {
        $this->_init();

        $data = '{"product" : {"mode":"' . $this->mode . '","data":' . $product_json . '} }';
        curl_setopt($this->_ch, CURLOPT_URL, $this->base_url . $url);
        curl_setopt($this->_ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $data);
        return $this->call();
    }

    public function patch($url, $product_code, $product_json)
    {
        $this->_init();
        $data = '{"product" : {"mode":"' . $this->mode . '","data":' . $product_json . '} }';
        curl_setopt($this->_ch, CURLOPT_URL, $this->base_url . $url . '/' . $product_code);
        curl_setopt($this->_ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $data);
        return $this->call();
    }

    public function delete($url, $product_code)
    {
        $this->_init();
        $json = '{"product" : {"mode":"' . $this->mode . '","data":{"product_code":' . $product_code . '}} }';
        curl_setopt($this->_ch, CURLOPT_URL, $this->base_url . $url . '/' . $product_code);
        curl_setopt($this->_ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $json);
        return $this->call();
    }

    private function call()
    {
        $response = curl_exec($this->_ch);
        var_dump(curl_error($this->_ch));
        curl_close($this->_ch);
        return $response;
    }
}
