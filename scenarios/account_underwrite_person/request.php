$marketplace = Balanced\Marketplace::mine();

$merchant_data = array(
{% for k, v in request.payload.merchant %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
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