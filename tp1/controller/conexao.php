<?php
	define('PGHOST','192.168.1.102');
	define('PGPORT',5432);
	define('PGDATABASE','bdi_tp1');
	define('PGUSER', 'bdi');
	define('PGPASSWORD', '123');
	define('PGCLIENTENCODING','UNICODE');
	define('ERROR_ON_CONNECT_FAILED','Sorry, can not connect the database server now!');
	
	pg_pconnect('host=' . PGHOST . ' port=' . PGPORT . ' dbname=' . PGDATABASE . ' user=' . PGUSER . ' password=' . PGPASSWORD);
?>