<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentSpace;
use App\Http\Requests\DocumentUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$documents = Document::all();

        $documents = Document::all();

        $context =
            [
                'documents' => $documents
            ];

        return view('faculty.manage-documents')->with($context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('documents.document-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentUpload $request, $documentSpaceId)
    {
        //upload a file as a document
        $documentSpace = DocumentSpace::find($documentSpaceId);
        $userName = $documentSpace->faculty->user->name;
        $name = str_replace(' ','_',strtolower($userName));
        $documentSpaceName = str_replace(' ','_',strtolower($documentSpace->title));

        $fileNameWithExt = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        $path = $request->file('file')->storeAs('/public/'.$name.'/documents/'.
            $documentSpaceName,$fileNameToStore);

        $document = new Document;
        $document->document_space_id = $documentSpaceId;
        $document->name = $fileNameToStore;
        $document->desc = "New Document";
        $document->save();

        return back()->with('success','File Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$fileName)
    {
        //'show' as in download a file :P
        //$id should be the id of the document space
        $documentSpace=DocumentSpace::find($id);
        $userName=$documentSpace->faculty->user->name;
        $name=str_replace(' ','_',strtolower($userName));
        $documentSpaceName=str_replace(' ','_',strtolower($documentSpace->title));
        $file=public_path().'/storage/'.$name.'/documents/'.$documentSpaceName.'/'.$fileName;
        $headers = array(
            'Content-Type: application/octet-stream',
        );
        return response()->download($file,$fileName,$headers);
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
    public function destroy($documentSpaceId,$id)
    {
        $documentSpace=DocumentSpace::find($documentSpaceId);
        $userName = $documentSpace->faculty->user->name;
        $name = str_replace(' ','_',strtolower($userName));
        $documentSpaceName = str_replace(' ','_',strtolower($documentSpace->title));

        $document=Document::find($id);
        Storage::delete('/public/'.$name.'/documents/'.$documentSpaceName.'/'.$document->name);
        $document->delete();
        return back()->with('warning',preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',$document->name).' deleted');
    }
}
