<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Symbol;
use App\Models\Lead;
use App\Models\Template;

class OrderController extends Controller
{

	public function templateSelect($templateId)
	{
		dump("templateId: ".$templateId);

		$leadId = session('leadId');
		if ( is_null($leadId) ) {
			return redirect()->route('index');
		}
		$lead = Lead::findOrFail($leadId);

		dump("leadId: ".$leadId);
		$lead->status = "2";
		$lead->template_id = $templateId;
		$lead->saveOrFail();

		dump("lead - templateId: ".$lead->template_id);
		dump("lead - status: ".$lead->status);

		return redirect()->route('symbol');		
	}

	public function symbol()
	{
		$symbols = Symbol::get();

		$leadId = session('leadId');
		if ( is_null($leadId) ) {
			return redirect()->route('index');
		}
		$lead = Lead::findOrFail($leadId);

		// dump("lead - leadId: ".$lead->id);
		// dump("lead - templateId: ".$lead->template_id);
		// dump("lead - status: ".$lead->status);
		return view('symbol', compact('symbols'));
	}

	public function symbolSelect($symbolId)
	{
		$leadId = session('leadId');
		if ( is_null($leadId) ) {
			return redirect()->route('index');
		}
		$lead = Lead::findOrFail($leadId);

		$symbol = Symbol::findOrFail($symbolId);
		$lead->status = "3";
		$lead->symbol_id = $symbolId;
		$lead->saveOrFail();
		dump("lead - leadId: ".$lead->id);
		dump("lead - templateId: ".$lead->template_id);
		dump("lead - symbolId: ".$lead->symbol_id);
		dump("lead - status: ".$lead->status);
		return redirect()->route('order');

	}

	public function order()
	{
		$leadId = session('leadId');
		if ( is_null($leadId) ) {
			return redirect()->route('index');
		}
		// dump("leadId: ".$leadId);
		$lead = Lead::findOrFail($leadId);
		
		// dump("lead - leadId: ".$lead->id);
		// dump("lead - templateId: ".$lead->template_id);
		// dump("lead - symbolId: ".$lead->symbol_id);
		// dump("lead - status: ".$lead->status);
		return view('order');

	}

	public function orderAdd(OrderRequest $request)
	{
		$leadId = session('leadId');
		if ( is_null($leadId) ) {
			return redirect()->route('index');
		}
		//dump("leadId: ".$leadId);
		$lead = Lead::findOrFail($leadId);

		// dd($request->get('obituary_firstname_1'));
		if ($lead->order_id) {
			dump("lead allready exist: ".$lead->order_id);
			$order = Order::findOrFail($lead->order_id);
			dump("start id: ".$order->id);
		} else {
			dump("new lead");
			$order = new Order();
		}

		$order->obituary_language 		= $request->get('obituary_language');
		$order->obituary_top 			= $request->get('obituary_top');
		$order->obituary_occupation 	= $request->get('obituary_occupation');
		$order->obituary_firstname_1 	= $request->get('obituary_firstname_1');
		$order->obituary_firstname_2 	= $request->get('obituary_firstname_2');
		$order->obituary_firstname_3 	= $request->get('obituary_firstname_3');
		$order->obituary_firstname_call = $request->get('obituary_firstname_call');
		$order->obituary_nickname 		= $request->get('obituary_nickname');
		$order->obituary_lastname 		= $request->get('obituary_lastname');
		$order->obituary_former_lastnames = $request->get('obituary_former_lastnames');
		$order->obituary_nee 			= $request->get('obituary_nee');
		$order->obituary_birth_date 	= $request->get('obituary_birth_date');
		$order->obituary_birth_place    = $request->get('obituary_birth_place');
		$order->obituary_date_of_death  = $request->get('obituary_date_of_death');
		$order->obituary_place_of_death = $request->get('obituary_place_of_death');
		$order->saveOrFail();

		$lead->status = "4";
		$lead->order_id = $order->id;
		$lead->saveOrFail();

		// dump("end: ".$order);
		// dd("to preview");
		$orderId = session('orderId');
		if (is_null($orderId) ) {
			$orderId = Order::create()->id;
			$orderId = session(['orderId' => $orderId]);
		}
		// dump($orderId);
		return redirect()->route('preview');

	}

}
