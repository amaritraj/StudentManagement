<?php

namespace App\Models;

use App\Models\YearModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    // protected $fillable = [
    //     'çourse_id',
    //     'course_name',
    //     'year_id',
    // ];

    // protected $primaryKey = "course_id";

    public function year(){
        return $this->belongsTo(YearModel::class);
    }
}
