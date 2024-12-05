<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Fav;
use App\Models\Author;
use App\Models\Cat;
use App\Models\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoansController extends Controller
{
    //


    // admin see Borrwingbooks

   public function Borrwingbooks()
   {
    $Brow=Loans::all();
    return view('admin.borrow.all',['loans'=>$Brow]);
   }

   public function edit($id)
    {  
         $d=Loans::find($id);
         return view('admin.borrow.edit',['book'=>$d]);

    }

    public function update($id ,Request $request)
    { 
        $d=Loans::find($id);
        $data=$request->validate([
            'start'=>"required",
            'end'=>'required'
        ]);
        $d->update($data);
        session()->flash('suc',"Borrwingbooks  updated  suc");
        return Redirect(url("Borrwingbooks"));


    }













   //end admin see Borrwingbooks

    public function bookborrow()
    { 
        $id=Auth::user()->id;
        $favs=Loans::where("user_id",'=',$id)->get();
        $cats=Cat::all();
    
        return view('user.borrow',['loans'=>$favs,'cats'=>$cats]);

    }

    public function create($id)
    { 
        $user_id=Auth::user()->id;
        $data=[
            "user_id"=>$user_id,
            'book_id'=>$id,
            'start'=>now(),
            'end'=>now()
        ];
        Loans::create($data);
        return Redirect(url("bookborrow"));
    
    }

    public function delete($id)
    { 
         $d=Loans::find($id);
         $d->delete();
         return Redirect(url("bookborrow"));

    }
   





}
