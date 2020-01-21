<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Config extends Model
{
	use SoftDeletes, \OwenIt\Auditing\Auditable;
}
