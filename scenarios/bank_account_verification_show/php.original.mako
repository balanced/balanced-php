<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Verification::get
% else:
    ${main.php_boilerplate()}
$verification = Balanced\Verification::get("${request['uri']}");
% endif
