<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
// SQL server connection information
$sql_details = array(
	'user' => 'root',
	'pass' => 'dbasterisk',
	'db'   => 'ipbx',
	'host' => 'localhost'
);
// DB table to use
$table = 'house';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'house_name', 'dt' => 0 ),
	array( 'db' => 'caller_group',  'dt' => 1 ),
	array( 'db' => 'from_time',  'dt' => 2 ),
	array( 'db' => 'to_time',  'dt' => 3 ),
	array( 'db' => 'status',  'dt' => 4 ),
	array( 'db' => 'extensions',  'dt' => 5 ),
	array(
		'db'        => 'date_created',
		'dt'        => 6,
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
	array( 'db' => 'status',     'dt' => 7)
);/*
$columns = array(
	array( 'db' => 'first_name', 'dt' => 0 ),
	array( 'db' => 'last_name',  'dt' => 1 ),
	array( 'db' => 'position',   'dt' => 2 ),
	array( 'db' => 'office',     'dt' => 3 ),
	array(
		'db'        => 'created_on',
		'dt'        => 4,
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
	array(
		'db'        => 'salary',
		'dt'        => 5,
		'formatter' => function( $d, $row ) {
			return '$'.number_format($d);
		}
	)
);*/

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


?>
