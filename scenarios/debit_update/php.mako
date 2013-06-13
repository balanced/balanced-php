<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Debit->save()

% else:
${main.php_boilerplate()}
$debit = Balanced\Debit::get("${request['uri']}");
$debit->description = "${payload['description']}";
$debit->meta = array(
% for k, v in payload['meta'].iteritems():
    "${k}" => "${v}",
% endfor
);
$debit->save();

% endif

