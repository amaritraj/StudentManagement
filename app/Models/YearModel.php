<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YearModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'id',
    //     'year_name',
    // ];

    public function course()
    {
        return $this->hasMany(Course::class, 'course_id', 'id');
    }


}

