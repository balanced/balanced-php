<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Card::get

% else:
${main.php_boilerplate()}
$card = Balanced\Card::get("${request['uri']}");

% endif
