<?php

require('Aglobal_file.php');

$post_id = $_POST['post_id'];
$user_id = $_SESSION['user']['account_id'];

$type;

$check_like = $database->get('select * from like_react where post_id = ? && user_id = ?', [$post_id, $user_id], 'fetch');

if(empty($check_like))
{
    $database->insert('insert into like_react(post_id, user_id) values(?, ?)', [$post_id, $user_id]);
    $type = 'like';

}
else
{
    $database->delete('delete from like_react where like_id = ?', [$check_like['like_id']]);
    $type = 'unlike';
}


$like_count = count($database->get('select * from like_react where post_id = ?', [$post_id], 'fetchAll'));

echo json_encode(['type' => $type, 'like_count' => $like_count]);

?>  