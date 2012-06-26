<?php

namespace Balanced\Core;

class Collection extends Pagination
{
    public function __constructor($resource, $uri, $data = null)
    {
        parent::__constructor($resource, $uri, $data);
    }
    
    public function create($payload)
    {
        $class = $this->resource;
        $client = $class::getClient();
        $response = $client->post($this->uri, $payload);
        return new $this->resource($response->body);
    }
    
    public function query()
    {
        return new Query($this->resource, $this->uri);
    }
}
