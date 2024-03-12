<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{


    public function info(){
        return view('test.info');
    
    }

    public function contacts(){
        return view('test.contacts');
    }

    public function diego(){
        return view('test.diego');
    }
    
    public function help(){
        return view('test.help');
    }
    
    public function welcome(){
        return view('welcome');
    }
    
    
    
}
