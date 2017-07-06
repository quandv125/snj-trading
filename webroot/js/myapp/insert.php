
<?php
// include 'DB.php';

// $db = new DB();

// $tblName = $_GET['table'];

// $post_date = file_get_contents("php://input");
// $data = json_decode($post_date);
// date_default_timezone_set("Asia/Ho_Chi_Minh");
// $info = array(
//     "id" 		=> NULL,
//     "username" 	=> $data->username,
//     "password"  => password_hash($data->password, PASSWORD_DEFAULT),
//     "fullname" 	=> $data->fullname,
//     "role" 	    => $data->role,
//     "group_id"  => $data->group_id,
//     "team_id"   => $data->team_id,
//     "created"   => date("Y-m-d H:i:s")
// );

// $insert = $db->insert($tblName,$info);
// if($insert){
//     $info['data'] = $insert;
//     $info['status'] = 'OK';
//     $info['msg'] = 'User data has been added successfully.';
// }else{
//     $info['status'] = 'ERR';
//     $info['msg'] = 'Some problem occurred, please try again.';
// }
echo json_encode($_FILES);
?>