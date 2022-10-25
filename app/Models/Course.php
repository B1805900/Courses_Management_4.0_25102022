<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Course extends Model
{
    use HasApiTokens, HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dates = ['upload_date'];
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'price',
        'desc',
        'owner',
        'status',
        'image',
        'upload_date',
    ];
    public function hasCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function hasOwner(){
        return $this->hasOne(User::class,'id','owner');
    }
    public function hasLessons(){
        return $this->hasMany(Lesson::class,'course_id','id');
    }
}