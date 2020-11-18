<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Symbol;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Barryvdh\DomPDF\Facade as PDF;

class PreviewController extends Controller
{
	public function preview()
	{
		// $symbols = Symbol::get();
		
		$leadId = session('leadId');
		// dd($leadId);
		if (!is_null($leadId)) {
			$lead = Lead::findOrFail($leadId);
			// dd(!is_null($leadId));

		} else {
			return redirect()->route('index');
		}

		return view('preview', ['lead' => $lead, 'order' => $lead->order]);
	}

	public function previewPDF()
	{

		$order = Order::findOrFail(5);
		$order->setRawAttributes(array_filter($order->getAttributes()));

		
		$customPaper = 'a4';
		$customPaper = array(0,0,370,680);
		$customPaper = 'a4';


		$pdf = PDF::loadView('template-1', compact('order'));
		// return $pdf->download('invoice.pdf');
		return $pdf->stream('tmp.pdf');

	}

	public function previewCreate($templateId)
	{

		$leadId = session('leadId');

		dump(isset($leadId));
		// $lead = Lead::create()->id;
		// dump(session()->flush());
		if ( is_null($leadId) ) {
			$lead = Lead::create()->id;
			session(['leadId' => $lead]);
		} else {
			$lead = Lead::find($leadId);
		}
		dump($leadId);
		$template = Template::find($templateId);
		dump($template->leads);

		dd($template);
		$template->leads()->save($template);
		return redirect()->route('preview');      

		// if( !$lead->template->contains($templateId) ) {
		//     $pivotRow = $lead->template()->where('template_id', $templateId)->first();
		//     $lead = Lead::find($leadId);
		//     //dd($lead);
		//     $lead->template()->detach();
		//     $lead->template()->attach($templateId);
		// }
		// // dump($lead->template);
		// // dump($lead);

		// return redirect()->route('preview');
	}

	public function previewRemoveTemplate($templateId)
	{
		$leadId = session('leadId');
		if ( is_null($leadId) ) {
			return redirect()->route('index');
		}
		$lead = Lead::find($leadId);
		$lead->template()->detach($templateId);

		return redirect()->route('index');
	}

	public function previewAdd(OrderRequest $request)
	{
		// dd($request->input());
		
		$order = new Order();
		$order->template_id 			= $request->input('template_id');
		$order->obituary_language 		= $request->input('obituary_language');
		$order->obituary_top 			= $request->input('obituary_top');
		$order->obituary_occupation 	= $request->input('obituary_occupation');
		$order->obituary_firstname_1 	= $request->input('obituary_firstname_1');
		$order->obituary_firstname_2 	= $request->input('obituary_firstname_2');
		$order->obituary_firstname_1 	= $request->input('obituary_firstname_3');
		$order->obituary_firstname_call = $request->input('obituary_firstname_call');
		$order->obituary_nickname 		= $request->input('obituary_nickname');
		$order->obituary_lastname 		= $request->input('obituary_lastname');
		$order->obituary_former_lastnames = $request->input('obituary_former_lastnames');
		$order->obituary_nee 			= $request->input('obituary_nee');
		$order->obituary_birth_date 	= $request->input('obituary_birth_date');
		$order->obituary_birth_place    = $request->input('obituary_birth_place');
		$order->obituary_date_of_death  = $request->input('obituary_date_of_death');
		$order->obituary_place_of_death = $request->input('obituary_place_of_death');

		$order->save()->with('success', 'Order was created!');

		// $orderId = session('orderId');
		// if( is_null($orderId) ) {
		// 	$orderId = Order::create()->auth()->id;
		// 	session(['orderId' => $orderId]);
		// }
		// dump($orderId);
	}
}
