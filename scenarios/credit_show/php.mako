<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Credit::get()

% else:
${main.php_boilerplate()}
$credit = Balanced\Credit::get("${request['uri']}");

% endif
