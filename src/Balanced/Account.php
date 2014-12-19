<?php

namespace Balanced;

use Balanced\Resource;
use \RESTful\URISpec;

/**
 * An Account is a funding instrument which has a stored value of funds inside
 * the Balanced system.
 */
class Account extends Resource
{
    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('accounts', 'id', '/');
        self::$_registry->add(get_called_class());
    }

    public function credit(
            $amount,
            $description = null,
            $meta = null,
            $appears_on_statement_as = null,
            $order = null)
    {
        return $this->credits->create(array(
            'amount' => $amount,
            'description' => $description,
            'meta' => $meta,
            'appears_on_statement_as' => $appears_on_statement_as,
            'order' => $order
        ));

    }

    public function settle(
        $funding_instrument,
        $appears_on_statement_as = null,
        $description = null,
        $meta = null)
    {
        return $this->settlements->create(array(
            'funding_instrument' => $funding_instrument,
            'appears_on_statement_as' => $appears_on_statement_as,
            'description' => $description,
            'meta' => $meta
        ));
    }
}
