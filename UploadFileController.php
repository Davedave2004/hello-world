<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FileRequest;

class UploadFileController extends Controller
{
    public function index() {
        return view('uploadfile');
    }

    public function store(FileRequest $request) {
        //php artisan storage:link
        //<img src="{{asset('storage/rfm/id-mo/1.jpg')}}">
        //add validation
        $request->account_type = strtoupper($request->account_type);
   
        //
        //$newFileName = "id-mo-".time().'.'.$request->picture_file->getClientOriginalExtension();
        $newFileName = '2.'.$request->picture_file->getClientOriginalExtension();
        $uploadedFile = $request->picture_file->storeAs('rfm/id-mo',$newFileName); //->store('directory')  <- gagawa na siya ng directory kung wala pa , new file name
        if (Storage::disk('public')->exists($uploadedFile)) {
            //Store sa DB
            return redirect('/uploadfile')->withSuccess('Uploaded');
        } else {
            return redirect('/uploadfile')->withErrors('Could not upload');
        }
        //if success store sa database, if no show an error
        


        /*
        @if (file_exists(public_path('path/to/asset.png')))
            <img src="{{ asset('path/to/asset.png') }}">
        @else
            <img src="{{ asset('path/to/missing.png') }}">
        @endif
         */
    }
}
