<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
\Balanced\Customer->debit();

% else:
${main.php_boilerplate()}
$customer = \Balanced\Customer::get("${request['customer_uri']}");
$customer->hold('${payload['amount']}');

% endif