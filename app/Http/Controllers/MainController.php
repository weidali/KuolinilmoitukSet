<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\User;
use App\Models\Lead;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class MainController extends Controller
{
	public function index()
	{
		$templates = Template::get();

		$leadId = session('leadId');
		if ( is_null($leadId) ) {
            $lead = new Lead;
            $lead->saveOrFail();
            session(['leadId' => $lead->id]);
        } else {
        	
        	$lead = Lead::findOrFail($leadId);
        	$lead->status = 1;
        	$lead->saveOrFail();
        }
        // dump("leadId: ".$leadId);
        // dump(!empty($lead));
        // dump("lead - leadId: ".$lead->id);
        // dump("lead - templateId: ".$lead->template_id);
        // dump("lead - status: ".$lead->status);

		return view('index', compact('templates'));
	}

	public function invoice()
	{
		// return view('invoice');
		// $pdf = PDF::loadView('invoice',);
		// return $pdf->download('invoice.pdf');
		$customPaper = array(20,20,133,266);

		$pdf = PDF::loadView('template-1')->setPaper($customPaper)->setWarnings(false)->save('myfile.pdf');
		return $pdf->download('invoice.pdf');

	}
    
}
