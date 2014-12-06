<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_framework extends Model {

    public $table = 'users_frameworks';

    protected $fillable = [];

    public function user(){                                 //Each record of level achieved belongs to a user
        return $this->belongsTo('App\User', 'user_id');
    }

    public function framework(){                            //Each record belongs to a framwork
        return $this->belongsTo(('App\Framework', 'framework_id');
    }
}
