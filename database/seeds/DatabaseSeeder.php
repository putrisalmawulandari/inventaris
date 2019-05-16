<?php

use Illuminate\Database\Seeder;
use App\Level;
use App\Item;
use App\Room;
use App\Type;
use App\Employee;
use App\User;
use Faker\Factory;
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
        $faker = Factory::create('id_ID');

        Level::create(['name'=>'admin']);
        Level::create(['name'=>'operator']);
        Level::create(['name'=>'maintener']);

        User::create([
            'name'=>'administrator',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'level_id'=>1,
        ]);

        User::create([
            'name'=>'operator',
            'email'=>'operator@gmail.com',
            'password'=>Hash::make('operator123'),
            'level_id'=>2,
        ]);

        User::create([
            'name'=>'maintener',
            'email'=>'mt@gmail.com',
            'password'=>Hash::make('mt123'),
            'level_id'=>3,
        ]);

        for ($i=1; $i <= 10 ; $i++) { 
            Room::create([
                'name'=>'Room'.'-'.$i,
                'description'=>$faker->address,
            ]);

            Type::create([
                'name'=>'Type'.'-'.$i,
                'description'=>$faker->text,
            ]);

            Item::create([
                'name'=>'Computer and Keyboard'.'-'.$i,
                'description'=>$faker->text,
                'total'=>rand(10,100),
                'user_id'=>1,
                'room_id'=>$i,
                'type_id'=>$i,
                'registration_date'=>date("Y-m-d"),
            ]);

            Employee::create([
                'name'=>$faker->name,
                'address'=>$faker->address,
                'nip'=>'1160'.$i,
                'password'=>Hash::make('1160'.$i),
            ]);
        }
    }
}
