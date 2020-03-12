<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        echo 'hellooo upload file';
        echo  $request->file->extension();


        $request->validate([
            'file' => 'required|mimes:zip',
        ]);

        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);

        return redirect('/challenges')->with('success','You have successfully upload file.');


    }
}
