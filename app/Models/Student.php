<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'code',
        'date_of_birth',
        'email',
        'level_id',
    ];


    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function gradeItems()
    {
        return $this->belongsToMany(GradeItem::class, 'student_grade_item')
            ->withPivot('grade'); // You can add additional pivot columns if needed
    }
}
