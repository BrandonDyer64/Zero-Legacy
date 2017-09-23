<?php

if ($page == 'payroll') {
	if (isset($_POST['start']) && isset($_POST['end'])) {
		$first_day = date('Y-m-d H:i:s', strtotime($_POST['start']));
		$last_day = date('Y-m-d H:i:s', strtotime($_POST['end']));
		$today = date('Y-m-d');

		if (check_user_permission(['admin'])){

            $stmt = db_select('time_punch_entry',['*'],[
                'time_start'=>['>=',$first_day],
                'time_end'=>['<=',$last_day]
            ]);

        } else {

            $stmt = db_select('time_punch_entry',['*'],[
                'time_start'=>['>=',$first_day],
                'user'=> $user['id'],
                'time_end'=>['<=',$last_day]
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
					<td><a id="paid${value['id']}" onclick="$('#paid${value['id']}').css('color','green');$('#paid${value['id']}').html('Paid <span class=\'glyphicon glyphicon-ok\'></span>');" href='?p=add&t=employee_payment&d={"employee":"${value["id"]}","hours":"$hours","amount":"$pay","wage":"$wage","date_paid":"$today"}' target="_blank">Paid <span class="glyphicon glyphicon-remove"></span></a></td>			
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
	} else {
		$first_day = date('Y-m-d H:i:s', strtotime('7 days ago'));
		$last_day = date('Y-m-d H:i:s', strtotime('now'));
		$content .= <<<HTML
		<form method="post">
			<div class="form-group">
				<label for="field_start">Start Date:</label>
				<input type="datetime" name="start" id="field_start" class="form-control" placeholder="1970-08-21" value="$first_day">
			</div>
			<div class="form-group">
				<label for="field_end">End Date:</label>
				<input type="datetime" name="end" id="field_end" class="form-control" placeholder="1970-08-27" value="$last_day">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
HTML;
	}
}