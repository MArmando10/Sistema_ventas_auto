<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
	   protected $table = 'vendedor';
     protected $fillable = [ 'Codigo','NombreV','ApellidoPV','ApellidoMV','Puesto'];
    
}
