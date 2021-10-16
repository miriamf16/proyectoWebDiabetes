<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use App\Models\Post;
use App\Models\Survey;
use App\Models\Category;
use App\Models\CategoryPost;
use Carbon\Carbon;
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
            'user_type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Miriam',
            'email'=> 'miriam@gmail.com',
            'password' => Hash::make('miriam123'),
            'user_type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Crisantos',
            'email'=> 'crisantos@gmail.com',
            'password' => Hash::make('crisantos123'),
            'user_type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Fernando',
            'email'=> 'fernando@gmail.com',
            'password' => Hash::make('fernando123'),
            'user_type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Melissa',
            'email'=> 'melissa@gmail.com',
            'password' => Hash::make('melissa123'),
            'user_type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Araceli',
            'email'=> 'araceli@gmail.com',
            'password' => Hash::make('araceli123'),
            'user_type' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Prueba',
            'email'=> 'prueba@gmail.com',
            'password' => Hash::make('prueba123'),
            'user_type' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user_types')->insert([
            'name' => '',
            'nameES' => '',
            'descENG' => '',
            'descES' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('user_types')->insert([
            'name' => '',
            'nameES' => '',
            'descENG' => '',
            'descES' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        DB::table('user_types')->insert([
            'name' => '',
            'nameES' => '',
            'descENG' => '',
            'descES' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('categories')->insert([
            'ES_name' => 'participantes',
            'EN_name' => 'participants',
            'slug' => 'participants',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'colaboradores',
            'EN_name' => 'collaborators',
            'slug' => 'collab',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'productos',
            'EN_name' => 'products',
            'slug' => 'product',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'articulos',
            'EN_name' => 'articles',
            'slug' => 'articles',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'noticias',
            'EN_name' => 'news',
            'slug' => 'news',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'foros',
            'EN_name' => 'forums',
            'slug' => 'foros',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categories')->insert([
            'ES_name' => 'cursos',
            'EN_name' => 'courses',
            'slug' => 'courses',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Post::factory(15)->create();
        CategoryPost::factory(20)->create();
        Survey::factory(10)->create();
    }
}
