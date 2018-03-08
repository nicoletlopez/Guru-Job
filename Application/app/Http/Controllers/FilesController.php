<?php

namespace App\Http\Controllers;

use App\File;
use App\Lecture;
use Illuminate\Http\Request;
use App\Http\Requests\LectureUpload;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    //for lecture files
    public function lectureUpload(LectureUpload $request,$lectureId){

        $lecture=Lecture::find($lectureId);
        $userName=$lecture->faculty->user->name;
        $name=str_replace(' ','_',strtolower($userName));
        $lectureName=str_replace(' ','_',strtolower($lecture->title));

        $fileNameWithExt=$request->file('file')->getClientOriginalName();
        $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $extension=$request->file('file')->getClientOriginalExtension();
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //$fileNameToStore=$filename.'.'.$extension;
        //$fileNameToStore=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('/public/'.$name.'/lectures/'.$lectureName,$fileNameToStore);
        $file=new File;
        $file->lecture_id=$lectureId;
        $file->name=$fileNameToStore;
        $file->desc="new file";
        $file->save();
        return back()->with('success','File uploaded.');
    }
    public function deleteLectureFile($lectureId,$id){
        $lecture=Lecture::find($lectureId);
        $userName=$lecture->faculty->user->name;
        $name=str_replace(' ','_',strtolower($userName));
        $lectureName=str_replace(' ','_',strtolower($lecture->title));

        $file=File::find($id);
        Storage::delete('/public/'.$name.'/lectures/'.$lectureName.'/'.$file->name);
        $file->delete();
        return back()->with('success','File Deleted.');
    }
    public function downloadLectureFile($lectureId,$fileName){

        $lecture=Lecture::find($lectureId);
        $userName=$lecture->faculty->user->name;
        $name=str_replace(' ','_',strtolower($userName));
        $lectureName=str_replace(' ','_',strtolower($lecture->title));
        $file=public_path().'/storage/'.$name.'/lectures/'.$lectureName.'/'.$fileName;
        $headers = array(
            'Content-Type: application/octet-stream',
        );
        return response()->download($file,$fileName,$headers);
    }

}
