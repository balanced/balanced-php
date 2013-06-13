<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
\Balanced\Customer->addBankAccount();

% else:
${main.php_boilerplate()}
$customer = \Balanced\Customer::get("${request['uri']}");
$customer->addBankAccount("${payload['bank_account_uri']}");

% endif

