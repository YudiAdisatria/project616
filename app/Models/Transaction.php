<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uid', 'from', 'to', 'amount', 'message'
    ];

    protected $primaryKey = 'tid';

    public function from(){
        //class mana, fk class, fk sini
        return $this->belongsTo(Category::class, 'cid', 'from');
    }
    public function to(){
        //class mana, fk class, fk sini
        return $this->belongsTo(Category::class, 'cid', 'to');
    }
    public function uid(){
        //class mana, fk class, fk sini
        return $this->belongsTo(User::class, 'uid', 'uid');
    }
}
