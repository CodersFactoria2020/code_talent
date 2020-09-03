<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Course;
use Illuminate\Http\Request;

use App\Promotion;


class PromotionController extends Controller
{

    public function index()
    {
        $promotions=Promotion::orderBy('created_at','ASC')->paginate(15);
        //$course = Course::where($promotions)->get();

        $course = Course::find($promotions);

        return view('promotion.index',compact('promotions','course'));
    }


    public function create()
    {
        $courses = Course::all();

        return view('promotion.create',compact('courses'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required','course_id'=>'required']);

        Promotion::create($request->all());


        return redirect()->route('promotion.index')->with('success','Registro creado satisfactoriamente');

    }

    protected function show(Promotion $promotion)
    {
        return  view('promotion.show',compact('promotion'));
    }

    public function edit($id)
    {
        $promotion=Promotion::find($id);
        $courses = Course::all();


        return view('promotion.edit',compact('promotion','courses'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name'=>'required']);

        Promotion::find($id)->update($request->all());

        return redirect()->route('promotion.index')->with('success','Registro actualizado satisfactoriamente');

    }

    public function destroy($id)
    {
        Promotion::find($id)->delete();

        return redirect()->route('promotion.index')->with('success','Registro eliminado satisfactoriamente');

    }

}
