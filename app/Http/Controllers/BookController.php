<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Cat;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    //

    // append books
    public function append()
    {
        $books=Book::where("status","=",0)->get();
        // foreach($books as $n)status==0
        // {
        //     echo $n['status'];
        // }
        return view("admin.books.all",['books'=>$books]);

    }


    public function all()
    {
        $books=Book::all();
        return view("admin.books.all",['books'=>$books]);

    }

    public function show($id)
    {
        $books=Book::find($id);
        return view("admin.books.show",['book'=>$books]);
        
    }

    public function create()
    {
        $cats=Cat::all();
        $publisher=Publisher::all();
        $authors=Author::all();
         return view("admin.books.create",['publisher'=>$publisher, 'cats'=>$cats,'authors'=>$authors]);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>"required|string",
           'desc'=>"required|string",
           'image'=>"required|image|mimes:png,jpg",
            'Language'=>'required',
            'pages'=>'required',
            'publisher_id'=>'required',
           'author_id'=>"required",
           'cat_id'=>"required"
        ]);
        $data['date']=now();
        $data['status']=1;
        $data['image']=Storage::putFile("img",$data['image']);
        Book::create($data);

        session()->flash('suc',"book added suc");
        return redirect(url('books'));
    }

    public function edit($id)
    {   $books=Book::find($id);
        $cats=Cat::all();
        $authors=Author::all();
        $publisher=Publisher::all();
         return view("admin.books.edit",['publisher'=>$publisher, 'book'=>$books,'cats'=>$cats,'authors'=>$authors]); 
    }

    public function update($id,Request $request)
    {
        $book=Book::find($id);
        $data=$request->validate([
            'title'=>"required|string",
           'desc'=>"required|string",
           'image'=>"image|mimes:png,jpg",
            'Language'=>'required',
            'pages'=>'required',
           'publisher_id'=>'required',
           'author_id'=>"required",
           'cat_id'=>"required"


        ]);
        if($request->has('image'))
        {
            Storage::delete($book->image);
            $data['image']=Storage::putFile('img',$data['image']);
        }
        $book->update($data);
        session()->flash('suc',"book updated suc");
        return redirect(url('books'));  
    }

    public function delete($id)
    { 
        $data=Book::find($id);
        Storage::delete($data['image']);
        $data->delete();
  
        session()->flash('suc',"book deleted suc");
        return redirect(url('books')); 
    }

    public function approve($id)
    {
        $d=Book::find($id);
        $d['status']=1;
        $d-> save();
        echo $d['status'];
        session()->flash('suc',"book approve suc");
        return redirect(url('books')); 
    }

    // user add book 
    

    public function createbook ()
    {
        $cats=Cat::all();
        $publisher=Publisher::all();
        $authors=Author::all();
         return view("user.addbook",['publisher'=>$publisher, 'cats'=>$cats,'authors'=>$authors]);
    }

    public function storebook(Request $request)
    {
        $data=$request->validate([
            'title'=>"required|string",
           'desc'=>"required|string",
           'image'=>"required|image|mimes:png,jpg",
            'Language'=>'required',
            'pages'=>'required',
            'publisher_id'=>'required',
           'author_id'=>"required",
           'cat_id'=>"required"
        ]);
        $data['date']=now();
        
        $data['image']=Storage::putFile("img",$data['image']);
        Book::create($data);

        session()->flash('suc',"book added suc but admin approve it");
        return redirect(url('home'));
    }

    
   
}
