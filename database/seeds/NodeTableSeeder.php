 <?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Node;
class NodeTableSeeder extends Seeder {

    /* The nodes table lists all the different nodes within the acadware system.
    *  Access for each user to each node is defined in the access table
    */

	public function run()
	{
        $node = Node::create([
            'name' => 'Framework',
            'description' => 'Framework measurement of a subject'
        ]);

        $node = Node::create([
            'name' => 'Subject/Department',
            'description' => 'Subject Department within the school'
        ]);
        $node = Node::create([
            'name' => 'Course',
            'description' => 'Courses within each department'
        ]);
        $node = Node::create([
            'name' => 'Course Section',
            'description' => 'Lesson plan or Topic for each lesson'
        ]);
        $node = Node::create([
            'name' => 'Notes',
            'description' => 'Notes or materials in each course section'
        ]);
        $node = Node::create([
            'name' => 'Comments',
            'description' => 'Comments for nodes'
        ]);
    }
}
