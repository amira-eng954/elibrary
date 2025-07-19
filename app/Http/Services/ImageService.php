<?php

namespace App\Http\Services;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
Class ImageService{
    public function uploaded($file,$folder)
    {


        $name=uniqid().'.'.$file->getClientOriginalExtension();
       
        $file->storeAs($folder,$name,"public");
         return $name;
             
    }
}