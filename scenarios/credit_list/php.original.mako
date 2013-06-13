<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Marketplace::mine()->credits

% else:
${main.php_boilerplate()}
$marketplace = Balanced\Marketplace::mine();
$credits = $marketplace->credits->query()->all();

% endif
