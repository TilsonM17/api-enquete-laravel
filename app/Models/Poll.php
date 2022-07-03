<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Option;

class Poll extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'poll_id';
    protected $table = "poll";
   
    protected $hidden = ['created_at, updated_at, deleted_at'];

   /* public function option()
    {
        return $this->hasOne(Option::class, 'poll_id', 'poll_id');
    }*/
}
