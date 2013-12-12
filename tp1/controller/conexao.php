<?php
	/*
	define('PGHOST','localhost');
	define('PGPORT',5432);
	define('PGDATABASE','bdi_tp1');
	define('PGUSER', 'bdi');
	define('PGPASSWORD', '123');
	define('PGCLIENTENCODING','UNICODE');
	define('ERROR_ON_CONNECT_FAILED','Sorry, can not connect the database server now!');
	/* */
	
	/* */
	define('PGHOST','10.208.200.15');
	define('PGPORT',5432);
	define('PGDATABASE','tp01_2013_01');
	define('PGUSER', 'juscelino');
	define('PGPASSWORD', '123456');
	define('PGCLIENTENCODING','UNICODE');
	define('ERROR_ON_CONNECT_FAILED','Sorry, can not connect the database server now!');
	/* */
	
	
	$db = pg_pconnect('host=' . PGHOST . ' port=' . PGPORT . ' dbname=' . PGDATABASE . ' user=' . PGUSER . ' password=' . PGPASSWORD);

	pg_set_client_encoding($db, UTF-8);
		
	
?>