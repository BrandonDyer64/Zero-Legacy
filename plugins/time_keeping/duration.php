<?php

$field_type = "duration";

$field_types[$field_type]['edit'] = function($name, $schema, $value = null, $focus = false) {
   $value = htmlspecialchars($value);
   return $value;
};

$field_types[$field_type]['encode'] = function($schema, $value, $values) {
   return 0;
};

$field_types[$field_type]['decode'] = function($schema, $value, $focus_link = '', $values=[]) {
   if ($values[$schema['data']['end']] == '') {
      return 0;
   }
   $start = strtotime($values[$schema['data']['start']]);
   $end = strtotime($values[$schema['data']['end']]);
   return date('H:i:s', $end - $start);
};

/*$field_types[$field_type]['decode_list'] = function($schema, $value, $focus_link='', $values=[]) {
   return htmlspecialchars($value);
};*/

$field_types[$field_type]['decode_raw'] = function($schema, $value, $focus_link = '') {
   return $value;
};