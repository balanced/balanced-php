<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Account::credit()

% else:
${main.php_boilerplate()}
$merchant = Balanced\Account::get("${request['account_uri']}");
$merchant->credit(${payload['amount']});

% endif
