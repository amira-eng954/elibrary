<?php

namespace App\Http\Controllers;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    //
    public function all()
    {
        $cats=Cat::all();

        return view('admin.cats.all',['cats'=>$cats]);
    }

    public function show($id)
    {
        $cat=Cat::find($id);
        return view('admin.cats.show',['cat'=>$cat]);
    }

    public function create()
    {

        return view('admin.cats.create');
    }

    public function store(Request $request)
    {
       $data=$request->validate([
        'namecat'=>'required|string',
        'body'=>'required|string'
       ]);
       Cat::create($data);
        session()->flash('suc',"category added suc");
        return redirect(url('cats'));
    }


    public function edit($id)
    {
        $cat=Cat::find($id);
        return view('admin.cats.edit',['cat'=>$cat]);
        
    }


    public function update($id,Request $request)
    {   $d=Cat::find($id);
        $data=$request->validate([
            'namecat'=>'required|string',
            'body'=>'required|string'
           ]);

           $d->update($data);
        session()->flash('suc',"category updated suc");
        return redirect(url('cats'));
    }


    public function delete($id)
    {
       $cat=Cat::find($id);
       $cat->delete();
       session()->flash('suc',"category deleted suc");
        return redirect(url('cats'));
    }
}
