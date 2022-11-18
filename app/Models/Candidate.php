<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;

class Candidate extends Model
{
    protected $table = "candidates";
    public $timestamps=false;
    use HasFactory;





}
