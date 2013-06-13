<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\BankAccount->credits()

% else:
${main.php_boilerplate()}
$bank_account = Balanced\BankAccount::get("${request['uri']}");
$credits = $bank_account->credits->query()->all();

% endif
