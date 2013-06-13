<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Marketplace::mine()->holds

% else:
${main.php_boilerplate()}
$marketplace = Balanced\Marketplace::mine();
$holds = $marketplace->holds->query()->all();

% endif
