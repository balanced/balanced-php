<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Hold->capture()

% else:
${main.php_boilerplate()}
$hold = Balanced\Hold::get("${request['hold_uri']}");
$debit = $hold->capture();

% endif
