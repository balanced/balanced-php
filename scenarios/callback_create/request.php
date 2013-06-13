$callback = new \Balanced\Callback(array(
   {% for k, v in request.payload %}
        "{{ k }}" => "{{ v }}",
    {% endfor %}
    ));

    $callback->save();