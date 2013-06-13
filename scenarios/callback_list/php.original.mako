<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
    \Balanced\Callback->all()

% else:
    ${main.php_boilerplate()}
    \Balanced\Callback->all()

% endif
