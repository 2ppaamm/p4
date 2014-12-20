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
    /** Sorts and arrange the sections in the course
     * @params course_id
     */
    public static function arrangeSections($course_id){
        try {
            $course_sections = Course_section::where('course_id', '=', $course_id)
                ->select('id', 'lesson_number')->orderBy('lesson_number', 'asc')
                ->orderBy('updated_at', 'asc')->get();
            foreach ($course_sections as $position => $section) {
                $section->lesson_number = $position+1;
                $section->save();
            }
        }
        catch (\Exception $e) {
            return Redirect::back()->with('flash_message', 'Error in arranging sections');
        }
    }

}
