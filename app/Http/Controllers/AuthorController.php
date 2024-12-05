<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    //
 /// auhor append
    public function append()
    {
        $books=Author::where("groupId","=",'0')->get();
        return view("admin.authors.all",['authors'=>$books]);

    }

    public function all()
    {
        $authors=Author::all();
        return view('admin.authors.all',['authors'=>$authors]);
    }

    public function show($id)
    {
        $author=Author::find($id);
        return view('admin.authors.show',['authors'=>$author]);
    }

    public function create()
    { //echo 'amira';
      return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'email'=>'required',
            'age'=>'required',
            'address'=>'required|string',
           'job'=>'required|string',
           'awards'=>'required|string'
          ,'image'=>'required|image|mimes:png,jpg,jpeg',
          
        ]);
    $data['date']=now();
    $data['status']=1;
    $data['image']  = Storage::putFile("img", $data['image']);
    Author::create($data);
    session()->flash('suc','author added');
    return redirect(url('author'));

    }
    public function edit($id)
    {
        $data= Author::find($id);
        return view('admin.authors.edit',['authors'=>$data]);

    }

    public function update(Request $request ,$id)
    {
        $d=Author::find($id);
        $data=$request->validate([
          'name'=>'required|string',
            'email'=>'required',
            'age'=>'required',
            'address'=>'required|string',
           'job'=>'required|string',
           'awards'=>'required|string'
          ,'image'=>'image|mimes:png,jpg,jpeg',
          
        ]);
    
   
     if($request->has('image')){
        Storage::delete($d->image);
        $data['image']=Storage::putFile("img",$data['image']);
     }
        $d->update($data);
        session()->flash('suc','author updated');
        return redirect(url('author'));


    

        
    }

    public function approve($id)
    {
        $d=Author::find($id);
       
        $d['groupId']=1;
        $d->save();
        session()->flash('suc','author approved suc');
        return redirect(url('author'));


    }

    public function delete($id)
    {
        $d=Author::find($id);
        Storage::delete($d->image);
        $d->delete();
        session()->flash('suc','author deleted');
        return redirect(url('author'));


    }








    // users
   


}
