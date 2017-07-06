
<?php

include 'DB.php';

$db = new DB();

$id = $_GET['id'];
$tblName = $_GET['table'];

if(!empty($id)){
    $condition = array('id' => $id);
    $delete = $db->delete($tblName,$condition);
    if($delete){
        $data['status'] = 'OK';
        $data['msg'] = 'User data has been deleted successfully.';
    }else{
        $data['status'] = 'ERR';
        $data['msg'] = 'Some problem occurred, please try again.';
    }
}else{
    $data['status'] = 'ERR';
    $data['msg'] = 'Some problem occurred, please try again.';
}
echo json_encode($data);
?>