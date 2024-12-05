<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublisherController extends Controller
{
    //
    public function append()
    {
        $books=Publisher::where("groupId","=",'0')->get();
        return view("admin.publisher.all",['authors'=>$books]);

    }

   
   

    public function all()
    {
        $authors=Publisher::all();
        return view('admin.publisher.all',['authors'=>$authors]);
    }

    public function show($id)
    {
        $author=Publisher::find($id);
        return view('admin.publisher.show',['authors'=>$author]);
    }

    public function create()
    { //echo 'amira';
      return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'email'=>'required',
            
            'address'=>'required|string',
           'job'=>'required|string'
           
          ,'image'=>'required|image|mimes:png,jpg,jpeg',
          
        ]);
    $data['date']=now();
    
    $data['image']  = Storage::putFile("img", $data['image']);
    Publisher::create($data);
    session()->flash('suc','publisher added');
    return redirect(url('publisher'));

    }
    public function edit($id)
    {
        $data= Publisher::find($id);
        return view('admin.publisher.edit',['authors'=>$data]);

    }

    public function update(Request $request ,$id)
    {
        $d=Publisher::find($id);
        $data=$request->validate([
          'name'=>'required|string',
            'email'=>'required',
           
            'address'=>'required|string',
           'job'=>'required|string'
          ,'image'=>'image|mimes:png,jpg,jpeg',
          
        ]);
    
   
     if($request->has('image')){
        Storage::delete($d->image);
        $data['image']=Storage::putFile("img",$data['image']);
     }
        $d->update($data);
        session()->flash('suc','publisher updated');
        return redirect(url('publisher'));


    

        
    }

    public function approve($id)
    {
        $d=Publisher::find($id);
       
        $d['groupId']=1;
        $d->save();
        session()->flash('suc','publisher approved suc');
        return redirect(url('publisher'));


    }

    public function delete($id)
    {
        $d=Publisher::find($id);
        Storage::delete($d->image);
        $d->delete();
        session()->flash('suc','publisher deleted');
        return redirect(url('publisher'));


    }








    // users
   


}

