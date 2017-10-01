<?php

$field_type = "date";

$field_types[$field_type]['edit'] = function($name, $schema, $value = null, $focus = false) {
   $focus = $focus ? 'autofocus' : '';
   $value = htmlspecialchars($value);
   $content = <<<HTML
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.6/jstz.min.js"></script>
   <input id="field_$name" type="text" name="$name" value="$value" placeholder="$name" class="form-control" $focus>
   <script>
      var date;
      if ('$value' != '') {
         date = moment('$value').format('MM/DD/YY')
      } else {
         date = moment().format('MM/DD/YY')
      }
      $('#field_$name').val(date)
   </script>
HTML;
   return $content;
};

$field_types[$field_type]['encode'] = function($schema, $value, $values) {
   if ($value == '')
      return null;
   $value = date('Y-m-d', strtotime($value));
   return $value;
};

$time_keeping_config = json_decode(file_get_contents("config/plugins/time_keeping.json"), true);
$date_format = $time_keeping_config['date_format'];

$field_types[$field_type]['decode'] = function($schema, $value, $focus_link = '') {
   $name = uniqid();
   $content = <<<HTML
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <span id="field_$name"></span>
   <script>
      if ('$value' != '') {
         var date = moment('$value').format('MM/DD/YY')
         $('#field_$name').text(date)
      }
   </script>
HTML;
   return $content;
};

/*$field_types[$field_type]['decode_raw'] = function($schema, $value, $focus_link = '') {
   return $value;
};*/