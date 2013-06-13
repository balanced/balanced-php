<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
\Balanced\Account->debit();
% else:
${main.php_boilerplate()}
$account = \Balanced\Account::get("${request['account_uri']}");
$account->debit('${payload['amount']}');
% endif