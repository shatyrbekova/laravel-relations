<?php

use App\Artcle;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArtclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $authorsList=[];

        for ($i = 0; $i < 50; $i++){
            $authorDetail = new Author();
            $authorDetail->name = $faker->words(2, true);
            $authorDetail->surname = $faker->words(2, true);
            $authorDetail->mail= $faker->safeEmail();
            $authorDetail->phone=$faker->phoneNumber();
            $authorDetail->save();
            $authorsList[]=$authorDetail->id;
        }
       
        for ($i = 0; $i < 50; $i++){
            $authorRandomKey = array_rand($authorsList, 1);
            $author = $authorsList[$authorRandomKey];

            $articleObject=new Artcle();
            $articleObject->title = $faker->sentence(1);
            $articleObject->content =$faker->text();
            $articleObject->author_id = $author;
            $articleObject-> save();

        }

    }
}
