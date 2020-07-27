<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;

class CandidateController extends Controller
{

    public function index()
    {
        $candidates=Candidate::orderBy('id','DESC')->paginate(15);

        return view('candidate.index',compact('candidates'));
    }


    public function create()
    {
        return view('candidate.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'lastname'=>'required', 'email'=>'required']);


        Candidate::create($request->all());


        return redirect()->route('candidate.index')->with('success','Registro creado satisfactoriamente');

    }

    public function show($id)
    {
        $candidates=Candidate::find($id);


        return  view('candidate.show',compact('candidates'));
    }

    public function edit($id)
    {
        $candidate=Candidate::find($id);


        return view('candidate.edit',compact('candidate'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name'=>'required', 'lastname'=>'required', 'email'=>'required']);

        Candidate::find($id)->update($request->all());

        return redirect()->route('candidate.index')->with('success','Registro actualizado satisfactoriamente');

    }

    public function destroy($id)
    {
        Candidate::find($id)->delete();

        return redirect()->route('candidate.index')->with('success','Registro eliminado satisfactoriamente');

    }

}
