<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uid', 'cid', 'in', 'out', 'balance', 'periode'
    ];

    protected $primaryKey = 'bid';

    public function user(){
                            //class mana, fk class, fk sini
        return $this->belongsTo(User::class, 'uid', 'uid');
    }
    public function category(){
        //class mana, fk class, fk sini
        return $this->belongsTo(Category::class, 'cid', 'cid');
    }
}
