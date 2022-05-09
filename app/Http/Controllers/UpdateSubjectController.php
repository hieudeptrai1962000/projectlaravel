<?php

namespace App\Http\Controllers;

use App\Models\Student_subjectModel;
use App\Repositories\Students\StudentsRepository;
use App\Repositories\Subjects\SubjectsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpdateSubjectController extends Controller
{


    public function __construct(StudentsRepository $studentRepo, SubjectsRepository $subjectRepo)
    {
        $this->studentRepo = $studentRepo;
        $this->subjectRepo = $subjectRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $student_id = $request->input('student_id');
        $subject = $request->input('subject_id');
        $mark = $request->input('mark');
        foreach ($subject as $s) {
            $result = new Student_subjectModel;
            $result->student_id = $student_id;
            $result->subject_id = $s;
            $result->mark = $mark;
            $result->save();
        }
        return redirect()->route('result.index')->with('success', 'Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subject = $this->subjectRepo->getAll();
        $student = $this->studentRepo->find($id);
        return view('update.subject', compact('student', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
