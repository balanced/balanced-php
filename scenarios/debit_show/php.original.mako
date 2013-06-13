<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Debit::get

% else:
${main.php_boilerplate()}
$debit = Balanced\Debit::get("${request['uri']}");

% endif
