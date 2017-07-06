
<?php

include 'DB.php';

$db = new DB();
// Table
$tblName = $_GET['table'];
$key = $_GET['key'];


// Conditions
if (isset($_GET['id'] )) {
	$value = $_GET['id'];
	$condition = array('where' => array('id' => $value));
} else {
	$condition = array();
}
// Get data
if ($key == 'Add') {
	$sql = "SELECT U.id, username, password, avatars, fullname, role, group_id, team_id, U.created, G.name AS GName, T.name as TName
	FROM users as U
	LEFT JOIN groups as G on G.id = U.group_id
	LEFT JOIN teams as T on T.id = U.team_id";
	$records = $db->getRowsJoin($sql);
	//Groups
	$sql1 = "SELECT G.id, G.name FROM groups as G";
	$list_group = $db->getRowsJoin($sql1);
	// Teams
	$sql2 = "SELECT T.id, T.name FROM teams as T";
	$list_team = $db->getRowsJoin($sql2);
	// Push data to array
	$info = array( "records" => $records, "groups" => $list_group, "teams" => $list_team);
	echo json_encode($info);
} elseif( $key == 'Edit') {
	$records = $db->getRows($tblName, $condition);
	//Groups
	$sql1 = "SELECT G.id, G.name FROM groups as G";
	$list_group = $db->getRowsJoin($sql1);
	// Teams
	$sql2 = "SELECT T.id, T.name FROM teams as T";
	$list_team = $db->getRowsJoin($sql2);
	// Push data to array
	$info = array( "records" => $records, "groups" => $list_group, "teams" => $list_team);
	echo json_encode($info);
} else if ($key == 'View') {
	$records = $db->getRows($tblName, $condition);
	echo json_encode($records);
}

?>
