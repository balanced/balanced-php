<?php

namespace Balanced\Test;

\Balanced\Bootstrap::init();
\RESTful\Bootstrap::init();
\Httpful\Bootstrap::init();

use Balanced\Settings;
use Balanced\APIKey;
use Balanced\Marketplace;
use Balanced\Credit;
use Balanced\Debit;
use Balanced\Refund;
use Balanced\Merchant;
use Balanced\BankAccount;
use Balanced\Card;
use Balanced\Customer;
use Balanced\Dispute;


/**
 * Suite test cases. These talk to an API server and so make network calls.
 *
 * Environment variables can be used to control client settings:
 *
 * <ul>
 *     <li>$BALANCED_URL_ROOT If set applies to \Balanced\Settings::$url_root.
 *     <li>$BALANCED_API_KEY If set applies to \Balanced\Settings::$api_key.
 * </ul>
 *
 * @group suite
 */
class SuiteTest extends \PHPUnit_Framework_TestCase
{
    static $key,
        $marketplace,
        $email_counter = 0;

    static function _emailAddress()
    {
        return sprintf('m+%d@poundpay.com', self::$email_counter++);
    }

    static function _createBuyer($email_address = null, $card = null)
    {
        if ($email_address == null)
            $email_address = self::_emailAddress();
        if ($card == null)
            $card = self::_createCard();
        return self::$marketplace->createBuyer(
            $email_address,
            $card->href,
            array('test#' => 'test_d'),
            'Hobo Joe'
        );
    }

    static function _createCard($customer= null)
    {
        $card = self::$marketplace->createCard(
            '123 Fake Street',
            'Jollywood',
            null,
            '90210',
            'khalkhalash',
            '4112344112344113',
            null,
            12,
            2016);
        if ($customer != null) {
            $card->associateToCustomer($customer);
        }
        return $card;
    }

    static function _createCardwithDispute($customer= null)
    {
        $card = self::$marketplace->cards->create(array(
        "expiration_month" => "12",
        "expiration_year" => "2020",
        "number" => "6500000000000002",
        "security_code" => "123",
        ));
        if ($customer != null) {
            $card->associateToCustomer($customer);
        }
        return $card;
    }

    static function _createBankAccount($customer = null)
    {
        $bank_account = self::$marketplace->createBankAccount(
            'Homer Jay',
            '112233a',
            '121042882',
            'checking'
        );
        if ($customer != null) {
            $bank_account->associateToCustomer($customer);
        }
        return $bank_account;
    }

    public static function _createPersonMerchant($email_address = null, $bank_account = null)
    {
        if ($email_address == null)
            $email_address = self::_emailAddress();
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
            $bank_account->href
        );
    }

    public static function _createBusinessMerchant($email_address = null, $bank_account = null)
    {
        if ($email_address == null)
            $email_address = self::_emailAddress();
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
            $bank_account->href
        );
    }

    public function _createPersonCustomer($email_address = null)
    {
        if ($email_address == null)
            $email_address = self::_emailAddress();
        $customer = new Customer(array(
            "name" => "John Lee Hooker",
            "twitter" => "@balanced",
            "phone" => "(904) 555-1796",
            "meta" => array(
                "meta can store" => "any flat key/value data you like",
                "github" => "https://github.com/balanced",
                "more_additional_data" => 54.8
            ),
            "facebook" => "https://facebook.com/balanced",
            "address" => array(
                "city" => "San Francisco",
                "state" => "CA",
                "postal_code" => "94103",
                "line1" => "965 Mission St",
                "country_code" => "US"
            ),
            "ssn_last4" => "3209",
            "email" => $email_address,
        ));
        $customer->save();
        return $customer;
    }

    public function _createBusinessCustomer($email_address = null)
    {
        if ($email_address == null)
            $email_address = self::_emailAddress();
        $customer = new Customer(array(
            "name" => "John Lee Hooker",
            "twitter" => "@balanced",
            "phone" => "(904) 555-1796",
            "meta" => array(
                "meta can store" => "any flat key/value data you like",
                "github" => "https://github.com/balanced",
                "more_additional_data" => 54.8
            ),
            "facebook" => "https://facebook.com/balanced",
            "address" => array(
                "city" => "San Francisco",
                "state" => "CA",
                "postal_code" => "94103",
                "line1" => "965 Mission St",
                "country_code" => "US"
            ),
            "business_name" => "Balanced",
            "ssn_last4" => "3209",
            "email" => $email_address,
            "ein" => "123456789"
        ));
        $customer->save();
        return $customer;
    }

    public static function setUpBeforeClass()
    {
        // url root
        $url_root = getenv('BALANCED_URL_ROOT');
        if ($url_root != '') {
            Settings::$url_root = $url_root;
        } else
            Settings::$url_root = 'https://api.balancedpayments.com';

        // api key
        $api_key = getenv('BALANCED_API_KEY');
        if ($api_key != '') {
            Settings::$api_key = $api_key;
        } else {
            self::$key = new APIKey();
            self::$key->save();
            Settings::$api_key = self::$key->secret;
        }

        // marketplace
        try {
            self::$marketplace = Marketplace::mine();
        } catch (\RESTful\Exceptions\NoResultFound $e) {
            self::$marketplace = new Marketplace();
            self::$marketplace->save();
        }
    }

    function testMarketplaceMine()
    {
        $marketplace = Marketplace::mine();
        $this->assertEquals($this::$marketplace->id, $marketplace->id);
    }

    /**
     * @expectedException \Balanced\Errors\Error
     */
    function testAnotherMarketplace()
    {
        $marketplace = new Marketplace();
        $marketplace->save();
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

    function testCreateCustomerWithoutEmailAddress()
    {
        self::$marketplace->createCustomer();
    }

    function testGetBuyer()
    {
        $buyer1 = self::_createBuyer();
        $buyer2 = Customer::get($buyer1->href);
        $this->assertEquals($buyer1->id, $buyer2->id);
    }

    function testDebitAndRefundBuyer()
    {
        $buyer = self::_createBuyer();
        $debit = $buyer->cards->first()->debit(
            1000,
            'Softie',
            'something i bought',
            array('hi' => 'bye')
        );
        $refund = $debit->refund(100);
    }

    /**
     * @expectedException \Balanced\Errors\Error
     */
    function testDebitZero()
    {
        $buyer = self::_createBuyer();
        $debit = $buyer->cards->first()->debit(
            0,
            'Softie',
            'something i bought'
        );
    }

    function testMultipleRefunds()
    {
        $buyer = self::_createBuyer();
        $debit = $buyer->cards->first()->debit(
            1500,
            'Softie',
            'something tart',
            array('hi' => 'bye'));
        $refunds = array(
            $debit->refund(100),
            $debit->refund(100),
            $debit->refund(100),
            $debit->refund(100));
        $expected_refund_ids = array_map(
            function ($x) {
                return $x->id;
            }, $refunds);
        sort($expected_refund_ids);
        $this->assertEquals($debit->refunds->total(), 4);

        // itemization
        $total = 0;
        $refund_ids = array();
        foreach ($debit->refunds as $refund) {
            $total += $refund->amount;
            array_push($refund_ids, $refund->id);
        }
        sort($refund_ids);
        $this->assertEquals($total, 400);
        $this->assertEquals($expected_refund_ids, $refund_ids);

        // pagination
        $total = 0;
        $refund_ids = array();
        foreach ($debit->refunds->paginate() as $page) {
            foreach ($page->items as $refund) {
                $total += $refund->amount;
                array_push($refund_ids, $refund->id);
            }
        }
        sort($refund_ids);
        $this->assertEquals($total, 400);
        $this->assertEquals($expected_refund_ids, $refund_ids);
    }

    function testDebitSource()
    {
        $buyer = self::_createBuyer();
        $card1 = self::_createCard($buyer);
        $card2 = self::_createCard($buyer);



        $debit1 = $card1->debit(
            1000,
            'Softie',
            'something i bought'
        );

        $this->assertEquals($debit1->source->id, $card1->id);


        $debit2 = $card2->debit(
            1000,
            'Softie',
            'something i bought',
            null//,
            //$card1
        );
        $this->assertEquals($debit2->source->id, $card2->id);
    }

    function testOrder()
    {
        $buyer = self::_createBuyer();
        $merchant = self::_createPersonMerchant();
        $order = $merchant->createOrder();
        $debit = $order->debitFrom($buyer->cards->first(), 5000);
        $credit = $order->creditTo($merchant->bank_accounts->first(), 2500);
        $this->assertEquals($debit->order->id, $order->id);
        $this->assertEquals($credit->order->id, $order->id);
    }

    function testOrderUpdate()
    {
        $merchant = self::_createPersonMerchant();
        $order = $merchant->orders->create();
        $this->assertNotNull($order->href);
        $order->meta = array(
            'test' => '123'
        );
        $order->description = 'hello world';
        $order->save();
        $order2 = \Balanced\Order::get($order->href);
        $this->assertEquals($order2->meta->test, '123');
        $this->assertEquals($order2->description, 'hello world');
    }

    function testCreateAndVoidHold()
    {
        $buyer = self::_createBuyer();
        $hold = $buyer->cards->first()->hold(1000);
        $this->assertNull($hold->voided_at);
        $hold->void();
        $this->assertNotNull($hold->voided_at);
    }

    function testCreateAndCaptureHold()
    {
        $buyer = self::_createBuyer();
        $hold = $buyer->cards->first()->hold(1000);
        $debit = $hold->capture(909);
        $this->assertEquals($debit->customer->id, $buyer->id);
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
     * @expectedException \Balanced\Errors\Error
     */
    function testCreditRequiresNonZeroAmount()
    {
        $buyer = self::_createBuyer();
        $buyer->cards->first()->debit(
            1000,
            'Softie',
            'something i bought'
        );
        $merchant = self::_createBusinessMerchant();
        $merchant->bank_accounts->first()->credit(0);
    }

    /**
     * @expectedException \Balanced\Errors\Error
     */
    function testCreditMoreThanEscrowBalanceFails()
    {
        $buyer = self::_createBuyer();
        $buyer->cards->first()->debit(
            1000
        );

        $merchant = self::_createBusinessMerchant();
        $merchant->bank_accounts->first()->credit(
            self::$marketplace->in_escrow + 10000000000);
    }

    function testCreditDestiation()
    {
        $buyer = self::_createBuyer();
        $buyer->cards->first()->debit(3000); # NOTE: build up escrow balance to credit

        $merchant = self::_createPersonMerchant();
        $bank_account1 = self::_createBankAccount($merchant);
        $bank_account2 = self::_createBankAccount($merchant);

        $credit = $merchant->bank_accounts->first()->credit(
            1000,
            'something i sold',
            null,
            null
        );
        $this->assertEquals($credit->destination->id, $bank_account2->id);

        $credit = $bank_account1->credit(
            1000,
            'something i sold',
            null
        );
        $this->assertEquals($credit->destination->id, $bank_account1->id);
    }

    function testAssociateCard()
    {
        $merchant = self::_createPersonMerchant();
        $card = self::_createCard();
        $card->associateToCustomer($merchant);
    }

    function testAssociateBankAccount()
    {
        $merchant = self::_createPersonMerchant();
        $bank_account = self::_createBankAccount();
        $bank_account->associateToCustomer($merchant);
    }

    function testCardMasking()
    {
        $card = self::$marketplace->createCard(
            '123 Fake Street',
            'Jollywood',
            null,
            '90210',
            'khalkhalash',
            '4112344112344113',
            '123',
            12,
            2016);
        $this->assertEquals($card->number, 'xxxxxxxxxxxx4113');
    }

    function testBankAccountMasking()
    {
        $bank_account = self::$marketplace->createBankAccount(
            'Homer Jay',
            '112233a',
            '121042882',
            'checking'
        );
        $this->assertEquals($bank_account->account_number, 'xxx233a');
    }

    function testFilteringAndSorting()
    {
        $buyer = self::_createBuyer();
        $debit1 = $buyer->cards->first()->debit(1122, null, null, array('tag' => '1'));
        $debit2 = $buyer->cards->first()->debit(3322, null, null, array('tag' => '1'));
        $debit3 = $buyer->cards->first()->debit(2211, null, null, array('tag' => '2'));

        $getId = function ($o) {
            return $o->id;
        };

        $debits = (
        self::$marketplace->debits->query()
            ->filter(Debit::$f->meta->tag->eq('1'))
            ->sort(Debit::$f->created_at->asc())
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
            ->sort(Debit::$f->created_at->asc())
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
            'bussiness_name' => 'Levain Bakery',
            'tax_id' => '253912384',
            'address' => array(
                'street_address' => '167 West 74th Street',
                'postal_code' => '99999',
                'region' => 'EX',
                'country_code' => 'USA',
            ),
            'phone_number' => '+16505551234',
            'name' => 'William James',
            'dob_month' => '01',
            'dob_year' => '1942'
        );
        $merchant = self::$marketplace->createMerchant(
            "something@example.com",
            $identity
        );
        $this->assertNotEquals($merchant->merchant_status, 'underwritten');
    }

    function testInternationalCard()
    {
        $payload = array(
            'number' => '4111111111111111',
            'expiration_month' => 12,
            'expiration_year' => 2014,
            'name' => 'Johnny Fresh',
            'address' => array(
                'postal_code' => '4020054',
                'line1' => '\xe7\x94\xb0\xe5\x8e\x9f\xef\xbc\x93\xe3\x83\xbc\xef\xbc\x98\xe3\x83\xbc\xef\xbc\x91',
                'city' => '\xe9\x83\xbd\xe7\x95\x99\xe5\xb8\x82',
                'country_code' => 'JPN'
            )
        );
        $card = self::$marketplace->cards->create($payload);
        $this->assertEquals($card->address->line1, $payload['address']['line1']);
    }

    /**
     * @expectedException \RESTful\Exceptions\NoResultFound
     */
    function testCustomerWithEmailAddressNotFound()
    {
        self::$marketplace->customers->query()
            ->filter(Customer::$f->email->eq('unlikely@address.com'))
            ->one();
    }

    function testDebitACard()
    {
        $buyer = self::_createBuyer();
        $card = self::_createCard($buyer);
        $debit = $card->debit(
            1000,
            'Softie',
            'something i bought',
            array('hi' => 'bye'));
        $this->assertEquals($debit->source->href, $card->href);
    }

    function testDebitAnUnassociatedCard()
    {
        $card = self::_createCard();
        $debit = $card->debit(1000, 'Softie');
        $this->assertEquals($debit->source->id, $card->id);
    }

    function testCreditABankAccount()
    {
        $buyer = self::_createBuyer();
        $buyer->cards->first()->debit(101); # NOTE: build up escrow balance to credit

        $merchant = self::_createPersonMerchant();
        $bank_account = self::_createBankAccount($merchant);
        $credit = $bank_account->credit(55, 'something sour');
        $this->assertEquals($credit->destination->href, $bank_account->href);
    }

    function testQuery()
    {
        $buyer = self::_createBuyer();
        $tag = '123123123123';
        $debit1 = $buyer->cards->first()->debit(1122, null, null, array('tag' => $tag));
        $debit2 = $buyer->cards->first()->debit(3322, null, null, array('tag' => $tag));
        $debit3 = $buyer->cards->first()->debit(2211, null, null, array('tag' => $tag));
        $expected_debit_ids = array($debit1->id, $debit2->id, $debit3->id);

        $query = (
        self::$marketplace->debits->query()
            ->filter(Debit::$f->meta->tag->eq($tag))
            ->sort(Debit::$f->created_at->asc())
            ->limit(1));

        $this->assertEquals($query->total(), 3);

        $debit_ids = array();
        foreach ($query as $debits) {
            array_push($debit_ids, $debits->id);
        }
        $this->assertEquals($debit_ids, $expected_debit_ids);

        $debit_ids = array($query[0]->id, $query[1]->id, $query[2]->id);
        $this->assertEquals($debit_ids, $expected_debit_ids);
    }

    function testBuyerPromoteToMerchant()
    {
        $buyer = self::_createBuyer();
        $buyer->name = 'William James';
        $buyer->ssn_last4 = '1234';
        $buyer->dob_month = '10';
        $buyer->dob_year = '1988';
        $buyer->address->line1 = '167 West 74th Street';
        $buyer->address->postal_code = '10023';
        $buyer->address->country_code = 'USA';
        $buyer->phone_number = '+16505551234';

        $buyer->save();

        $this->assertEquals($buyer->merchant_status, "underwritten");
    }

    function testCreditCustomerlessBankAccount()
    {
        $buyer = self::_createBuyer();
        $buyer->cards->first()->debit(101); # NOTE: build up escrow balance to credit

        $bank_account = self::_createBankAccount();
        $credit = $bank_account->credit(55, 'something sour');
        $this->assertEquals($credit->destination->id, $bank_account->id);
        $bank_account = $bank_account->get($bank_account->id);
        $this->assertEquals($bank_account->credits->total(), 1);
    }

    function testCreditUnstoredBankAccount()
    {
        $buyer = self::_createBuyer();
        $buyer->cards->first()->debit(101); # NOTE: build up escrow balance to credit

        $credit = Credit::bankAccount(
            55,
            array(
                'name' => 'Homer Jay',
                'account_number' => '112233a',
                'routing_number' => '121042882',
                'account_type' => 'checking',
            ),
            'something sour');
        $credit = Credit::get($credit->href);
        $this->assertEquals($credit->destination->name, 'Homer Jay');
        $this->assertEquals($credit->destination->account_number, 'xxx233a');
        $this->assertEquals($credit->destination->account_type, 'checking');
    }

    function testDeleteBankAccount()
    {
        $bank_account = self::_createBankAccount();
        $bank_account->unstore();
        return $bank_account->href;
    }

    function testGetDeletedBankAccount()
    {
        // getting directly at the uri should still return the item, but it shouldn't be in a page
        $ba_uri = $this->testDeleteBankAccount();
        BankAccount::get($ba_uri);
    }

    function testGetBankAccounById()
    {
        $bank_account = self::_createBankAccount();
        $bank_account_2 = BankAccount::get($bank_account->id);
        $this->assertEquals($bank_account_2->id, $bank_account->id);
    }


    function testGetDispute()
    {
        $card = self::_createCardwithDispute();
        $debit = $card->debit(
            5566,
            null,
            null,
            null,
            null,
            null);

        $timeout = 12 * 60;
        $interval = 10;
        $begin_time = microtime(true);

        while (true) {
            $polled_debit = Debit::get($debit->href);
            $polled_dispute = $polled_debit->dispute;
            if (get_class($polled_dispute) == 'Balanced\Dispute') {
                $dispute = $polled_dispute;
            }

            if (isset($dispute)) {
                break;
            }
            $elapsed_time = microtime(true) - $begin_time;
            if ($elapsed_time > $timeout){
                throw new RoutingException('Timeout');
            }
            error_log("Polling disputes... elapsed $elapsed_time ", 0);
            sleep($interval);
        }

        $this->assertInstanceOf('Balanced\Dispute', $dispute);
        $this->assertEquals($dispute->status, "pending");
        $this->assertEquals($dispute->reason, "fraud");
        $this->assertEquals($dispute->amount, $debit->amount);
    }

    /**
     * @expectedException \Balanced\Errors\InsufficientFunds
     */
    function testInsufficientFunds()
    {
        $marketplace = Marketplace::get(self::$marketplace->href);
        $amount = $marketplace->in_escrow + 100;
        $credit = Credit::bankAccount(
            $amount,
            array(
                'name' => 'Homer Jay',
                'account_number' => '112233a',
                'routing_number' => '121042882',
                'type' => 'checking',
            ),
            'something sour');
    }

    function testCreateCallback()
    {
        $callback = self::$marketplace->createCallback(
            'http://example.com/php'
        );
        $this->assertEquals($callback->url, 'http://example.com/php');
    }

    /**
     * @expectedException \Balanced\Errors\BankAccountVerificationFailure
     */
    function testBankAccountVerificationFailure()
    {
        $bank_account = self::_createBankAccount();
        $buyer = self::_createBuyer();
        $bank_account->associateToCustomer($buyer);
        $verification = $bank_account->verify();
        $verification->confirm(1, 2);
    }

    /**
     * @expectedException \Balanced\Errors\BankAccountVerificationFailure
     */
    function testBankAccountVerificationDuplicate()
    {
        $bank_account = self::_createBankAccount();
        $buyer = self::_createBuyer();
        $bank_account->associateToCustomer($buyer);
        $bank_account->verify();
        $bank_account->verify();
    }

    function testBankAccountVerificationSuccess()
    {
        $bank_account = self::_createBankAccount();
        $buyer = self::_createBuyer();
        $bank_account->associateToCustomer($buyer);
        $verification = $bank_account->verify();
        $verification->confirm(1, 1);

        //  this will fail if the bank account is not verified
        $debit = $buyer->bank_accounts->first()->debit(
            1000,
            'Softie',
            'something i bought',
            array('hi' => 'bye')
        );
        $this->assertTrue(strpos($debit->source->href, 'bank_account') > 0);
    }

    function testEvents()
    {
        $prev_num_events = Marketplace::mine()->events->total();
        $account = self::_createBuyer();
        $account->cards->first()->debit(123);
        $cur_num_events = Marketplace::mine()->events->total();
        $count = 0;
        while ($cur_num_events == $prev_num_events && $count < 60) {
            printf("waiting for events - %d, %d == %d\n", $count + 1, $cur_num_events, $prev_num_events);
            sleep(2); // 2 seconds
            $cur_num_events = Marketplace::mine()->events->total();
            $count += 1;
        }
        $this->assertTrue($cur_num_events > $prev_num_events);
    }

    function testCustomerPersonCreate()
    {
        $this->_createPersonCustomer();
    }

    function testCustomerBusinessCreate()
    {
        $this->_createBusinessCustomer();
    }

    function testCustomerAddCard()
    {
        $customer = $this->_createPersonCustomer();
        $active_card = $customer->cards->first();
        $this->assertNull($active_card);

        $card = $this->_createCard();
        $card->associateToCustomer($customer);
        $active_card = $customer->cards->first();
        $this->assertEquals($active_card->id, $card->id);

        $active_card->invalidate();
        $active_card = $customer->cards->first();
        $this->assertNull($active_card);
    }

    function testCustomerAddBankAccount()
    {
        $customer = $this->_createBusinessCustomer();
        $active_bank_account = $customer->bank_accounts->first();
        $this->assertNull($active_bank_account);

        $bank_account = $this->_createBankAccount();
        $bank_account->associateToCustomer($customer);
        $active_bank_account = $customer->bank_accounts->first();
        $this->assertEquals($active_bank_account->id, $bank_account->id);

        $active_bank_account->invalidate();
        $active_bank_account = $customer->bank_accounts->first();
        $this->assertNull($active_bank_account);
    }

    function testCustomerCreditDebit()
    {
        $buyer = $this->_createPersonCustomer();
        $card = $this->_createCard();
        $card->associateToCustomer($buyer);

        $seller = $this->_createBusinessCustomer();
        $bank_account = $this->_createBankAccount();
        $bank_account->associateToCustomer($seller);

        $debit = $buyer->cards->first()->debit(
            1234,
            "TANGY",
            "something tangy",
            array("ship" => "soonish"),
            null,
            null);

        $credit = $seller->bank_accounts->first()->credit(
            1200,
            "something tangy",
            array("ship" => "soonish"),
            null);

        $this->assertEquals($debit->source->id, $card->id);
        $this->assertEquals($credit->destination->id, $bank_account->id);
    }

    function testDeleteCard()
    {
        $card = self::_createCard();
        $card->unstore();
        return $card->href;

    }

    function testGetDeletedCard()
    {
        $card_href = $this->testDeleteCard();
        Card::get($card_href);
    }

    function testReversal()
    {
        $buyer = $this->_createBuyer();
        $debit = $buyer->cards->first()->debit(
            1000,
            'Softie',
            'something i bought',
            array('hi' => 'bye')
        );
        $merchant = $this->_createPersonMerchant();
        $credit = $merchant->bank_accounts->first()->credit(1000);
        $reverse = $credit->reverse();
        $this->assertEquals($reverse->credit->href, $credit->href);
        $this->assertEquals($reverse->amount, 1000);
    }

    function testSourceHREF()
    {
        $customer = $this->_createPersonCustomer();
        $card = $this->_createCard();
        $card->associateToCustomer($customer);
        $this->assertNotNull($card->customer->href);
        $this->assertInstanceOf('Balanced\Card',
                                $customer->cards->first());
    }
}
