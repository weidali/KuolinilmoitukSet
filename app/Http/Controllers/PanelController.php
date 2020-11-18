<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class PanelController extends Controller
{

    public function index() {
    	$leads = Lead::where('status', '>', 3)->get();
    	dump($leads);
        return view('panel', compact('leads'));
    }
}
