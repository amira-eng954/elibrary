<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
});


Route::get("/",[HomeController::class,"index"]);
Route::get("home",[HomeController::class,"index"]);
Route::get("search",[HomeController::class,"search"]);
Route::get("showcat/{id}",[HomeController::class,"showcat"]);
Route::get("showbook/{id}",[HomeController::class,"showbook"]);
Route::get("about",[HomeController::class,"about"]);
Route::get("contact",[HomeController::class,"contact"]);

Route::middleware('auth','admin')->group(function(){
    Route::get("/admin", [HomeController::class, "admin"])->name('admin');

    // admin control student curd student
    Route::get('users', [HomeController::class, 'all']);
    Route::get('users/{id}', [HomeController::class, 'show']);
    Route::get('adduser', [HomeController::class, 'create']);
    Route::post('users', [HomeController::class, 'store']);
    Route::get('users/edit/{id}', [HomeController::class, 'edit']);
    Route::put('users/{id}', [HomeController::class, 'update']);
    Route::delete('users/delete/{id}', [HomeController::class, 'delete']);

    //end control student


    // admin can add and delete and update author crud author
    Route::get('author', [AuthorController::class, 'all']);
    Route::get('author/{id}', [AuthorController::class, 'show']);
    Route::get('addauthor', [AuthorController::class, 'create']);
    Route::post('author', [AuthorController::class, 'store']);
    Route::get('author/edit/{id}', [AuthorController::class, 'edit']);
    Route::put('author/{id}', [AuthorController::class, 'update']);
    Route::delete('author/delete/{id}', [AuthorController::class, 'delete']);
    Route::get('author/approve/{id}', [AuthorController::class, 'approve']);

    //end admin control author

    // curd publisher

  
    Route::get('publisher', [PublisherController::class, 'all']);
    Route::get('publisher/{id}', [PublisherController::class, 'show']);
    Route::get('addpublisher', [PublisherController::class, 'create']);
    Route::post('publisher', [PublisherController::class, 'store']);
    Route::get('publisher/edit/{id}', [PublisherController::class, 'edit']);
    Route::put('publisher/{id}', [PublisherController::class, 'update']);
    Route::delete('publisher/delete/{id}', [PublisherController::class, 'delete']);
    Route::get('publisher/approve/{id}', [PublisherController::class, 'approve']);

    //end curd publisher

    //admin control category crud category
    Route::get("cats", [CatController::class, 'all']);
    Route::get("cats/{id}", [CatController::class, 'show']);
    Route::get("addcat", [CatController::class, 'create']);
    Route::post("cats", [CatController::class, 'store']);
    Route::get("cats/edit/{id}", [CatController::class, 'edit']);
    Route::put("cats/{id}", [CatController::class, 'update']);
    Route::delete("cats/delete/{id}", [CatController::class, 'delete']);


    //end admin control category

    // book control admin crud book
    Route::get('books', [BookController::class, 'all']);
    Route::get("books/{id}", [BookController::class, 'show']);
    Route::get("addbook", [BookController::class, 'create']);
    Route::post("books", [BookController::class, 'store']);
    Route::get("books/edit/{id}", [BookController::class, 'edit']);
    Route::put("books/{id}", [BookController::class, 'update']);
    Route::delete("books/delete/{id}", [BookController::class, 'delete']);
    Route::get("books/approve/{id}", [BookController::class, 'approve']);


    //end book control admin

    //admin see all Borrwingbooks
    Route::get("Borrwingbooks", [LoansController::class, "Borrwingbooks"]);
    Route::get("Borrwingbooks/edit/{id}", [LoansController::class,"edit"]);
    Route::put("Borrwingbooks/{id}", [LoansController::class, "update"]);
    //admin see favoratebooks
    Route::get("favoratebooks", [FavController::class, "favoratebooks"]);

    //booksappend
    Route::get('booksappend', [BookController::class, 'append']);

     //Authorsappend
     Route::get('authorsappend', [AuthorController::class, 'append']);
     
    // puplisher append
     
    Route::get('puplisherappend', [PublisherController::class, 'append']);

});

require __DIR__.'/auth.php';


//user fav borrow
Route::middleware('auth')->group(function(){
    //curd favorate
    Route::get("favs", [FavController::class, "favs"]);
    Route::get("addfav/{id}", [FavController::class, "addfav"]);
    Route::get(" fav/delete/{id}", [FavController::class, "delete"]);

     // curd borrow
    Route::get("addborrow/{id}", [LoansController::class, "create"]);
    Route::get("bookborrow", [LoansController::class, "bookborrow"]);
    
    Route::get(" borrow/delete/{id}", [LoansController::class, "delete"]);

    // add book
    Route::get("addbookuser", [BookController::class, 'createbook']);
    Route::post("booksuser", [BookController::class, 'storebook']);
    
    
});

