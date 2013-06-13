<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
\Balanced\Account->debit();

% else:
${main.php_boilerplate()}
$account = \Balanced\Account::get("${request['account_uri']}");
$account->debits->create(array(
    "hold_uri" => "${payload['hold_uri']}",
    "amount" => "${payload['amount']}",
));

% endif
