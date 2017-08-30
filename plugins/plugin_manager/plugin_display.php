<?php

if ($page == 'plugin_display') {

    $plugin_name = $_GET['plugin'];
    $info = json_decode(file_get_contents($update_host."/plugins/$plugin_name/plugin.json"), true);

    $promotion = "FREE!";
    if (isset($info['cost']) && $info['cost'] > 0) {
        $promotion = "First month FREE!";
    }
    $promotion = "<tr><td>Promotion:</td><td>$promotion</td></tr>";
    if (in_array($plugin_name, $plugins_list)) {
        $promotion = "<tr><td>Status:</td><td>Installed</td></tr>";
    }

    $content .= <<<HTML
        
        <h3>${info['name']}</h3>
        <table class="table">
            <tr><td>Icon:</td><td><img src="$update_host/plugins/$plugin_name/icon.jpg" width="32" height="32"></td></tr>
            <tr><td>Name:</td><td>${info['name']}</td></tr>
            <tr><td>Type:</td><td>${info['type']}</td></tr>
            <tr><td>Version:</td><td>${info['version']}</td></tr>
            <tr><td>Headline:</td><td>${info['description_short']}</td></tr>
            <tr><td>Description:</td><td>${info['description']}</td></tr>
            <tr><td>Price:</td><td>\$${info['cost']} per month</td></tr>
            $promotion
        </table>

HTML;
}