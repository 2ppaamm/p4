<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Note_type extends Model {

	protected $fillable = [];

    public function notes(){
        return $this->hasMany('App\Section_note', 'note_type_id');
    }
}
