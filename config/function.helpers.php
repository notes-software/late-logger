<?php

use App\Core\App;

function getUserName($user_id)
{
    $data = DB()->select('fullname', 'users', "id = '$user_id'")->get();
    return $data['fullname'];
}
