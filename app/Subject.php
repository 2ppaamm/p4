<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Subject extends Model {

	protected $fillable = [];

    public function framework(){                                //Each subject has a framework
        return $this->belongsTo('App\Framework');
    }

    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function course_codes(){
        return $this->hasMany('App\Course_code');
    }

    /**
     * Retrieve the list of all subjects offered in the system
     *
     * @param void
     * @return $subject_list
     */

    public static function listing() {
        if (Cache::has('subject_list')) {
            $subject_list = Cache::get('subject_list');
        }
        else  {
            $subject_list = Subject::with('framework')->select('id','description','icon', 'framework_id')->get();
            Cache::put('subject_list', $subject_list, 3);
        }
        return $subject_list;
    }
}
