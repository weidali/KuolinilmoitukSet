<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lead;

class Template extends Model {
    use HasFactory;

    public function leads() {
      return $this->hasMany(Lead::class);
    }
}
