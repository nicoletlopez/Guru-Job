<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentSpace;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentSpacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user())
        {
            return redirect()->route('login');
        } elseif (auth()->user()->faculty)
        {
            //$documentSpaces=auth()->user()->faculty->documentSpaces;

            /*$documentSpaces = Cache::remember('documentSpaces',20,function()
            {
                return auth()->user()->faculty->documentSpaces;
            });*/

            $documentSpaces = auth()->user()->faculty->documentSpaces;

            $context = array(
                'documentSpaces' => $documentSpaces,
            );
            return view('faculty.manage-documents')->with($context);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $user_name = str_replace(' ', '_', $user->name);
        $faculty_id = $user->id;
        $documentSpaceName = strtoupper($request->input('documentSpaceName'));

        //check if the chosen name has duplicates
        if (DB::table('document_space')->where('faculty_id', $faculty_id)->where('title', $documentSpaceName)->exists())
        {
            return back()->with('error', 'A document space of the same name already exists!');
        }

        //create the directory entry in the database
        $documentSpace = new DocumentSpace();
        $documentSpace->title = $documentSpaceName;
        $documentSpace->desc = 'New Folder';
        $documentSpace->faculty_id = $faculty_id;
        $documentSpace->save();

        //create the directory in the storage
        Storage::makeDirectory('/public/' . $user_name . '/documents/' . $documentSpaceName);


        return back()->with('success', 'Folder Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /*$documentSpace = DocumentSpace::find($id);
        $documents = $documentSpace->documents;*/


        /*$documentSpace = Cache::remember('documentSpace',20,function() use (&$id)
        {
            return DocumentSpace::find($id);
        });*/

        /*$documents = Cache::remember('documents',20,function() use (&$documentSpace)
        {
           return $documentSpace->documents;
        });*/

        $documentSpace = DocumentSpace::find($id);
        $documents = $documentSpace->documents;

        $fileExts = [];
        foreach ($documentSpace->documents as $file)
        {
            preg_match("/\.(\w+)(?!.*\.(\w+))/", $file->name, $ext);
            preg_match("/([^\/]+)(?=\.\w+$)/", $file->name, $name);
            $fileExts[] = array($name[0], strtolower($ext[1]));
        }

        $image = ['jpg', 'jpeg', 'png', 'bmp', 'gif'];
        $video = ['mp4', 'flv', 'wmv', '3gp'];
        $audio = ['mp3', 'm4a', 'm4p', 'ogg', 'wav'];
        $word = ['doc', 'docx'];
        $excel = ['xls', 'xlsx'];
        $ppt = ['ppt', 'pptx'];
        $pdf = ['pdf'];


        $context = array
        (
            'documentSpace' => $documentSpace,
            'documents' => $documents,
            'fileExts' => $fileExts,
            'image' => $image,
            'video' => $video,
            'audio' => $audio,
            'word' => $word,
            'excel' => $excel,
            'ppt' => $ppt,
            'pdf' => $pdf,
        );

        return view('documents.documents-index')->with($context);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $documentSpaceName = DocumentSpace::find($id)->title;
        $documentSpace = DocumentSpace::find($id);
        //delete all the documents within the the directory
        $documents = $documentSpace->documents;

        $userName = $documentSpace->faculty->user->name;
        $name = str_replace(' ', '_', strtolower($userName));

        /*
        foreach ($documents as $document)
        {
            Storage::delete('/public/' . $name . '/documents/' . $documentSpaceName . '/' . $document->name);
            $document->delete();
        }
        */
        Storage::deleteDirectory('/public/' . $name . '/documents/' . $documentSpaceName);
        $documentSpace->documents()->delete();
        $documentSpace->delete();
        return redirect()->back()->with('warning', 'Folder ' . $documentSpaceName . ' deleted');
    }
}
