<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Balanced->refunds()

% else:
${main.php_boilerplate()}
$customer = Balanced\Customer::get("${request['customer_uri']}");
$refunds = $customer->refunds->query()->all();

% endif