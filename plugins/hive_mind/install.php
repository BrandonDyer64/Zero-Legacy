<?php

if (!table_exists('hive_mind_question')) {
	run_remote_sql('hive_mind');
}