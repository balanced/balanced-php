<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
\Balanced\BankAccount->save()

% else:
${main.php_boilerplate()}
$bank_account = new \Balanced\BankAccount(array(
% for k, v in payload.iteritems():
    "${k}" => "${v}",
% endfor
));

$bank_account->save();

% endif
