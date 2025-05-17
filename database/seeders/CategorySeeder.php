<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Create Sample Dummy Users Array
      $categorys = [
          [
              'name'=>'محیطی',
              'slug'=>'environmental',
              'description'=>'نمایش تبلیغات شما در فضاها و بیلبورد های سطح شهر'
          ],
          [
            'name'=>'فیلیمو',
            'slug'=>'filimo',
            'description'=>'تبلیغات اسپانسری در ابتدا و میان برنامه های فیلیمو'
          ],
          [
            'name'=>'آپارات',
            'slug'=>'aparat',
            'description'=>'تبلیغات بازدیدی و کلیکی در ایتدای ویدیو های آپارات'
          ],
          [
            'name'=>'ریپورتاژ',
            'slug'=>'reportazh',
            'description'=>'انتشار محتوای متنی در سایت های پربازدید'
          ],
          [
            'name'=>'گوگل',
            'slug'=>'google',
            'description'=>'تبلیغات بازدیدی و کلیکی در صفحه سرچ گوگل'
          ],
          [
            'name'=>'یوتیوب',
            'slug'=>'youtube',
            'description'=>'تبلیغات بازدیدی و کلیکی در ایتدای ویدیو های یوتیوب و کانال های یوتیوبری'
          ],
          [
            'name'=>'اینستاگرام',
            'slug'=>'insragram',
            'description'=>'تبلیغات بازدیدی اینستاگرام و پیج های میلیونی و اینفلوئنسری'
          ],
          [
            'name'=>'لینکدین',
            'slug'=>'linkedin',
            'description'=>'تبلیغات بازدیدی و تعرفه ای در لینکدین'
          ],
          [
            'name'=>'تلگرام',
            'slug'=>'telegram',
            'description'=>'تبلیغات بازدیدی و تعرفه ای در تلگرام'
          ]
      ];

      // Looping and Inserting Array's Users into User Table
      foreach($categorys as $category){
          Category::create($category);
      }
    }
}
