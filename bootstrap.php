<?php 

$config = require_once "config.php";

require_once "classes/Connection.php";

$db = Connection::connect( $config['database']);

require_once "classes/Query Builder.php";
require_once "classes/Customer.php";
require_once "classes/ContactCustomer.php";

 
$query = new QueryBuilder($db);
$customer = new Customer($db);
$contact = new Contact($db);


//.. mesto kade ke bidat povikuvani drugite klasi