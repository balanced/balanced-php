<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Customer->credits()

% else:
${main.php_boilerplate()}
$customer = Balanced\Customer::get("${request['customer_uri']}");
$credits = $customer->credits->query()->all();

% endif