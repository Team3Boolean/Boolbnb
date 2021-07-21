<?php


use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        Schema::disableForeignKeyConstraints();
        User::truncate();
        
        for($i = 0; $i < 10; $i++) {
            $newUser = new User();

            $newUser->name = $faker->firstName();
            $newUser->lastname = $faker->lastName();
            $newUser->slug = $faker->slug();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make($faker->password);
            
            $newUser->save();
        }
    }
}