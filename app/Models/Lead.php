<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Template;
use App\Models\Symbol;
use App\Models\Order;

class Lead extends Model {
	use HasFactory;

	public function template() {
		return $this->belongsTo(Template::class);
	}

	// public function templates() {
	//     return $this->belongsToMany(Template::class)->withTimestamps();
	// }

	public function symbol() {
	  return $this->belongsTo(Symbol::class);
	}

	public function order() {
		return $this->belongsTo(Order::class);
	}
}
