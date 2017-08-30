<?php

if ($page == 'qr_print' || $page == 'qr') {
   if (isset($_POST['submit'])) {
      $table = $_POST['table'];
      $table_pretty = table_pretty_print($table);
      $start = $_POST['id_start'];
      $end = $_POST['id_end'];
      $schema = db_schema($table);
      $field = 'qr';
      foreach ($schema as $column) {
         if ($column['type'] == 'qr') {
            $field = $column['name'];
         }
      }
      $stmt = db_select_ids($table,['id',$field],$start,$end);
      $content = '';
      while ($row = $stmt->fetch()) {
         $value = $row[$field];
         $value = htmlspecialchars($value);
         $id = $row['id'];
         $content .= <<<HTML
         <div style="display: inline-block; border: 1px solid black; margin: 0; padding: 10px;">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=$value"><br>
            <span style="font-size:10px;">$value</span><br>
            <span><b>$table_pretty: $id</b><span>
         </div>
HTML;
      }
      echo $content;
      exit;
   }
   $select_table = select_table('table');
   $content .= <<<HTML
   <h3>Print QR Codes</h3>
   <form method="post">
      <table>
         <tbody>
            <tr>
               <td>Table</td>
               <td>
                  $select_table
               </td>
            </tr>
            <tr>
               <td>First ID</td>
               <td>
                  <input type="number" name="id_start" value="1">
               </td>
            </tr>
            <tr>
               <td>Last ID</td>
               <td>
                  <input type="number" name="id_end" value="10">
               </td>
            </tr>
            <tr>
               <td>
                  <input type="submit" name="submit" value="Submit">
               </td>
            </tr>
         </tbody>
      </table>
   </form>
HTML;
}