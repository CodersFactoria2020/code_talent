<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;
use App\Promotion;

class CandidateController extends Controller
{

    public function index()
    {
        $candidates=Candidate::orderBy('status','ASC')->paginate(15);

        return view('candidate.index',compact('candidates'));
    }


    public function create()
    {
        $promotions= Promotion::all();


        return view('candidate.create',compact('promotions'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'lastname'=>'required', 'email'=>'required']);


        Candidate::create($request->all());


        return redirect()->route('candidate.index')->with('success','Registro creado satisfactoriamente');

    }

    public function show($id)
    {
        $candidate=Candidate::find($id);


        return  view('candidate.perfil',compact('candidate'));
    }

    public function edit($id)
    {
        $candidate=Candidate::find($id);
        $promotions= Promotion::all();


        return view('candidate.edit',compact('candidate','promotions'));
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
