<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table = "option";
    protected $primaryKey = "option_id";
    protected $hidden = ['created_at, updated_at, deleted_at'];
}
