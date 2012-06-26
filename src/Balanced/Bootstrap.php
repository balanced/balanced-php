<?php

namespace Balanced;

/**
 * Bootstrapper for Balanced does autoloading and resource initialization.
 */
class Bootstrap
{
    const DIR_SEPARATOR = DIRECTORY_SEPARATOR;
    const NAMESPACE_SEPARATOR = '\\';
    
    
    public static function init()
    {
        spl_autoload_register(array('\Balanced\Bootstrap', 'autoload'));
        self::_initResources();
    }
    
    public static function autoload($classname)
    {
        self::_autoload(dirname(dirname(__FILE__)), $classname);
    }
    
    private static function _autoload($base, $classname)
    {
        $parts = explode(self::NAMESPACE_SEPARATOR, $classname);
        $path = $base . self::DIR_SEPARATOR. implode(self::DIR_SEPARATOR, $parts) . '.php';
        require_once($path);
    }

    /**
     * Initializes resources (i.e. registers then with Resource::_registry). Note
     * that if you add a Resource the you must initialized it here.
     * 
     * @internal
     */
    private static function _initResources()
    {
        \Balanced\Core\Resource::init();
        \Balanced\APIKey::init();
        \Balanced\Marketplace::init();
        \Balanced\Account::init();
        \Balanced\Credit::init();
        \Balanced\Debit::init();
        \Balanced\Refund::init();
        \Balanced\Card::init();
        \Balanced\BankAccount::init();
        \Balanced\Hold::init();
    }
}
