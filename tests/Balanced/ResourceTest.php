<?php

namespace Balanced\Test;

use Balanced\Core\Resource;
use Balanced\Settings;
use Balanced\APIKey;
use Balanced\Marketplace;
use Balanced\Credit;
use Balanced\Debit;
use Balanced\Refund;
use Balanced\Account;
use Balanced\Merchant;
use Balanced\BankAccount;
use Balanced\Card;

class SettingsTest extends \PHPUnit_Framework_TestCase
{
    function testConfigure()
    {
        Settings::configure('https://api.example.com', 'my-api-key');
        $this->assertEquals(Settings::$url_root, 'https://api.example.com');
        $this->assertEquals(Settings::$api_key, 'my-api-key');
    }
}

class APIKeyTest extends \PHPUnit_Framework_TestCase
{

    function testRegistry()
    {
        $this->expectOutputString('');
        $result = Resource::getRegistry()->match('/v1/api_keys');
        return;
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\APIKey',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/api_keys/1234');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\APIKey',
            'ids' => array('id' => '1234'),
            );
        $this->assertEquals($expected, $result);
    }
}

class MarketplaceTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/marketplaces');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\Marketplace',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/marketplaces/1122');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\Marketplace',
            'ids' => array('id' => '1122'),
            );
        $this->assertEquals($expected, $result);
    }
    
    function testCreateCard()
    {
    }
    
    function testCreateBankAccount()
    {
    }
    
    function testCreateBuyer()
    {
    }
}

class AccountTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/accounts');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\Account',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/accounts/0099');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\Account',
            'ids' => array('id' => '0099'),
            );
        $this->assertEquals($expected, $result);
    }

    function testCredit()
    {
    }
    
    function testDebit()
    {
    }
    
    function testHold()
    {
    }
    
    function testAddCard()
    {
    }
    
    function testAddBankAccount()
    {
    }
}

class HoldTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/holds');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\Hold',
        );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/holds/112233');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\Hold',
            'ids' => array('id' => '112233'),
        );
        $this->assertEquals($expected, $result);
    }
    
    function testVoid()
    {
    }
    
    function testCapture()
    {
    }
}

class CreditTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/credits');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\Credit',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/credits/9988');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\Credit',
            'ids' => array('id' => '9988'),
            );
        $this->assertEquals($expected, $result);
    }
}

class DebitTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/debits');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\Debit',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/debits/4545');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\Debit',
            'ids' => array('id' => '4545'),
            );
        $this->assertEquals($expected, $result);
    }
    
    function testRefund()
    {
         
    }
}

class RefundTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/refunds');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\Refund',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/refunds/1287');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\Refund',
            'ids' => array('id' => '1287'),
            );
        $this->assertEquals($expected, $result);
    }
}

class BankAccountTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/bank_accounts');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\BankAccount',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/bank_accounts/887766');
        $expected = array(
                'collection' => false,
                'class' => 'Balanced\BankAccount',
                'ids' => array('id' => '887766'),
        );
        $this->assertEquals($expected, $result);
    }
}

class CardTest extends \PHPUnit_Framework_TestCase
{
    function testRegistry()
    {
        $result = Resource::getRegistry()->match('/v1/cards');
        $expected = array(
            'collection' => true,
            'class' => 'Balanced\Card',
            );
        $this->assertEquals($expected, $result);
        $result = Resource::getRegistry()->match('/v1/cards/136asd6713');
        $expected = array(
            'collection' => false,
            'class' => 'Balanced\Card',
            'ids' => array('id' => '136asd6713'),
            );
        $this->assertEquals($expected, $result);
    }
}
