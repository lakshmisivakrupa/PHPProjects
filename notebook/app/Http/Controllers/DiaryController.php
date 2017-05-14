<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function getIndex()
    {
    	return view('diary.index');
    }
}
