<%namespace file='/_main.mako' name='main'/>
% if mode == 'definition':
Balanced\Debit->refund()

% else:
${main.php_boilerplate()}
$debit = Balanced\Debit::get("${request['debit_uri']}");
$debit->refund(
    null,
    "${payload['description']}",
    array(
    % for k, v in payload['meta'].iteritems():
        "${k}" => "${v}",
    % endfor
    )
);

% endif
