<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_section extends Model {

	protected $fillable = [];

    protected $table = "course_sections";

    public function course(){                               //every section belongs to a course
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function notes(){                                // many notes in every course_section
        return$this->hasMany('App\Course_section_note')->orderBy('note_order', 'asc');
    }
}
