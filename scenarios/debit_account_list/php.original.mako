<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Account->debits()

% else:
${main.php_boilerplate()}
$account = Balanced\Account::get("${request['uri']}");
$debits = $account->debits->query()->all();

% endif
