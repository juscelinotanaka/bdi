<?php
	
	define('PGHOST','localhost');
	define('PGPORT',5432);
	define('PGDATABASE','henriquecavalcante');
	define('PGUSER', 'henriquecavalcante');
	define('PGPASSWORD', '');
	define('PGCLIENTENCODING','UNICODE');
	define('ERROR_ON_CONNECT_FAILED','Sorry, can not connect the database server now!');
	
	pg_pconnect('host=' . PGHOST . ' port=' . PGPORT . ' dbname=' . PGDATABASE . ' user=' . PGUSER . ' password=' . PGPASSWORD);

	

?>