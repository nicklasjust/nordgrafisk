<?php

require('database.php');

$db = Database::getInstance('mysql', 'localhost', 'nordgrafisk', 'root', '');

$customerInfo 	= $_POST['customerInfo'];