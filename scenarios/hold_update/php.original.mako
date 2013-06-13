<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Hold->save()

% else:
${main.php_boilerplate()}
$hold = Balanced\Hold::get("${request['uri']}");
$hold->description = "${payload['description']}";
$hold->meta = array(
% for k, v in payload['meta'].iteritems():
    "${k}" => "${v}",
% endfor
);
$hold->save();

% endif

