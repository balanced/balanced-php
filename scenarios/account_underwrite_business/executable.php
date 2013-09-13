<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$marketplace = Balanced\Marketplace::mine();

$merchant_data = array(
        "name" => "Skripts4Kids",
                "phone_number" => "+140899188155",
            "postal_code" => "91111",
            "street_address" => "555 VoidMain Road",
            "tax_id" => "211111111",
            "type" => "business",
        "person" => array(
            "dob" => "1989-12",
            "name" => "Timmy Q. CopyPasta",
            "phone_number" => "+14089999999",
            "postal_code" => "94110",
            "street_address" => "121 Skriptkid Row",
        ),
);

$account = $marketplace->createAccount();

try {
    $account->promoteToMerchant($merchant_data);
} catch (Balanced\Errors\IdentityVerificationFailed $error) {
    /* could not identify this account. */
    print "redirect merchant to:" . $error->redirect_uri . "\n";
} catch (Balanced\Errors\HTTPError $error) {
    /* TODO: handle 400 and 409 exceptions as required */
    throw $error;
}

?>