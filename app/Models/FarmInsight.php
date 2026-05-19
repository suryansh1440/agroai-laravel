<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class FarmInsight extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'farm_insights';

    protected $fillable = [
        'user_id',
        'type', // 'weather', 'soil', 'market', 'pest'
        'title',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
