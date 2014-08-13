<?php
$callback = new Balanced\Callback(array(
  "url" => "http://www.example.com/callback",
  "method" => "post"
));
$callback->save();
?>