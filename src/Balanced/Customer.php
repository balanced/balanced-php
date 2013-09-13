<?php

namespace Balanced;

use Balanced\Resource;
use \RESTful\URISpec;

/**
 * Represent a buyer or merchant within your marketplace.
 *
 * You create these using new Balanced\Customer.
 *
 * <code>
 * $customer = new Customer(array(
 *     "name" => "John Lee Hooker",
 *     "twitter" => "@balanced",
 *     "phone" => "(904) 555-1796",
 *     "meta" => array(
 *         "meta can store" => "any flat key/value data you like",
 *         "github" => "https://github.com/balanced",
 *         "more_additional_data" => 54.8
 *     ),
 *     "facebook" => "https://facebook.com/balanced",
 *     "address" => array(
 *         "city" => "San Francisco",
 *         "state" => "CA",
 *         "postal_code" => "94103",
 *         "line1" => "965 Mission St",
 *         "country_code" => "US"
 *     ),
 *     "business_name" => "Balanced",
 *     "ssn_last4" => "3209",
 *     "email" => $email_address,
 *     "ein" => "123456789"));
 * </code>
 */
class Customer extends Resource
{
    protected static $_uri_spec = null;

    public static function init()
    {
        self::$_uri_spec = new URISpec('customers', 'id', '/v1');
        self::$_registry->add(get_called_class());
    }

    /**
     * Creates or associates a created card with the account. The default
     * funding source for the account will be this card.
     *
     * @see \Balanced\Marketplace->createCard
     *
     * @param mixed card \Balanced\Card or URI referencing a card to associate with the account. Alternatively it can be an associative array describing a card to create and associate with the account.
     *
     * @return \Balanced\Account
     */
    public function addCard($card)
    {
        if (is_string($card))
            $this->card_uri = $card;
        else if (is_array($card))
            $this->card = $card;
        else
            $this->card_uri = $card->uri;
        return $this->save();
    }

    /**
     * Retieves the most recently added, active \Balanced\Card or null if this
     * customer has no active cards.
     *
     * @return \Balanced\Card
     */
    public function activeCard()
    {
        $card = (
            $this->cards->query()
            ->filter(Card::$f->is_valid->eq(True))
            ->sort(Card::$f->created_at->desc())
            ->first()
        );
        return $card;
    }


    /**
     * Creates or associates a created bank account with the account. The
     * new default funding destination for the account will be this bank account.
     *
     * @see \Balanced\Marketplace->createBankAccount
     *
     * @param mixed bank_account \Balanced\BankAccount or URI for a bank account to associate with the account. Alternatively it can be an associative array describing a bank account to create and associate with the account.
     *
     * @return \Balanced\Account
     */
    public function addBankAccount($bank_account)
    {
        if (is_string($bank_account))
            $this->bank_account_uri = $bank_account;
        else if (is_array($bank_account))
            $this->bank_account = $bank_account;
        else
            $this->bank_account_uri = $bank_account->uri;
        return $this->save();
    }

    /**
     * Retieves the most recently added, active \Balanced\BankAccount or null
     * if this customer has no active bank accounts.
     *
     * @return \Balanced\BankAccount
     */
    public function activeBankAccount()
    {
        $bank_account = (
            $this->bank_accounts->query()
            ->filter(BankAccount::$f->is_valid->eq(True))
            ->sort(BankAccount::$f->created_at->desc())
            ->first()
        );
        return $bank_account;
    }

    /**
     * Transfer money from this Customer to your Marketplace's escrow account.
     *
     * @param int amount Amount to debit in cents, must be >= 50.
     * @param appears_on_statement_as Description of the payment as it needs
     *                                to appear on this customer's statement.
     * @param array[string]string Key/value collection.
     * @param string description Human readable description.
     * @param mixed source A specific funding source, such as a `Card`,
     *                      associated with this customer. If not specified
     *                      the `Card` most recently added to this
     *                      \Balanced\Customer is used.
     * @param mixed on_behalf_of The \Balanced\Customer providing the service
     *                           or delivering the
     *
     * @return \Balanced\Debit
     */
    public function debit(
            $amount = null,
            $appears_on_statement_as = null,
            $meta = null,
            $description = null,
            $source = null,
            $on_behalf_of = null)
    {
        if ($on_behalf_of == null) {
            $on_behalf_of_uri = null;
        } else if (is_string($on_behalf_of)) {
            $on_behalf_of_uri = $on_behalf_of;
        } else {
            $on_behalf_of_uri = $on_behalf_of->uri;
        }

        if ($source == null) {
            $source_uri = null;
        } else if (is_string($source)) {
            $source_uri = $source;
        } else {
            $source_uri = $source->uri;
        }

        if (isset($this->uri) && $on_behalf_of_uri == $this->uri)
            throw new \InvalidArgumentException(
                'The on_behalf_of parameter MAY NOT be the same account as the account you are debiting!'
            );

        return $this->debits->create(array(
            'amount' => $amount,
            'description' => $description,
            'meta' => $meta,
            'source_uri' => $source_uri,
            'on_behalf_of_uri' => $on_behalf_of_uri,
            'appears_on_statement_as' => $appears_on_statement_as
            ));
    }

    /**
     * Transfer money from your Marketplace's escrow account to this Customer.
     *
     * @param int amount Amount to credit in cents.
     * @param string description Human readable description.
     * @param array[string]string meta Key/value collection.
     * @param string destination A specific funding destination, such as a
     *                           \Balanced\BankAccount, associated with this
     *                           customer.
     * @param string appears_on_statement_as Description of the payment as it
     *                                       needs.
     * @param mixed debit The \Balanced\Debit corresponding to this particular
     *                    credit.
     *
     * @return \Balanced\Credit
     */
    public function credit(
            $amount = null,
            $description = null,
            $meta = null,
            $destination = null,
            $appears_on_statement_as = null,
            $debit = null)
    {
        if ($destination == null) {
            $destination_uri = null;
        } else if (is_string($destination)) {
            $destination_uri = $destination;
        } else {
            $destination_uri = $destination->uri;
        }

        if ($debit == null) {
            $debit_uri = null;
        } else if (is_string($debit)) {
            $debit_uri = $debit;
        } else {
            $debit_uri = $debit->uri;
        }

        return $this->credits->create(array(
                'amount' => $amount,
                'description' => $description,
                'meta' => $meta,
                'destination_uri' => $destination_uri,
                'appears_on_statement_as' => $appears_on_statement_as,
                'debit_uri' => $debit_uri
        ));
    }
    
    
    public function unstore()
    {
        return $this->delete();
    }
}
