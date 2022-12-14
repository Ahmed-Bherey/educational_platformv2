<?php

namespace App\Models;

use App\Models\Exam;
use App\Models\User;
use App\Models\Member;
use App\Models\Subject;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamAnser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'member_id',
        'category_id',
        'subCategory_id',
        'subject_id',
        'exam_id',
        'date',
        'name',
        'reponse',
        'notes',
        'img',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function members()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function exams()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
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
