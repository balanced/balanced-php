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
        $this->_page = new Page($resource, $uri, $data);
    }

    public function total()
    {
        return $this->_page->total;
    }

    public function current()
    {
        return $this->_page;
    }

    public function key()
    {
        return $this->_page->index;
    }

    public function next()
    {
        $this->_page = $this->_page->next();
    }

    public function rewind()
    {
        if ($this->_page == null)
            $this->_page = new Page($resource, $uri, $data);
        else
            $this->_page = $this->_page->first();
    }

    public function valid()
    {
        return $this->_page != null;
    }
}