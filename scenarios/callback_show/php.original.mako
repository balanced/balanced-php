<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
    Balanced\Callback::get
% else:
    ${main.php_boilerplate()}
    $bank_account = Balanced\Callback::get("${request['uri']}");
% endif
