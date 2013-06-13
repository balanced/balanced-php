<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\BankAccount->credit()

% else:
${main.php_boilerplate()}
$bank_account = Balanced\BankAccount::get("${request['uri']}");
$credit = $bank_account->credit(${payload['amount']});

% endif
