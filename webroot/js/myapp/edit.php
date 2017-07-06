<?php 

include 'DB.php';

$db = new DB();
$tblName = $_GET['table'];

$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
$id  = $data->id;
if ($data->password == 'test12345678') {
	$userData = array(
	    'username' 	=> $data->username,
	    'fullname' 	=> $data->fullname,
	    'role' 		=> $data->role,
	    'group_id' 	=> $data->group_id,
	    'team_id' 	=> $data->team_id
	);
} else {
	$userData = array(
	    'username' 	=> $data->username,
	    'password' 	=> password_hash($data->password, PASSWORD_DEFAULT),
	    'fullname' 	=> $data->fullname,
	    'role' 		=> $data->role,
	    'group_id' 	=> $data->group_id,
	    'team_id' 	=> $data->team_id
	);
}

$condition = array('id' => $data->id);
$update = $db->update($tblName,$userData,$condition);
if($update){
    $info['status'] = 'OK';
    $info['msg'] = 'User data has been updated successfully.';
}else{
    $info['status'] = 'ERR';
    $info['msg'] = 'Some problem occurred, please try again.';
}
echo json_encode($info);
?>