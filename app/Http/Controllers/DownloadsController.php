<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function download($folder,$file_name) {
        $file_path = public_path('docs/'.$folder.'/'.$file_name);
        return response()->download($file_path);
    }

    public function downloadDossier($file_name) {
        $file_path = public_path('docs/dossiers/'.config('app.platform').'/'.$file_name);
        return response()->download($file_path);
    }
}
