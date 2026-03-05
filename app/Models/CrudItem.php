<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudItem extends Model
{
    use HasFactory;

    protected $table = 'crud_items';

    protected $fillable = [
        'title',
        'category',
        'status',
        'notes',
    ];
}
