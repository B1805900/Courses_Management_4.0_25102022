<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    public $table = 'wishlist_items';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'course_id',
        'user_id'
    ];
    public $timestamps = false;

    public function ofCourse(){
        return $this->hasOne(Course::class,'id','course_id') ;
    }
    public function ofUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
