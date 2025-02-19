<?php

declare(strict_types=1);

namespace App\Domain\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'city',
        'email',
        'name',
        'phone',
        'state',
        'street',
        'street_number',
        'zip_code',
    ];
}
