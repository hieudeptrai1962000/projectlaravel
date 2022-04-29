<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Faculty\FacultyRepository;

class FacultyController extends Controller
{


    public function __construct(FacultyRepository $facultyRepo)
    {
        $this->facultyRepo = $facultyRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty = $this->facultyRepo->getFaculty();
        return view('faculty.main',compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = $this->validate($request, [
            'id' =>[
                'required',
                'unique:faculties,id'
            ],
            'name' =>[
                'required',
                'unique:faculties,name'
            ],
        ]);


        $this->facultyRepo->create($request->all());
        return redirect()->route('faculty.index')->with('success','Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = $this->facultyRepo->find($id);
        return view('faculty.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>[
                'required',
                'unique:faculties,name'
            ],
        ]);
        $faculty =$this->facultyRepo->find($id);
        $faculty->update($request->all());

        return redirect()->route('faculty.index', compact('faculty'))->with('success','Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = $this->facultyRepo->find($id);
        $faculty->delete();
        return redirect()->route('faculty.index')->with('success','Successfully!');
    }
}
