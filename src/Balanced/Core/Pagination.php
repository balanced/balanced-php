<?php

namespace Balanced\Core;

class Pagination implements \Iterator
{
    public $resource,
           $uri;
    
    protected $_page;

    public function __construct($resource, $uri, $data = null)
    {
        $this->resource = $resource;
        $this->uri = $uri;
        if ($data != null)
            $this->_page = new Page($resource, $uri, $data);
        else
            $this->_page = null;
    }
    
    protected function _getPage()
    {
        if ($this->_page == null)
            $this->_page = new Page($this->resource, $this->uri);
        return $this->_page;
    }

    public function total()
    {
        return $this->_getPage()->total;
    }

    public function current()
    {
        return $this->_getPage();
    }

    public function key()
    {
        return $this->_getPage()->index;
    }

    public function next()
    {
        $this->_page = $this->_getPage()->next();
    }

    public function rewind()
    {
        $this->_page = $this->_getPage()->first();
    }

    public function valid()
    {
        return $this->_page != null;
    }
}