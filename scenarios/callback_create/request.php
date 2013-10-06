$callback = new Balanced\Callback(array(
  "url" => "{{ request.payload.url }}"
));
$callback->save();