<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'image',
        'description'
    ];
    public $timestamps = false;

    public function hasCourses(){
        return $this->hasMany(Course::class,'category_id','id');
    }
    public function inWishlist(){
        return $this->hasOne(Wishlist::class);
    }

}
