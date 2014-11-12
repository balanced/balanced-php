<?php

namespace Balanced;

use Balanced\Resource;
use \RESTful\URISpec;

/**
 * A Settlement is the action of moving money out of an Account to a bank
 * account.
 *
 */
class Settlement extends Resource
{
    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('settlement', 'id', '/');
        self::$_registry->add(get_called_class());
    }

}
