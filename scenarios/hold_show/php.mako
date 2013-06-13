<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Hold::get

% else:
${main.php_boilerplate()}
$hold = Balanced\Hold::get("${request['uri']}");

% endif
