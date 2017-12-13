<?php

if ($page == 'invoice') {
  if (isset($_GET['invoice'])) {
		check_user_permission_force(['admin']);
		db_insert('labor_invoice', [
      'client'=>$_GET['client'],
      'amount'=>$_GET['total'],
      'mark_up'=>$_GET['markup']
    ]);
		$invoice_id = db_get_last_insert_id();
		db_update('time_punch_entry',['invoiced'=>'1'],['client'=>"${_GET['client']}"]);
		header("Location: ?p=display&t=labor_invoice&id=$invoice_id");
		exit;
	}
	$today = date('Y-m-d');
	check_user_permission_force(['admin']);
  if (isset($_REQUEST['mark_up'])) {
    $client_id = $_REQUEST['client'];
    $mark_up = $_REQUEST['mark_up'];
    $stmt = db_select('time_punch_entry',['*'],[
        'invoiced'=>'0',
        'client'=>$client_id
    ]);


  	$users = [];
  	while ($row = $stmt->fetch()) {
  		if (!isset($users[$row['user']]['hours']))
  			$users[$row['user']]['hours'] = 0;
  		$users[$row['user']]['hours'] += (strtotime($row['time_end']) - strtotime($row['time_start'])) / 3600;
  		$users[$row['user']]['id'] = $row['user'];
  	}
  	$table_html = '';
    $total_invoice = 0;
  	foreach ($users as $key => $value) {
  		$hours = round((float)$value['hours'],2);
  		$stmt = db_select('user',['username'],['id'=>$value['id']]);
  		$row = $stmt->fetch();
  		$username = $row['username'];
  		$stmt = db_select('user_payroll_info',['*'],['user'=>$value['id']]);
  		if ($row = $stmt->fetch()) {
  			$wage = (float)$row['wage'];
  			$pay = $wage * $hours;
        $invoice = $pay * $mark_up;
        $total_invoice += $invoice;
  			$pay = round($pay, 2);
        $invoice = round($invoice, 2);
  			$table_html .= <<<HTML
  			<tr>
  				<td>$username</td>
          <td>$hours</td>
          <td>\$$wage/hr <a href="?p=edit&t=user_payroll_info&id=${row['id']}">edit</a></td>
  				<td>\$$pay</td>
          <td>\$$invoice</td>
  			</tr>
HTML;
  		} else {
  			$content .= "$username does not have payroll info. Click <a href='?p=add&t=user_payroll_info'>here</a> to add it.<br>";
  		}
  	}
  	$content .= <<<HTML

  	<h2>Payroll</h2>
  	<table class="table">
  		<tr>
  			<th>User</th><th>Hours</th><th>Wage</th><th>Pay</th><th>Invoice</th>
  		</tr>
  		$table_html
  	</table>
    <p>Total: \$$total_invoice</p>
    <p><a href="?p=invoice&total=$total_invoice&markup=$mark_up&client=$client_id&invoice=true">Submit Invoice</a></p>
HTML;
  } else {
    $content .= <<<HTML
    <form method="post">
      Mark up:
      <input name="mark_up" type="text" placeholder="1.2">
      <input type="submit" value="Submit">
    </form>
HTML;
  }

}
