<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use App\Models\Post;
use App\Models\Survey;
use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(5)->create();
        // UserType::factory(3)->create();
        // Post::factory(15)->create();
        // Category::factory(5)->create();
        // CategoryPost::factory(20)->create();
        // Survey::factory(10)->create();


        DB::table('users')->insert([
            'name' => 'Guillermo',
            'email'=> 'guillermo@gmail.com',
            'password' => Hash::make('guillermo123'),
            'user_type' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Miriam',
            'email'=> 'miriam@gmail.com',
            'password' => Hash::make('miriam123'),
            'user_type' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Crisantos',
            'email'=> 'crisantos@gmail.com',
            'password' => Hash::make('crisantos123'),
            'user_type' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Fernando',
            'email'=> 'fernando@gmail.com',
            'password' => Hash::make('fernando123'),
            'user_type' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Melissa',
            'email'=> 'melissa@gmail.com',
            'password' => Hash::make('melissa123'),
            'user_type' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Araceli',
            'email'=> 'araceli@gmail.com',
            'password' => Hash::make('araceli123'),
            'user_type' => 'admin'
        ]);

        DB::table('user_types')->insert([
            'name' => '',
            'nameES' => '',
            'descENG' => '',
            'descES' => '',

        ]);

        DB::table('user_types')->insert([
            'name' => '',
            'nameES' => '',
            'descENG' => '',
            'descES' => '',

        ]);

        DB::table('user_types')->insert([
            'name' => '',
            'nameES' => '',
            'descENG' => '',
            'descES' => '',

        ]);
        DB::table('categories')->insert([
            'ES_name' => 'participantes',
            'EN_name' => 'participants',
            'slug' => 'participants',
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'colaboradores',
            'EN_name' => 'collaborators',
            'slug' => 'collab',
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'productos',
            'EN_name' => 'products',
            'slug' => 'product',
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'articulos',
            'EN_name' => 'articles',
            'slug' => 'articles',
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'noticias',
            'EN_name' => 'news',
            'slug' => 'news',
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'foros',
            'EN_name' => 'forums',
            'slug' => 'foros',
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'cursos',
            'EN_name' => 'courses',
            'slug' => 'courses',
        ]);

        Post::factory(15)->create();
        CategoryPost::factory(20)->create();
        Survey::factory(10)->create();
    }
}
