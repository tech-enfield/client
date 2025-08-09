<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'social_accounts' => 'array',
        'website_issues' => 'array',
        'social_account_issues' => 'array',
    ];
}
