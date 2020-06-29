<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class venta extends Model
{
     protected $table = 'venta';
     protected $fillable = ['vendedor','cliente','compania'];


public function vendedor(){	
	return $this->belongsTo('App\vendedor','NombreV','id');
}

public function cliente(){	
	return $this->belongsTo('App\cliente','NombreC','id');
}

public function producto(){	
	return $this->belongsTo('App\producto','Compania','id');
}

}
