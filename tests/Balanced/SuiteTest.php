<?php

namespace Balanced\Test;

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
use Balanced\Exceptions\HTTPError;

/**
 * @group suite
 */
class SuiteTest extends \PHPUnit_Framework_TestCase
{
    const URL_ROOT = 'http://127.0.0.1:5000';
    
    static $key,
           $marketplace,
           $email_counter = 0;
    
    static function _createBuyer($email_address = null, $card = null)
    {
        if ($email_address == null)
            $email_address = sprintf('m+%d@poundpay.com', self::$email_counter++);
        if ($card == null)
            $card = self::_createCard();
        return self::$marketplace->createBuyer(
            $email_address,
            $card->uri,
            array('test#' => 'test_d')
        );
    }
    
    static function _createCard()
    {
        return self::$marketplace->createCard(
            '123 Fake Street',
            'Jollywood',
            'CA',
            '90210',
            'khalkhalash',
            '4112344112344113',
            12,
            2013);
    }
    
    static function _createBankAccount()
    {
        return self::$marketplace->createBankAccount(
            'Homer Jay',
            '112233a',
            '121042882'
            );
    }
    
    public static function _createPersonMerchant($email_address = null, $bank_account = null)
    {
        if ($email_address == null)
            $email_address = sprintf('m+%d@poundpay.com', self::$email_counter++);
        if ($bank_account == null)
            $bank_account = self::_createBankAccount();
        $merchant = array(
            'type' => 'person',
            'name' => 'William James',
            'tax_id' => '393-48-3992',
            'street_address' => '167 West 74th Street',
            'postal_code' => '10023',
            'dob' => '1842-01-01',
            'phone_number' => '+16505551234',
            'country_code' => 'USA'
            );
        return self::$marketplace->createMerchant(
            $email_address,
            $merchant,
            $bank_account->uri
            );
    }
    
    public static function _createBusinessMerchant($email_address = null, $bank_account = null)
    {
        if ($email_address == null)
            $email_address = sprintf('m+%d@poundpay.com', self::$email_counter++);
        if ($bank_account == null)
            $bank_account = self::_createBankAccount();
        $merchant = array(
            'type' => 'business',
            'name' => 'Levain Bakery',
            'tax_id' => '253912384',
            'street_address' => '167 West 74th Street',
            'postal_code' => '10023',
            'phone_number' => '+16505551234',
            'country_code' => 'USA',
            'person' => array(
                'name' => 'William James',
                'tax_id' => '393483992',
                'street_address' => '167 West 74th Street',
                'postal_code' => '10023',
                'dob' => '1842-01-01',
                'phone_number' => '+16505551234',
                'country_code' => 'USA',
                ),
            );
        return self::$marketplace->createMerchant(
            $email_address,
            $merchant,
            $bank_account->uri
            );
    }
    
    public static function setUpBeforeClass()
    {
        Settings::configure(self::URL_ROOT, null);
        self::$key = new APIKey();
        self::$key->save();
        Settings::configure(self::URL_ROOT, self::$key->secret);
        self::$marketplace = new Marketplace();
        self::$marketplace->save();
    }
         
    function testMarketplaceMine()
    {
        $marketplace = Marketplace::mine();
        $this->assertEquals($this::$marketplace->id, $marketplace->id);
    }
    
    /**
     * @expectedException Balanced\Exceptions\HTTPError
     */
    function testAnotherMarketplace()
    {
        $marketplace = new Marketplace();
        $marketplace->save();
    }
    
    /**
     * @expectedException Balanced\Exceptions\HTTPError
     */
    function testDuplicateEmailAddress()
    {
        self::_createBuyer('dupe@poundpay.com');
        self::_createBuyer('dupe@poundpay.com');
    }
    
    function testIndexMarketplace()
    {
        $marketplaces = Marketplace::query()->all();
        $this->assertEquals(count($marketplaces), 1);
    }
    
    function testCreateBuyer()
    {
        self::_createBuyer();
    }
    
    function testDebitAndRefundBuyer()
    {
        $buyer = self::_createBuyer();
        $debit = $buyer->debit(
            1000,
            'something i bought',
            'Softie',
            array('hi' => 'bye')
            );
        $refund = $debit->refund(100);
    }
    
    function testCreateAndVoidHold()
    {
        $buyer = self::_createBuyer();
        $hold = $buyer->hold(1000);
        $this->assertEquals($hold->is_void, false);
        $hold->void();
        $this->assertEquals($hold->is_void, true);
    }
    
    function testCreateAndCaptureHold()
    {
        $buyer = self::_createBuyer();
        $hold = $buyer->hold(1000);
        $debit = $hold->capture(9090);
        $this->assertEquals($debit->account->id, $buyer->id);
        $this->assertEquals($debit->hold->id, $hold->id);
        $this->assertEquals($hold->debit->id, $debit->id);
    }
    
    function testCreatePersonMerchant()
    {
        $merchant = self::_createPersonMerchant();
    }
    
    function testCreateBusinessMerchant()
    {
        $merchant = self::_createBusinessMerchant();
    }

    /**
     * @expectedException Balanced\Exceptions\HTTPError
     */
    function testCreditReqeuiresNonZeroAmount()
    {
        $buyer = self::_createBuyer();
        $buyer->debit(
            1000,
            'something i bought',
            'Softie'
        );
        $merchant = self::_createBusinessMerchant();
        $merchant->credit(0);
    }

    /**
     * @expectedException Balanced\Exceptions\HTTPError
     */
    function testCreditMoreThanEscrowBalanceFails()
    {
        $buyer = self::_createBuyer();
        $buyer->debit(
            1000,
            'something i bought',
            'Softie'
            );
        $merchant = self::_createBusinessMerchant();
        $merchant->credit(self::$marketplace->in_escrow + 1);
    }
    
    function testAssociateCard()
    {
        $merchant = self::_createPersonMerchant();
        $card = self::_createCard();
        $merchant->addCard($card->uri);
    }
    
    function testAssociateBankAccount()
    {
        $merchant = self::_createPersonMerchant();
        $bank_account = self::_createBankAccount();
        $merchant->addBankAccount($bank_account->uri);
    }
    
    function testCardMasking()
    {
        $card = self::$marketplace->createCard(
            '123 Fake Street',
            'Jollywood',
            'CA',
            '90210',
            'khalkhalash',
            '4112344112344113',
            12,
            2013);
        $this->assertEquals($card->last_four, '4113');
        $this->assertFalse(property_exists($card, 'number'));
    }
    
    function testBankAccountMasking()
    {
        $bank_account = self::$marketplace->createBankAccount(
            'Homer Jay',
            '112233a',
            '121042882'
            );
        $this->assertEquals($bank_account->last_four, '233a');
        $this->assertFalse(property_exists($bank_account, 'account_number'));
    }
    
    function testFilteringAndSorting()
    {
        $buyer = self::_createBuyer();
        $debit1 = $buyer->debit(1122, null, null, array('tag' => '1'));
        $debit2 = $buyer->debit(3322, null, null, array('tag' => '1'));
        $debit3 = $buyer->debit(2211, null, null, array('tag' => '2'));
        
        $getId = function($o) {
            return $o->id;   
        };
        
        $debits = (
            self::$marketplace->debits->query()
            ->filter(Debit::$f->meta->tag->eq('1'))
            ->all());
        $debit_ids = array_map($getId, $debits);
        $this->assertEquals($debit_ids, array($debit1->id, $debit2->id));
        
        $debits = (
            self::$marketplace->debits->query()
            ->filter(Debit::$f->meta->tag->eq('2'))
            ->all());
        $debit_ids = array_map($getId, $debits);
        $this->assertEquals($debit_ids, array($debit3->id));
        
        $debits = (
            self::$marketplace->debits->query()
            ->filter(Debit::$f->meta->contains('tag'))
            ->all());
        $debit_ids = array_map($getId, $debits);
        $this->assertEquals($debit_ids, array($debit1->id, $debit2->id, $debit3->id));
        
        $debits = (
            self::$marketplace->debits->query()
            ->filter(Debit::$f->meta->contains('tag'))
            ->sort(Debit::$f->amount->desc())
            ->all());
        $debit_ids = array_map($getId, $debits);
        $this->assertEquals($debit_ids, array($debit2->id, $debit3->id, $debit1->id));
    }

    function testMerchantIdentityFailure()
    {
        // NOTE: postal_code == '99999' && region == 'EX' triggers identity failure
        $identity = array(
            'type' => 'business',
            'name' => 'Levain Bakery',
            'tax_id' => '253912384',
            'street_address' => '167 West 74th Street',
            'postal_code' => '99999',
            'region' => 'EX',
            'phone_number' => '+16505551234',
            'country_code' => 'USA',
            'person' => array(
                'name' => 'William James',
                'tax_id' => '393483992',
                'street_address' => '167 West 74th Street',
                'postal_code' => '99999',
                'region' => 'EX',
                'dob' => '1842-01-01',
                'phone_number' => '+16505551234',
                'country_code' => 'USA',
                ),
            );
        
        try {
            self::$marketplace->createMerchant(
                sprintf('m+%d@poundpay.com', self::$email_counter++),
                $identity
                );
        }
        catch(HTTPError $e) {
            $this->assertEquals($e->response->code, 300);
            $expected = sprintf('https://www.balancedpayments.com/marketplaces/%s/kyc', self::$marketplace->id);
            $this->assertEquals($e->redirect_uri, $expected);
            $this->assertEquals($e->response->headers['Location'], $expected);
            return;
        }
        $this->fail('Expected exception HTTPError not raised.');
    }    
}
