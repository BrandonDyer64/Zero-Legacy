<?php

$stmt = db_select('slave_table',['*'],['master'=>$table]);
while ($row = $stmt->fetch()) {
	$t = $row['slave'];
	$slave_field = $row['field'];
	$t_header = "<th></th>";
    $t_list_html = "";
    $list_list_html = '';
    $t_footer = "";

    $where = [$slave_field=>$id];

    if (isset($_GET['cols'])) {
        $cols = json_decode($_GET['cols'], true);
    } else {
        $cols = ['*'];
    }

    $schema = db_schema($t);
    $stmt = db_select($t, $cols, $where, 'ORDER BY id DESC');
    $i = 0;
    $first = true;
    $is_warn_for_id = false;
    $list_html = '';
    while ($row = $stmt->fetch()) {
        $i++;
        $t_row = "";
        foreach ($row as $key => $value) {
            $fn = get_type_function('decode_list', $schema[$key]['type']);
            $value = $fn($schema[$key], $value, '', $row);
            $t_row .= "<td>$value</td>";
        }
        if (!isset($row['id'])) {
            $row['id'] = 0;
            // Show a warning about not having an id
            $is_warn_for_id = true;
        }
        $t_list_html .= <<<HTML

        <tr class='list_table_data_row'>
            <td align="left" valign="center">
                <a href="?p=display&t=$t&id={$row['id']}" title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
                &nbsp;
                <a href="?p=edit&t=$t&id={$row['id']}" title="Edit"><span class="glyphicon glyphicon-edit"></a>
                &nbsp;
                <a href="?p=delete&t=$t&id={$row['id']}" title="Delete"><span class="glyphicon glyphicon-remove"></a>
            </td>
            $t_row
        </tr>

HTML;

        if ($first) {
            foreach ($row as $key => $value) {
                $key = column_pretty_print($key);
                $t_header .= "<th>$key</th>";
            }
            $first = false;
        }
        if ($i % 20 == 0) {
            $list_list_html .= <<<HTML
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr class="list_table_header_row">
                            $t_header
                        </tr>
                        $t_list_html
                        <tr class="list_table_totals_row">
                            $t_footer
                        </tr>
                    </tbody>
                </table>
            </div>
HTML;
        $t_list_html = '';
        }
    }

    $list_list_html .= <<<HTML
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr class="list_table_header_row">
                    $t_header
                </tr>
                $t_list_html
                <tr class="list_table_totals_row">
                    $t_footer
                </tr>
            </tbody>
        </table>
    </div>
HTML;

    if ($is_warn_for_id) {
        debug_warn('This table does not have an ID field');
    }

    if (!$first) {
        $list_html .= <<<HTML

        <p><a href="?p=add&t=$t"><span class="glyphicon glyphicon-plus"></span></a> &nbsp; <a href="?p=list&t=$t"><span class="glyphicon glyphicon-th-list"></span></a></p>

        $list_list_html

HTML;
    } else {
        $list_html .= <<<HTML
        <h1><strong>: (</strong> &nbsp; Empty Set</h1>
        <p><a href="?p=add&t=$t">Create the First One</a></p>
HTML;
    }
	$tabs[] = [
		'name' => table_pretty_print($t),
		'html' => $list_html
	];
}