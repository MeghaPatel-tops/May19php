<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function testMethod(){
        echo "test method called";
    }

    public function commanFunction(){
        $userrole='';
        return view('commanview',['userrole'=>$userrole]);
    }
}
