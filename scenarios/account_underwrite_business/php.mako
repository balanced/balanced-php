<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Marketplace->createAccount();

% else:
${main.php_boilerplate()}
$marketplace = Balanced\Marketplace::mine();

$merchant_data = array(
% for k, v in payload['merchant'].iteritems():
    % if k != 'person':
    "${k}" => "${v}",
    % endif
% endfor
    "person" => array(
    % for k, v in payload['merchant']['person'].iteritems():
        "${k}" => "${v}",
    % endfor
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

% endif
