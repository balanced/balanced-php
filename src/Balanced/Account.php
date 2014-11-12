<?php

namespace Balanced;

use Balanced\Resource;
use \RESTful\URISpec;

/**
 * An Account is a way to pool funds from across multiple Orders
 *
 */
class Account extends Resource
{
    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('accounts', 'id', '/');
        self::$_registry->add(get_called_class());
    }

}
