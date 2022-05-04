<?php

namespace App\Http\Controllers;

use App\Repositories\Student_subject\Student_subjectRepository;
use App\Repositories\Students\StudentsRepository;
use App\Repositories\Subjects\SubjectsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Student_subject extends Controller
{


    public function __construct(Student_subjectRepository $resultRepo, StudentsRepository $studentRepo, SubjectsRepository $subjectRepo)
    {
        $this->resultRepo = $resultRepo;
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
        $result = $this->resultRepo->getStudent_subject();
        return view('result.main', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {


        $this->resultRepo->create($request->all());
        return redirect()->route('result.index')->with('success', 'Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $subject = $this->subjectRepo->getAll();
        $student = $this->studentRepo->getAll();
        return view('result.create', compact('student', 'subject'));
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
        $result = $this->resultRepo->find($id);
        $subject = $this->subjectRepo->getAll();
        $student = $this->studentRepo->getAll();
        return view('result.edit', compact('result', 'student', 'subject'));
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

        $result = $this->resultRepo->find($id);
        $result->update($request->all());

        return redirect()->route('result.index', compact('result'))->with('success', 'Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $result = $this->resultRepo->find($id);
        $result->delete();
        return redirect()->route('result.index')->with('success', 'Successfully!');
    }
}
