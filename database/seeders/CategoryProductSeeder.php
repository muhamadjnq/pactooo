<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Create Sample Dummy Users Array
      $products = [
          [
              'name'=>'اسپانسری 15 ثانیه گرید A',
              'title'=>'اسپانسری 15 ثانیه گرید A',
              'price'=>'1200000000.00',
              'link'=>'https://www.filimo.com/',
              'slug'=>'aspansry-15-thanyh-gryd-a',
              'image'=>'products/ntsPqwPtAClWYf6PYXpfR3vxbaYGVcdr3zzAMrlr.png',
              'description'=>'در ابتدای سریال ها و رئالیتی شو های پر طرفداری مثل زخم کاری و جوکر نمایش داده میشود و حدودا 4 میلیون بیننده دارد و تا زمانی ان فیلم ها دیده بشوند تبلیغات شما دیده خواهد شد'
          ],
      ];

      // Looping and Inserting Array's Users into User Table
      foreach($products as $product){
          Product::create($product);
      }
    }
}
