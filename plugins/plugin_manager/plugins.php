<?php

if ($page == "plugins") {

    check_user_permission_force(['admin','plugin_manager']);

    if (isset($_GET['plugin_update'])) {
    	zero_plugin_update($_GET['plugin_update']);
    	header("Location: ?p=plugins");
    }

    if (isset($_GET['plugin_remove'])) {
    	zero_plugin_remove($_GET['plugin_remove']);
    	header("Location: ?p=plugins");
    }

    $total_cost = 0;

    $table_header = "<th></th><th></th><th></th><th>Version</th><th>Title</th><th>Description</th><th>Name</th><th>Price</th>";
    $table_content = "";

    foreach ($plugins_list as $row) {
    	$info = json_decode(file_get_contents("plugins/$row/plugin.json"), true);
        if (isset($info['cost'])) {
            $total_cost += $info['cost'];
        }
        $table_content .= <<<HTML

        <tr class='list_table_data_row'>
            <td align="center"><a href="?p=plugins&plugin_update=$row" title="Update">&#x25BC;</a></td>
            <td align="center"><a href="?p=plugin_display&plugin=$row" title="View">&#x25C6;</a></td>
            <td align="center"><a href="?p=plugins&plugin_remove=$row" titlp="Remove"><b>&times;</b></a></td>
            <td>${info['version']}</td>
            <td>${info['name']}</td>
            <td>${info['description_short']}</td>
            <td>$row</td>
            <td>\$${info['cost']}</td>
        </tr>

HTML;
    }

    $content .= <<<HTML

    <h2>Plugins</h2>

    <p><a href="?p=plugin_catalog">Install</a></p>

    <table class="table">
        <tbody>
            <tr class="list_table_header_row">
                $table_header
            </tr>
            $table_content
            <tr class="list_table_totals_row">
                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>\$$total_cost</td>
            </tr>
        </tbody>
    </table>

HTML;
}