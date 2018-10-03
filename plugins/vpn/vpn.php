<?php


if ($page == 'vpn' && check_user_permission(['admin'])) {

    $content .= <<<HTML
<!--
<h1 style="font-size: 3em;">
    VPN Administrator Controls
</h1>

<a href="?p=vpn&control=true" id="button" style="font-size: 3em;" class="text-center btn btn-success">
    Turn On
</a>
<a href="?p=vpn&control=false" id="button" style="font-size: 3em; " class="text-center btn btn-danger">
    Turn Off
</a>
<hr />
-->
HTML;

}

if ($page == 'vpn') {
    $content .=<<<HTML
    <h1 style="font-size: 3em;">
        VPN
    </h1>
    <a href="plugins/vpn/client.ovpn" download id="button" style="font-size: 2em; " class="text-center btn btn-primary">
        Download OpenVPN Profile
    </a>


HTML;
}
$control = '';
$controlStatus = '';

if (isset($_GET['control'])) {
    $controlStatus = $_GET['control']; }


if ($page == 'vpn' && $controlStatus == "false" && check_user_permission(['admin'])) {
    exec('sudo -u zero-vpn -S {{sudo systemctl stop openvpn@server.service}} < /opt/zero/pass');
    $content .=<<<HTML
<!--
<br />
<div class="alert alert-success">
    <strong>
        Success!
    </strong>
    VPN has been stopped.

</div>
-->

HTML;

} elseif($page == 'vpn' && $controlStatus == "true" && check_user_permission(['admin'])){
    exec('sudo -u zero-vpn -S {{sudo systemctl start openvpn@server.service}} < /opt/zero/pass');
    $content .=<<<HTML
<!--
<br />
<div class="alert alert-success">
    <strong>
        Success!
    </strong>
    VPN has been started.

</div>
-->

HTML;
}elseif($page == 'vpn' && check_user_permission(['admin']) == false) {
    $content .=<<<HTML
<div class="alert alert-danger">
  You do not have permission to do this!
</div>


HTML;
}










