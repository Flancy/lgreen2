<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Pricelist extends Model
{
	use Searchable;

    protected $table = 'pricelist';
    protected $fillable = ['id'];
}
