<?php

namespace App\Repositories\Students;

use App\Models\Students;
use App\Repositories\BaseRepository;


class StudentsRepository extends BaseRepository
{

    public function getModel()
    {
        return Students::class;
    }

    public function getStudent()
    {
        return Students::paginate(5);
    }
}
