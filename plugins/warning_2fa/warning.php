<?php

if (!$user['use_2fa']) {
    $content .= <<<HTML
    <h3>Enable 2FA</h3>
    <p>To stay secure, we recommend enabling 2 Factor Authentication.</p>
    <a href="?p=account" class="btn btn-primary">Enable</a>
HTML;
}
