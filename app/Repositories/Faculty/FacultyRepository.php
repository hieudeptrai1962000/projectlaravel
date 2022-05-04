<?php

namespace App\Repositories\Faculty;

use App\Models\Faculty;
use App\Repositories\BaseRepository;


class FacultyRepository extends BaseRepository
{

    public function getModel()
    {
        return Faculty::class;
    }

    public function getFaculty()
    {
        return Faculty::paginate(5);
    }
}
