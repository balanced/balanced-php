<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
\Balanced\Customer->debit();
% else:
${main.php_boilerplate()}
$customer = \Balanced\Customer::get("${request['customer_uri']}");
$customer->debit('${payload['amount']}');
% endif