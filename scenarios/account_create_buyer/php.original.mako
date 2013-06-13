<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Marketplace->createAccount();

% else:
${main.php_boilerplate()}
$buyer = Balanced\Marketplace::mine()->createBuyer(
    null,
    "${payload['card_uri']}"
);

% endif
