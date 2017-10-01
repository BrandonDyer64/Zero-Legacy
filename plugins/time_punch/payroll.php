<?php

if ($page == 'payroll') {
	$today = date('Y-m-d');
	$is_admin = check_user_permission(['admin']);

	if (isset($_GET['pay'])) {
		check_user_permission_force(['admin']);
		$info = json_decode($_GET['d'], true);
		db_insert('employee_payment', $info);
		$employee_payment_id = db_get_last_insert_id();
		db_update('time_punch_entry',['employee_payment'=>"$employee_payment_id"],['employee_payment'=>null,'user'=>"${info['employee']}"]);
		header("Location: ?p=display&t=employee_payment&id=$employee_payment_id");
		exit;
	}

	if ($is_admin){

        $stmt = db_select('time_punch_entry',['*'],[
            'employee_payment'=>null,
            'time_end'=>['>',0]
        ]);

    } else {

        $stmt = db_select('time_punch_entry',['*'],[
            'employee_payment'=>null,
            'time_end'=>['>',0],
            'user'=> $user['id']
        ]);

    }


	$users = [];
	while ($row = $stmt->fetch()) {
		if (!isset($users[$row['user']]['hours']))
			$users[$row['user']]['hours'] = 0;
		$users[$row['user']]['hours'] += (strtotime($row['time_end']) - strtotime($row['time_start'])) / 3600;
		$users[$row['user']]['id'] = $row['user'];
	}
	$table_html = '';
	foreach ($users as $key => $value) {
		$hours = round((float)$value['hours'],2);
		$stmt = db_select('user',['username'],['id'=>$value['id']]);
		$row = $stmt->fetch();
		$username = $row['username'];
		$stmt = db_select('user_payroll_info',['*'],['user'=>$value['id']]);
		if ($row = $stmt->fetch()) {
			$wage = (float)$row['wage'];
			$pay = $wage * $hours;
			$pay = round($pay, 2);
			$table_html .= <<<HTML
			<tr>
				<td>$username</td>
				<td>\$$pay</td>
				<td>$hours</td>
				<td>\$$wage/hr <a href="?p=edit&t=user_payroll_info&id=${row['id']}">edit</a></td>
				<td><a id="paid${value['id']}" onclick="$('#paid${value['id']}').css('color','green');$('#paid${value['id']}').html('Paid <span class=\'glyphicon glyphicon-ok\'></span>');" href='?p=payroll&pay&d={"employee":"${value["id"]}","hours":"$hours","amount":"$pay","wage":"$wage","date_paid":"$today"}'>Pay</a></td>			
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
			<th>User</th><th>Pay</th><th>Hours</th><th>Wage</th><th>Paid?</th>
		</tr>
		$table_html
	</table>

HTML;
}