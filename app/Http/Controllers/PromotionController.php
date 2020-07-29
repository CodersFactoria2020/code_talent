<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function index()
    {
        $promotions = Promotion::orderBy('created_at', 'DESC')->paginate(15);

        return view('promotion.index',compact('promotions'));
    }


    public function create()
    {
        return view('promotion.create');
    }


    public function store(Request $request)
    {
        Promotion::create($request->all());
        return redirect(route('promotion.index'));
    }


    public function show($id)
    {
        $promotions = Promotion::find($id);


        return  view('promotion.show',compact('promotions'));
    }


    public function edit(Promotion $promotion)
    {
        return view('promotion.edit',['promotion'=>$promotion]);
    }

    public function update(Request $request, Promotion $promotion)
    {
        $promotion->update($request->all());
        return redirect(route('promotion.index'));
    }


    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect(route(route('promotion.index')));
    }
}
