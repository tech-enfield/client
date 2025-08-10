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

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
