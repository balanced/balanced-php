<?php

namespace Balanced\Exceptions;

class HTTPError extends \Exception
{
    public $response;
     
    public function __construct($response)
    {
        $this->response = $response;
        $this->_objectify($this->response->body);
    }
    
    protected function _objectify($fields)
    {
        foreach ($fields as $key => $val)
            $this->$key = $val;
    }
}
