<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Card->save()

% else:
${main.php_boilerplate()}
$card = Balanced\Card::get("${request['uri']}");
$card->meta = array(
% for k, v in payload['meta'].iteritems():
    "${k}" => "${v}",
% endfor
);
$card->save();

% endif
