<?php

namespace Balanced;

use Balanced\Core\Resource;
use Balanced\Core\URISpec;

/**
 * Represent a buyer or merchant account on a marketplace.
 * 
 * You create these using Balanced\Marketplace->createBuyer or 
 * Balanced\Marketplace->createMerchant.
 * 
 * <code>
 * $marketplace = \Balanced\Marketplace::mine();
 * 
 * $card = $marketplace->cards->create(array(
 *     'street_address' => $street_address,
 *     'city' => 'Jollywood',
 *     'region' => 'CA',
 *     'postal_code' => '90210',
 *     'name' => 'Captain Chunk',
 *     'card_number' => '4111111111111111',
 *     'expiration_month' => 7,
 *     'expiration_year' => 2015
 *     ));
 *     
 * $buyer = $marketplace->createBuyer(
 *     'buyer@example.com',
 *     $card->uri,
 *     array(
 *         'my_id' => '1212121',
 *         )
 *     );
 * </code>
 */
class Account extends Resource
{
    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('accounts', 'id');
        self::$_registry->add(get_called_class());
    }
    
    /**
     * Credit the account.
     * 
     * @param int amount Amount to credit the account in USD pennies.
     * @param string description Optional description of the credit.
     * @param array[string]string meta Optional metadata to associate with the credit.
     * 
     * @return \Balanced\Credit
     */
    public function credit($amount, $description = null, $meta = null)
    {
        return $this->credits->create(array(
            'amount' => $amount,
            'description' => $description,
            'meta' => $meta,
            ));
    }
    
    /**
     * Debit the account.
     * 
     * @param int amount Amount to debit the account in USD pennies.   
     * @param string appears_on_statement_as Optional description of this debit as it should appear on the account's billing statement.
     * @param string description Optional description of the debit.
     * @param array[string]string meta Optional metadata to associate with the debit.
     * 
     * @return \Balanced\Debit
     */
    public function debit(
        $amount,
        $appears_on_statement_as = null,
        $description = null,
        $meta = null)
    {
        return $this->debits->create(array(
            'amount' => $amount,
            'appears_on_statement_as' => $appears_on_statement_as,
            'description' => $description,
            'meta' => $meta)
            );
    }
    
    /**
     * Create a hold (i.e. a guaranteed pending debit) for account funds. You
     * can later capture or void. A hold is assocaited with a account funding
     * source (i.e. \Balanced\Card). If you don't specify the source then the
     * current primary funding source for the account is used. 
     * 
     * @param int amount Amount of the hold in USD pennies.
     * @param string Optional description Description of the hold.
     * @param string Optional URI referencing the card to use for the hold.
     * @param array[string]string meta Optional metadata to associate with the hold.
     * 
     * @return \Balanced\Hold
     */
    public function hold(
        $amount,
        $description = null,
        $source_uri = null,
        $meta = null)
    {
        return $this->holds->create(array(
            'amount' => $amount,
            'description' => $description,
            'source_uri' => $source_uri,
            'meta' => $meta
            ));
    }
    
    /**
     * Associates a card with the account. The card should be created via 
     * \Balanced\Marketplace->createCard. The default funding source for this
     * account will be updated to the card. 
     * 
     * @param string card_uri URI referencing a card to add.
     * 
     * @return Balanced\Account
     */
    public function addCard($card_uri)
    {
        $this->card_uri = $card_uri;
        return $this->save();
    }
    
    /**
     * Associates a bank account with the account. The bank account should be
     * created via \Balanced\Marketplace->createCard. The default funding
     * destination for this account will be updated to the bank account.
     * 
     * @param string bank_account_uri URI referencing a bank account to add.
     
     * @return Balanced\Account
     */
    public function addBankAccount($bank_account_uri)
    {
        $this->bank_account_uri = $bank_account_uri;
        return $this->save();
    }
    
    /**
     * Promotes a role-less or buyer account to a merchant a bank account with
     * the account. See Balanced\Marketplace::createMerchant for details about
     * merchant creation. 
     *
     * @param mixed merchant Either an associative array describing the merchants identity or a string containing the a uri for a merchant.
     *       
     * @return Balanced\Account
     */
    public function promoteToMerchant($merchant)
    {
        $this->merchant = $merchant;
        return $this->save();
    }
}
