<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Marketplace::mine()->cards

% else:
${main.php_boilerplate()}
$marketplace = Balanced\Marketplace::mine();
$cards = $marketplace->cards->query()->all();

% endif