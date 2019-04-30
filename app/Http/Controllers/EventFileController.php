<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventFile;
class EventFileController extends Controller
{
    public function desc($id)
    {
    	return EventFile::where('event_id',$id)->first();
    }

    public function download_update($id)
    {
    	$object  = EventFile::where('event_id',$id);
    	$event   = $object->first();
    	$number  = $event->downloaded_count + 1;
    	$sending = $object->update(['downloaded_count'=>$number]);

    	if ($sending) {
    		return ['status'=>'success'];
    	}else{
    		return ['status'=>'error'];
    	}
    }

    public function download_update_web($id)
    {
        $object  = EventFile::where('event_id',$id);
        $event   = $object->first();
        $number  = $event->downloaded_count + 1;
        $sending = $object->update(['downloaded_count'=>$number]);

        return response()->download(public_path('files/').$event->file_name);
    }
}
