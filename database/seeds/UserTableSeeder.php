<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $item) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(8) . '@gmail.com',
                'address' => Str::random(20),
                'role_id' => Role::all()->random()->id
            ]);
        }
    }
}
