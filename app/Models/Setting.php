<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_email',
        'app_logo',
        'app_favicon',
        'app_phone',
        'email_from',
        'email_host',
        'email_port',
        'email_username',
        'email_password',
        'email_encryption',
        'facebook',
        'tiktok',
        'instagram',
        'twitter',
        'linkedin',
    ];
}
