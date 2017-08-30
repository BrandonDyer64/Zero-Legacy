<?php

$field_type = "datetime";

$field_types[$field_type]['edit'] = function($name, $schema, $value = null, $focus = false) {
   $focus = $focus ? 'autofocus' : '';
   $value = htmlspecialchars($value);
   $content = <<<HTML
   <input type="text" name="$name" value="$value" placeholder="$name" $focus>
HTML;
   return $content;
};

$field_types[$field_type]['encode'] = function($schema, $value, $values) {
   if ($value == '')
      return null;
   return $value;
};

$time_keeping_config = json_decode(file_get_contents("config/plugins/time_keeping.json"), true);
$date_format = $time_keeping_config['date_format'];

$field_types[$field_type]['decode'] = function($schema, $value, $focus_link = '') {
   if (!$value)
      return '';
   global $date_format;
   return date($date_format, strtotime($value));
};

/*$field_types[$field_type]['decode_raw'] = function($schema, $value, $focus_link = '') {
   return $value;
};*/