<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
    Balanced\Event::get
% else:
    ${main.php_boilerplate()}
    $event = Balanced\Event::get("${request['uri']}");
% endif
