<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedCourse extends Model
{
    use HasFactory;
    public $table = 'saved_courses';
    protected $primaryKey = 'id';
    protected $dates = ['day_saved'];
    protected $fillable = [
        'id',
        'course_id',
        'user_id',
        'day_saved',
    ];
    public $timestamps = false;
    public function ofCourse(){
        return $this->hasOne(Course::class,'id','course_id') ;
    }
    public function ofUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
