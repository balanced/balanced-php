<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Errors\InvalidRoutingNumber

% else:
${main.php_boilerplate()}
$bank_account = new Balanced\BankAccount(array(
% for k, v in payload.iteritems():
    "${k}" => "${v}",
% endfor
));
try {
    $bank_account->save();
}
catch(Balanced\Errors\InvalidRoutingNumber $e) {
  // handle error here
}

% endif
