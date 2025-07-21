<?php

namespace App\Models;

use Support\Database\Model;

class User extends Model
{
    protected static string $table = 'users';

    public string $first_name;
    public string $last_name;
}