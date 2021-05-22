<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    use HasFactory;

    protected $table = 'category_user';

    protected $fillable = [
        'user_id',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
