<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
    \Balanced\Event->all()

% else:
    ${main.php_boilerplate()}
    \Balanced\Event->all()

% endif
