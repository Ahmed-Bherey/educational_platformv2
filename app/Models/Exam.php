<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'subCategory_id',
        'subject_id',
        'date',
        'name',
        'img',
        'notes',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sub_categories()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
