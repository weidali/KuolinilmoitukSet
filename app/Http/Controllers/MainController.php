<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;


class MainController extends Controller
{
	public function index() {
		$templates = Template::get();
		return view('index', compact('templates'));
	}

	public function template($code) {
		$template = Template::where('code', $code)->first();
		return view('template', compact('template'));
	}
    
}
