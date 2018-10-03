<?php

if (!table_exists('slave_table')) {
	run_remote_sql('slave_table');
}