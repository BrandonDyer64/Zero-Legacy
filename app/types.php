<?php

$content .= <<<PHP

\$field_types = [];

PHP;

// Four fundamental types
load("types/varchar");
load("types/boolean"); // TODO
load("types/int");
load("types/select");

// Important
load("types/id");
load("types/text");
load("types/password");
load("types/multi_select");

// Extra
load("types/image"); // TODO
load("types/youtube");
load("types/qr");