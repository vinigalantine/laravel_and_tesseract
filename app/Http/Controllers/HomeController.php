<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use thiagoalessio\TesseractOCR\TesseractOCR;

class HomeController extends Controller
{
    public function index(){
    	return view('home');
    }

    public function readImage(Request $request){
    	if ($request->file('image_to_read')){
    		$file = $request->file('image_to_read')->store('ocr_images', 'public');
    		if($file){
    			$read = (new TesseractOCR($request->file('image_to_read')))->run();
    			if ($read) {
    				return response()->json(['message' => 'Texto extraido com sucesso', 'text' => $read], 201); 
    			}
    		}
    	}
		
		return response()->json(['message' => 'Erro ao extrair texto.'], 500);
    }
}
