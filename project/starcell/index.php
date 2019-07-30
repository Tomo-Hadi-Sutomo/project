<?php
if (!session_id()) session_start();
require_once 'app/init.php';
DEFINE('ROOT',dirname(__FILE__));
$app = new App;
