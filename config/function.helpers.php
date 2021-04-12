<?php

use App\Core\App;

function getUserName($user_id)
{
    $data = App::get('database')->select('fullname', 'users', "id = '$user_id'");
    return $data['fullname'];
}
