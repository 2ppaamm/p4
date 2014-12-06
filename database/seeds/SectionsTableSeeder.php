 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_section;
class SectionsTableSeeder extends Seeder {

	public function run()
	{
        $section = Course_section::create([
        ]);

	}

}
