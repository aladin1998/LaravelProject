<?php

namespace App\Http\Controllers;
use App\Cour;

use Illuminate\Http\Request;

class deleteFileController extends Controller
{
    public function destroy($id)
    {
        $cour=Cour::find($id);
        $cour->delete();
  
        return redirect('rep/downloadFile/modules/'.session()->get('moduleID'));
                       
    }
}
