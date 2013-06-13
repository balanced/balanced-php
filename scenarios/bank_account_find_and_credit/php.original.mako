<%namespace file='/_main.mako' name='main'/>

% if request is not UNDEFINED:
${main.php_boilerplate()}
$bank_account = Balanced\BankAccount::get("${request['uri']}");
$bank_account->credit(${request['amount']});

% endif
