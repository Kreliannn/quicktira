<?php

require('Aglobal_file.php');

$_SESSION['convo_id'] = $_POST['convo_id'];

header('location: ../frontend/user.messages.convo.php');