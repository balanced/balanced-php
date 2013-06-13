<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
\Balanced\Customer->addCard();

% else:
${main.php_boilerplate()}
$customer = \Balanced\Customer::get("${request['uri']}");
$customer->addCard("${payload['card_uri']}");

% endif
