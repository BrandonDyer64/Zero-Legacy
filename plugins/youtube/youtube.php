<?php

$field_type = "youtube";

$field_types[$field_type]['edit'] = function($name, $schema, $value = null) {
   global $pdo;
   $value = htmlspecialchars($value);
   $content = <<<HTML
   <span>https://www.youtube.com/watch?v=<input type="text" name="$name" value="$value" placeholder="YouTube Video ID"></span>
HTML;
   return $content;
};

$field_types[$field_type]['encode'] = function($schema, $value, $values) {
   return $value;
};

$field_types[$field_type]['decode'] = function($schema, $value) {
   $value = htmlspecialchars($value);
   return <<<HTML
   <iframe width="560" height="315" src="https://www.youtube.com/embed/$value" frameborder="0" allowfullscreen></iframe>
HTML;
};

$field_types[$field_type]['decode_list'] = function($schema, $value) {
   return $value;
};