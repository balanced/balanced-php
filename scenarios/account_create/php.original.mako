<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Marketplace->createAccount();

% else:
${main.php_boilerplate()}
$account = Balanced\Marketplace::mine()->createAccount();

% endif
