<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model {

	protected $fillable = [];

    public function subjects(){                         // a framework can be applied to many subjects
        return $this->hasMany('App\Subject','framework_id');
    }
}
