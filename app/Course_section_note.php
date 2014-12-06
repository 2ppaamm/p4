<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_section_note extends Model {

	protected $fillable = ['title', 'description', 'note_order','course_section_id', 'link', 'user_id', 'note_type_id', 'privacy'];

    public function note_type(){                            //the type of note
        return $this->belongsTo('App\Note_type', 'note_type_id');
    }

    public function course_section(){                              //each note belongs to a section
        return $this->belongsTo('App\Course_section', 'course_section_id');  //if got time, change this to belongsToMany, where one note can be shared across classes
    }

    public function creator(){                              //each note belongs to a user
        return $this->belongsTo('App\User', 'user_id');
    }
}
