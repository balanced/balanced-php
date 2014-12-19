<?php

namespace Balanced;

use Balanced\Resource;
use \RESTful\URISpec;

/**
 * A Settlement represents a transfer of funds from a sweep account to another
 * funding instrument.
 *
 */
class Settlement extends Resource
{
    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('settlements', 'id', '/');
        self::$_registry->add(get_called_class());
    }

}
