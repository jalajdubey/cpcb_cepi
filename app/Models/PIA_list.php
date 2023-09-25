<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PIA_list extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="pia_user_lists";
}