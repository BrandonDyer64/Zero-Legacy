<?php

if ($page == "plugin_catalog") {

    check_user_permission_force(['admin','plugin_manager']);

    if (isset($_GET['plugin_install'])) {
    	zero_plugin_add($_GET['plugin_install']);
    	zero_plugin_update($_GET['plugin_install']);
    	header("Location: ?p=plugin_catalog");
    }

    $table_header = "<th>Install</th><th>Details</th><th>Version</th><th>Icon</th><th>Title</th><th>Description</th><th>Type</th><th>Name</th><th>Price</th>";
    $table_content = "";

    $master_plugins_list = json_decode(file_get_contents($update_host."/plugins/plugins.json"), true);

    foreach ($master_plugins_list as $row) {
    	$info = json_decode(file_get_contents($update_host."/plugins/$row/plugin.json"), true);
    	if (in_array($row, $plugins_list))
    		continue;
        $table_row = "<td>$row</td>";
        $table_content .= <<<HTML

        <tr class='list_table_data_row'>
            <td align="center"><a href="?p=plugin_catalog&plugin_install=$row" title="Install">&#x25BC;</a></td>
            <td align="center"><a href="?p=plugin_display&plugin=$row" title="Details">&#x25C6;</a></td>
            <td>${info['version']}</td>
            <td align="center"><img src="$update_host/plugins/$row/icon.jpg" width="32" height="32"></td>
            <td>${info['name']}</td>
            <td style="max-width: inherit; overflow: none;">${info['description_short']}<br><br>${info['description']}</td>
            <td>${info['type']}</td>
            <td>$row</td>
            <td>\$${info['cost']}/mo</td>
        </tr>

HTML;
    }

    $content .= <<<HTML

    <h2>Plugin Catalog</h2>

    <p><a href="?p=plugins">Manage</a></p>

    <table class="table">
        <tbody>
            <tr class="list_table_header_row">
                $table_header
            </tr>
            $table_content
        </tbody>
    </table>

HTML;
}