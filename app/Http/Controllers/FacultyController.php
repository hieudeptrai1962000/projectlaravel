<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
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
//        $facu = \App\Models\FacultyController::all();
//        return view('faculty.main',compact('facu'));
        $facu = $this->facultyRepo->getFaculty();
        return view('faculty.main',compact('facu'));
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
        $data = $request->all();
        $faculty = $this->facultyRepo->create($data);
        return redirect()->route('faculty.index');
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
        $facuedit = $this->facultyRepo->find($id);
        return view('faculty.edit', compact('facuedit'));
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
        $faculty =$this->facultyRepo->find($id);
        $faculty->update($request->all());

        return redirect()->route('faculty.index', compact('faculty'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facudel = $this->facultyRepo->find($id);
        $facudel->delete();
        return redirect()->route('faculty.index');
    }
}
