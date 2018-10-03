<?php

$content .= <<<PHP

\$field_types = [];

PHP;

// Four fundamental types
load("types/varchar");
load("types/boolean");
load("types/int");
load("types/select");

// Important
load("types/id");
load("types/text");
load("types/password");
load("types/multi_select");
load("types/decimal");

// Others
load("types/link");
load("types/markdown");
