<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainModel;

class Options extends Model
{
    //use HasFactory;

    protected $table = "core_options";
    protected $fillable = ['soptiontype', 'name', 'status'];
}
