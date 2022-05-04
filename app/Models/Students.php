<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = ['id', 'full_name', 'email', 'birthday', 'gender', 'phone_number', 'image', 'faculty_id'];
}
