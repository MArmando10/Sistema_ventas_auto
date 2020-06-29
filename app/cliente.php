<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
	  protected $table = 'cliente';
      protected $fillable = ['NombreC','ApellidoP','ApellidoM','Domi','Estado','Municipio','Telefono'];
}
