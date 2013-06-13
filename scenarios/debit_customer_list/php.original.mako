<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Customer->debits()

% else:
${main.php_boilerplate()}
$customer = Balanced\Customer::get("${request['uri']}");
$debits = $customer->debits->query()->all();

% endif