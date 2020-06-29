<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
     protected $table = 'producto';
     protected $fillable = [ 'Compania','Modelo','Anio','Version','Color'];
    
}
