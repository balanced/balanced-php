<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Customer::credit()

% else:
${main.php_boilerplate()}
$customer = Balanced\Customer::get("${request['customer_uri']}");
$customer->credit(${payload['amount']});

% endif