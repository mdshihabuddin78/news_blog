<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'visitor_id',
        'post',
        'comment'
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
