<?php

namespace Balanced;

use Balanced\Resource;
use Balanced\Settings;
use \RESTful\URISpec;

class Order extends Resource
{

    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('orders', 'id');
        self::$_registry->add(get_called_class());
    }
}