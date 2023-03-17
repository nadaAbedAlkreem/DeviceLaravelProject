<?php

namespace App\Models;
use Illuminate\Http\Request;
use DataTables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Device ;


class Purchases extends Model
{
    use HasFactory;
    use SoftDeletes ; 
    protected $table  = "purchases" ; 
    public function product()
    {
      return $this->belongsTo('App\Models\Device', 'id_Devices');
    }
 }

   