<?php

namespace App\Http\Controllers;

use App\Repositories\Faculty\FacultyRepository;
use App\Repositories\Students\StudentsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentsController extends Controller
{


    public function __construct(StudentsRepository $studentRepo, FacultyRepository $facultyRepo)
    {
        $this->studentRepo = $studentRepo;
        $this->facultyRepo = $facultyRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $student = $this->studentRepo->getStudent();
        return view('student.main', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required|unique:students,email',
            'birthday' => 'required',
            'phone_number' => 'required',
            'image' => 'required',
        ],
            [
                'email.unique' => 'Mail không được trùng',
            ]
        );

        $data = $request->all();
        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file_name = $file->move($destinationPath, $file->getClientOriginalName());

        }
        $data['image'] = $file_name;
        $this->studentRepo->create($data);
        return redirect()->route('student.index')->with('success', 'Successful!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $faculty = $this->facultyRepo->getAll();
        return view('student.create', compact('faculty'));
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
        $student = $this->studentRepo->find($id);
        $faculty = $this->facultyRepo->getAll();
        return view('student.edit', compact('student', 'faculty'));
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
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|unique:students,email',
            'birthday' => 'required',
            'phone_number' => 'required',
            'image' => 'required',
        ],
            [
                'email.unique' => 'Mail không được trùng',
            ]
        );

        $data = $request->all();
        if ($request->has('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file_name = $file->move($destinationPath, $file->getClientOriginalName());
        }
        $data['image'] = $file_name;
        $this->studentRepo->find($id)->update($data);

        return redirect()->route('student.index')->with('success', 'Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $student = $this->studentRepo->find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Successfully!');
    }
}
