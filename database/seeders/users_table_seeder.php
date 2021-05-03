<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name="raquel";
        $user->email="raquel@gmail.com";
        $user->password=Hash::make('raquel123');
        $user->save();

        $user = new User();
        $user->name="sandra";
        $user->email="sandra@gmail.com";
        $user->password=Hash::make('sandra123');
        $user->save();
    }
}
