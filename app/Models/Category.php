<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cname', 'description'
    ];

    protected $primaryKey = 'cid';

    public function from(){
                            //class mana, fk class, fk sini
        return $this->hasMany(Transaction::class, 'from', 'cid');
    }
    public function to(){
        //class mana, fk class, fk sini
        return $this->hasMany(Transaction::class, 'to', 'cid');
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->timestamp;
    }

    public function getFotoAsetAttribute(){
        return url('') . Storage::url($this->attributes['foto_aset']);
    }
}
