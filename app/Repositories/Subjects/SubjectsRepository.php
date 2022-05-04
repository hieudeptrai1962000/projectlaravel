<?php

namespace App\Repositories\Subjects;

use App\Models\Subjects;
use App\Repositories\BaseRepository;


class SubjectsRepository extends BaseRepository
{

    public function getModel()
    {
        return Subjects::class;
    }

    public function getSubject()
    {
        return Subjects::paginate(5);
    }
}
