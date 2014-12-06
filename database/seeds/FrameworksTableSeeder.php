 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Framework;
class FrameworksTableSeeder extends Seeder {

	public function run()
	{
        $subject = Framework::create([
            'framework' => 'Lexile',
            'description' => 'Measures reading speed, fluency, vocabulary and comprehension',
        ]);

        $subject = Framework::create([
            'framework' => 'Textile',
            'description' => 'Measures writing abilities'
        ]);

        $subject = Framework::create([
            'framework' => 'Vocile',
            'description' => 'Measures writing abilities'
        ]);

        $subject = Framework::create([
            'framework' => 'Math-Arith',
            'description' => 'Measures ability to count - basic arithmetic skills'
        ]);

        $subject = Framework::create([
            'framework' => 'Math-Alg',
            'description' => 'Measures algebra skills'
        ]);

        $subject = Framework::create([
            'framework' => 'Math-Mea',
            'description' => 'Measures understanding in measures'
        ]);

        $subject = Framework::create([
            'framework' => 'Math-Geo',
            'description' => 'Measures geometrical understanding and spatial awareness'
        ]);

        $subject = Framework::create([
            'framework' => 'Math-Cal',
            'description' => 'Measures calculus proficiency'
        ]);

        $subject = Framework::create([
            'framework' => 'Computile',
            'description' => 'Measures computing proficiency'
        ]);
    }

}