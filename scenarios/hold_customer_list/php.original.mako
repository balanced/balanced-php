<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Customer->holds()

% else:
${main.php_boilerplate()}
$customer = Balanced\Customer::get("${request['customer_uri']}");
$holds = $customer->holds->query()->all();

% endif