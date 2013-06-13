<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Marketplace::mine()->debits

% else:
${main.php_boilerplate()}
$marketplace = Balanced\Marketplace::mine();
$debits = $marketplace->debits->query()->all();

% endif
