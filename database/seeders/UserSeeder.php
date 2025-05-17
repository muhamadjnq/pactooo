<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Create Sample Dummy Users Array
      $users = [
          [
              'name'=>'Muhamadjavad Naghibi',
              'email'=>'muhamadj.nq@gmail.com',
              'password'=>'$2y$10$jQyzMG3jIImH5EyuSE42dOvLvygLhsdZFbgPDSzGAD7iACl8MjIo6',
              'role'=>'admin'
          ],
      ];

      // Looping and Inserting Array's Users into User Table
      foreach($users as $user){
          User::create($user);
      }
    }
}
