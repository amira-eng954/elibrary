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

use function Pest\Laravel\delete;

class FavController extends Controller
{
  
    // admin see all favoratebooks
    public function favoratebooks()
    {
        $favs=Fav::all();
        return view('admin.favs.all',['loans'=>$favs]);

    }

    public function favs()
    { 
        $id=Auth::user()->id;
        $favs=Fav::where("user_id",'=',$id)->get();
        $cats=Cat::all();
    
        return view('user.favs',['favs'=>$favs,'cats'=>$cats]);

    }

    public function addfav($id)
    { 
        $user=Auth::user()->id;
        $data=[
            'user_id'=>$user,
            'book_id'=>$id
        ];
        Fav::create($data);
        return redirect(url('favs'));

    }
    public function delete($id)
    { 
        $d=Fav::find($id);
        $d->delete();
        return redirect(url('favs'));
    }

    //
}
