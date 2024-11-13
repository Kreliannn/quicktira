<?php

require('Aglobal_file.php');

$post_id = $_POST['post_id'];
$user_id = $_SESSION['user']['account_id'];

$type;

$check_favorite = $database->get('select * from favorite where post_id = ? && user_id = ?', [$post_id, $user_id], 'fetch');

if(empty($check_favorite))
{
    $database->insert('insert into favorite(post_id, user_id) values(?, ?)', [$post_id, $user_id]);
    $type = 'addFavorite';
}
else
{
    $database->delete('delete from favorite where favorite_id = ?', [$check_favorite['favorite_id']]);
    $type = 'removeFavorite';
}

echo json_encode(['type' => $type]);

?>  