<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'category_id',
        'subCategory_id',
        'name',
        'explain',
        'img',
        'file',
        'video',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id', 'id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'subject_id', 'id');
    }
}
