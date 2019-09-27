<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;


class HomeController extends Controller
{
    public function index(){
    	return view('home');
    }

    public function readImage(Request $request){
    	// Establishing logic base to run the OCR
		$read = (new TesseractOCR('text.png'))->run();
    }
}
