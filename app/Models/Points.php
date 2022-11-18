<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    use HasFactory;
    protected $table = "candidatepoints";
    protected $cast1 = ['positive'=>'array'];
    protected $cast2 = ['negitive'=>'array'];

}
