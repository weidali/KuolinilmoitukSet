<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Lead;

class OrderIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $leadId = session('leadId');
        // dd($leadId);
        if (!is_null($leadId)) {
            $lead = Lead::findOrFail($leadId);
            // dd(!is_null($leadId));
            if (is_null($lead->order_id)) {
                session()->flash('warning', 'Has not information on step 3');
                return redirect()->route('index');
            }

        } else {
            return redirect()->route('index');
        }
        return $next($request);
    }
}
