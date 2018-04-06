<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Response;
use App\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::orderBy('id', 'desc')->paginate(10);
        return view('admin.mediamanagement.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mediamanagement.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('file') && Auth::check()) {
            $files = $request->file('file');
            foreach($files as $file) {
                //make the unique name
                $name = uniqid(). '_' . time() . '_' . $file->getClientOriginalName();
                $destinationPath = 'public/upload/files/';

                //save the file to disc
                $file->storeAs($destinationPath, $name);

                //save the file to database
                $newFile = new File;
                $newFile->name = $name;
                $newFile->location = $destinationPath . $name;
                $newFile->type = $file->getClientMimeType();
                $newFile->size = $file->getClientSize();
                $newFile->user_id = Auth::id();
                $newFile->save();
            }
            session()->flash('flashmessage', 'File(s) added successfully');
        } 
        else {
            return response()->json(['message' => 'Uploading file failed, please upload again']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $location = $file->location;
        $header = $file->type;
        $content = Storage::get($location);

        return Response::make($content, 200, [
            'Content-Type' => $header,
            'Content-Disposition' => 'inline; filename="' . $location. '"',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $location = $file->location;
        $name = $file->name;
        Storage::delete($location . $name);
        $file->delete();
        session()->flash('flashmessage', 'File(s) deleted successfully');
        return redirect(route('file.index'));
    }
}
