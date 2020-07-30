<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Promotion;

class PromotionController extends Controller
{

    public function index()
    {
        $promotions=Promotion::orderBy('created_at','ASC')->paginate(15);

        return view('promotion.index',compact('promotions'));
    }


    public function create()
    {
        return view('promotion.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[ 'name'=>'required', 'promotion'=>'required']);


        Promotion::create($request->all());


        return redirect()->route('promotion.index')->with('success','Registro creado satisfactoriamente');

    }

    public function show($id)
    {
        $promotion=Promotion::find($id);


        return  view('promotion.index',compact('promotion'));
    }

    public function edit($id)
    {
        $promotion=Promotion::find($id);


        return view('promotion.edit',compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name'=>'required', 'promotion'=>'required']);

        Promotion::find($id)->update($request->all());

        return redirect()->route('promotion.index')->with('success','Registro actualizado satisfactoriamente');

    }

    public function destroy($id)
    {
        Promotion::find($id)->delete();

        return redirect()->route('promotion.index')->with('success','Registro eliminado satisfactoriamente');

    }

}
