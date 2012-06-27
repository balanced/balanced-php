<?php

namespace Balanced;

use Balanced\Core\Resource;
use Balanced\Core\URISpec;

/**
 * Represents an account card.
 * 
 * You can create these via Marketplace->cards->create or
 * Marketplace->createCard. Associate them with a buyer or merchant one
 * creation via Marketplace->createBuyer or Marketplace->createMerchant and
 * with an existing buyer or merchant use Account->addCard.
 * 
 * <code>
 * $marketplace = \Balanced\Marketplace::mine();
 * 
 * $card = $marketplace->cards->create(array(
 *     'name' => 'name',
 *     'account_number' => '11223344',
 *     'bank_code' => '1313123'
 *     ));
 * 
 * $account = $marketplace
 *     ->accounts
 *     ->query()
 *     ->filter(Account::f->email_address->eq('buyer@example.com'))
 *     ->one();
 * $account->addCard($card->uri);
 * </code>
 */
class Card extends Resource
{
    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('cards', 'id', '/v1');
        self::$_registry->add(get_called_class());
    }
}
