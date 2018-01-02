<?php
ob_implicit_flush();
//set_time_limit(0);
ini_set('max_execution_time','0');

include("core/config.php");
include("core/server.class.php");
include("core/client.class.php");
include("core/input.class.php");
include("core/response.class.php");
include("core/log.class.php");
include("core/db.class.php");
include("core/nv.class.php");
$database = new db($dsn);
$pdo = $database->getPDO();
if(!$database)
	$server["running"] = false;
$nv = new nv($pdo);
$nv->SetTrackerPath("localhost");
$server = new SocketServer($config_server["ip"],$config_server["port"]);
//$server->max_clients = $config_server["max_clients"];
$server->infinite_loop();
?>