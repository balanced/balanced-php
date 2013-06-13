<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Hold->void()

% else:
${main.php_boilerplate()}
$hold = Balanced\Hold::get("${request['uri']}");
$hold->void();

% endif

