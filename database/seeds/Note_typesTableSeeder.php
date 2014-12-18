 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Note_type;
class Note_typesTableSeeder extends Seeder {

	public function run()
	{
        $note_type = \App\Note_type::create(array(
            'format' => 'Video',
            'description' => 'Video link to Youtube'
        ));

        $note_type = \App\Note_type::create(array(
            'format' => 'Text',
            'description' => 'Text Announcement'
        ));

        $note_type = Note_type::create(array(
            'format' => 'Slides',
            'description' => 'HTML slides'
        ));

        $note_type = Note_type::create(array(
            'format' => 'File',
            'description' => 'PDF/Word/Powerpoint or any file type'
        ));

        $note_type = Note_type::create(array(
            'format' => 'Link',
            'description' => 'Links to a Game or an App or anything'
        ));

        $note_type = Note_type::create(array(
            'format' => 'Assignment',
            'description' => 'Assignment that allows students to submit.'
        ));

        $note_type = Note_type::create(array(
            'format' => 'Assessment',
            'description' => 'System or teacher graded assessment'
        ));

        $note_type = Note_type::create(array(
            'format' => 'Questionaire',
            'description' => 'Ungraded questionaire'
        ));

        $note_type = Note_type::create(array(
            'format' => 'Diagnostic Test',
            'description' => 'Diagnostic test to determine level of student'
        ));

        $note_type = Note_type::create(array(
            'format' => 'Image',
            'description' => 'Image/Cartoon'
        ));

    }
}
