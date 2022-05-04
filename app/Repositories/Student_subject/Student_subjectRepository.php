<?php

namespace App\Repositories\Student_subject;

use App\Models\Student_subject;
use App\Repositories\BaseRepository;


class Student_subjectRepository extends BaseRepository
{

    public function getModel()
    {
        return Student_subject::class;
    }

    public function getStudent_subject()
    {
        return Student_subject::paginate(5);
    }
}
