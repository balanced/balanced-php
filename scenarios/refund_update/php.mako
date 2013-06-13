<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Refund->save()

% else:
${main.php_boilerplate()}
$refund = Balanced\Refund::get("${request['uri']}");
$refund->description = "${payload['description']}";
$refund->meta = array(
% for k, v in payload['meta'].iteritems():
    "${k}" => "${v}",
% endfor
);
$refund->save();

% endif

