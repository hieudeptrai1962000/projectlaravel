<?php

namespace App\Http\Controllers;

use App\Repositories\Subjects\SubjectsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectsController extends Controller
{


    public function __construct(SubjectsRepository $subjectRepo)
    {
        $this->subjectRepo = $subjectRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subject = $this->subjectRepo->getSubject();
        return view('subject.main', compact('subject'));
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
            'name' => 'required|unique:subjects,name',
        ],
            [
                'name.unique' => 'Tên không được trùng',
            ]
        );
        $this->subjectRepo->create($request->all());
        return redirect()->route('subject.index')->with('success', 'Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('subject.create');
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
        $subject = $this->subjectRepo->find($id);
        return view('subject.edit', compact('subject'));
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
            'name' => 'required|unique:subjects,name',
        ],
            [
                'name.unique' => 'Tên không được trùng',
            ]
        );

        $subject = $this->subjectRepo->find($id);
        $subject->update($request->all());

        return redirect()->route('subject.index', compact('subject'))->with('success', 'Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $subject = $this->subjectRepo->find($id);
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Successfully!');
    }
}
