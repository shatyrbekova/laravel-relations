<?php

use App\Article;
use App\Author;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class ArtclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $pictureList=[
            'https://www.fiorerosalba.com/wp-content/uploads/2020/04/metodo-di-studio-Albert-Einstein.jpg',
            'https://citynews-today.stgy.ovh/~media/original-hi/21090044674890/einstein-2.jpg',
            'https://i.redd.it/5ghvzudsfp321.jpg',
            'https://primabergamo.it/media/2016/02/Dmitri-Mendeleev-1834%E2%80%931907-2.jpg',
            'https://copertine.hoepli.it/archivio/978/8820/9788820391768.jpg',
            'https://archivio.udite-udite.it/wp-content/uploads/2018/05/marx.jpg',



        ];

        //creiamo i tag, e ne agganciamo due ad ogni articolo
        $tagsList=[];
        for ($i = 0; $i < 20; $i++){
            $tag = new Tag();
            $tag->name=$faker->word(1,true);
            $tag->save();
            $tagsList[] =$tag->id;
        }


        $authorsList=[];


        for ($i = 0; $i < 20; $i++){
            $authorDetail = new Author();
            $authorDetail->name = $faker->firstName();
            $authorDetail->surname = $faker->lastName();
            $authorDetail->mail= $faker->safeEmail();
            $authorDetail->phone=$faker->phoneNumber();
            $randPictureList =array_rand($pictureList, 1);
            $picture=$pictureList[$randPictureList];
            $authorDetail->picture=$picture;
            $authorDetail->save();
            $authorsList[]=$authorDetail->id;
        }
       
        for ($i = 0; $i < 50; $i++){
            $authorRandomKey = array_rand($authorsList, 1);
            $author = $authorsList[$authorRandomKey];
        
            $articleObject=new Article();
            $articleObject->title = $faker->sentence(1);
            $articleObject->content =$faker->text();
            $articleObject->author_id = $author;
            $articleObject->picture= $faker->imageUrl(640, 480, 'books', true);

            //peschiamo due tags random
            $randomTagsKeys=array_rand($tagsList, 2);

            $tag1 =$tagsList[$randomTagsKeys[0]];//1 chiave estratta
            $tag2 =$tagsList[$randomTagsKeys[1]];//2 chiave estratta
            $articleObject-> save();//salviamo per poter avere l'id del articleObject(insert). salviamo prima di attach
            $articleObject->tag()->attach($tag1);
            $articleObject->tag()->attach($tag2);

           

        }
    

    }
}
