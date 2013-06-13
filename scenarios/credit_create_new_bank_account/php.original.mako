<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Credit::bankAccount()

% else:
${main.php_boilerplate()}
$bank_account_info = array(
% for k, v in request['bank_account'].iteritems():
    "${k}" => "${v}",
% endfor
);
$credit = Balanced\Credit::bankAccount(
    ${request['amount']},
    $bank_account_info
);

% endif
