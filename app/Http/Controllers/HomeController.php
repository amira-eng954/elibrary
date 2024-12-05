<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Book;
use App\Models\Fav;
use App\Models\Author;
use App\Models\Cat;
use App\Models\Loans;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $cats=Cat::all();
        $books=Book::where('status','=',1)->get();
        return view('user.home1',['books'=>$books,'cats'=>$cats]);
    }
    public function admin()
    {
        //echo"admin";
        $books = Book::all();
        $authors = Author::all();
        $cats = Cat::all();
        $count = Book::where("status", '=', 0)->count();
        $aa = Author::where("groupId", '=', 0)->count();
        $pp = Publisher::where("groupId", '=', 0)->count();
        $author = Author::count();
        $publishers = Publisher::count();
        $book = Book::count();
        $users = User::count();
        $cat = Cat::count();
        $loans = Loans::count();
        $favs = Fav::count();
            
      return view('admin.dashboard',['books'=>$books,
      'authors'=>$authors,
      'cats'=>$cats,
      'author' => $author,
      'publishers' =>$publishers,
      'book' => $book,
      'users' => $users,
      'cat' =>$cat,
      'loans' =>$loans,
      'favs' =>$favs,
      'b'=>$count,
      'a'=>$aa,
      'p'=>$pp

    ]);
    }

    public function search( Request $request)
	{
        $word=$request->word;
		$books = Book::where('title', 'LIKE', '%'.$word.'%')->get();
        $cats = Cat::all();
        //print_r($books);
        return view('user.home1',['books'=>$books,'cats'=>$cats]);
        
		
	}

    public function showcat($id)

    {   $cat=Cat::find($id);
        $books=Book::where("cat_id",'=',$id)->get();
        $cats=Cat::all();
       
        return view('user.showcat',['books'=>$books,'cats'=>$cats,'cat'=>$cat]);


    }



    public function showbook($id)

    {
       
        $books = Book::find($id);
        $cats = Cat::all();
        //print_r($books);
        return view('user.showbook', ['book' => $books, 'cats' => $cats]);
    }


    public function about()
    {
        $cats=Cat::all();
       
        return view('user.about',['cats'=>$cats]);



    }

    public function contact()
    {
        $cats=Cat::all();
       
        return view('user.contact',['cats'=>$cats]);



    }

    

   

   















    // admin control users
    public function all()
    {
        $data=User::all();
        return view('admin.users.selectAll',['data'=>$data]);
    }

    public function show($id)
    {
        $data=User::find($id);
        return view('admin.users.show',['data'=>$data]);
    }

    public function create()
    {
        
        return view('admin.users.add');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>"required|string",
        'email'=>'required',
        'password'=>'required',
        ]);
        User::create($data);
        session()->flash('suc',"user added suc ");
        return redirect(url("users"));
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view("admin.users.edit",['data'=>$user]);
    }

    public function update($id ,Request $request)
    {
        $d=User::find($id);
        $data=$request->validate([
            'name'=>"required|string",
        'email'=>'required',
        'password'=>'required',
        ]);
        $d->update($data);
        session()->flash('suc',"user updated suc ");
        return redirect(url("users"));


    }

    public function delete($id)
    {
        $d=User::find($id);
        $d->delete();
        session()->flash('suc',"user deleted suc ");
        return redirect(url("users"));

    }

}
