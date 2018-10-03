<?php

if (!table_exists('bill_of_lading')) {
	run_remote_sql('bill_of_lading');
}