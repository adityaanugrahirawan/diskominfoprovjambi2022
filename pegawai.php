<?php
require_once "method.php";
$pgw = new Pegawai();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
	case 'GET':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$pgw->get_pgw($id);
			}
			else
			{
				$pgw->get_pgw();
			}
			break;
	case 'POST':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$pgw->update_pgw($id);
			}
			else
			{
				$pgw->insert_pgw();
			}		
			break; 
	case 'DELETE':
		    $id=intval($_GET["id"]);
            $pgw->delete_pgw($id);
            break;
	default:
		// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
		break;
}




?>