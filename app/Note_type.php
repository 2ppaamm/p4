<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class Note_type extends Model {

	protected $fillable = [];

    public function notes(){
        return $this->hasMany('App\Section_note', 'note_type_id');
    }

    /** Lists all the note_types in the system
     * @return list note types
     */
    public static function list_note_types(){
        try {
            $note_list = Cache::remember('note_list', 3, function () {
                return Note_type::lists('format', 'id');
            });
        }
        catch(exception $e){
            return Redirect::back()->with('flash_message', 'Error in retrieving list of note_types');
        }
        return $note_list;
    }
}
