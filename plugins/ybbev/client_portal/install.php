<?php

if (!table_exists('client_portal')) {
	run_remote_sql('client_portal');
}