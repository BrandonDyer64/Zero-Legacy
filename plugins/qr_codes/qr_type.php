<?php

$field_type = "qr";

$field_types[$field_type]['edit'] = function($name, $schema, $value = null) {
   $value = htmlspecialchars($value);
   $content = <<<HTML
   <input type="text" name="$name" value="$value" placeholder="$name">
HTML;
   return $content;
};

$field_types[$field_type]['encode'] = function($schema, $value, $values, $i) {
   if ($value == '') {
      return md5(uniqid()."-$i-${schema['name']}");
   } else {
      return $value;
   }
};

$field_types[$field_type]['decode'] = function($schema, $value) {
   $value = urlencode($value);
   return <<<HTML
   <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$value">
HTML;
};

$field_types[$field_type]['decode_list'] = function($schema, $value) {
   $value = urlencode($value);
   $sample = md5('sample');
   return <<<HTML
   <img width="27" height="27" src="https://api.qrserver.com/v1/create-qr-code/?size=27x27&data=$sample">
HTML;
};