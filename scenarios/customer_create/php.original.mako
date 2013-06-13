<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Customer->createCustomer();

% else:
${main.php_boilerplate()}
$customer = Balanced\Customer::mine()->createCustomer();

% endif

