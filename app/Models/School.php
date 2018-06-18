<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
    	'tel1','tel2','street','state','city','number','district','name','cnpj','entity'
    ];

}
