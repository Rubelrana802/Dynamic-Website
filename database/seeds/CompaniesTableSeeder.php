<?php

use Illuminate\Database\Seeder;
use App\Models\Settings\Company ;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `companies` (`id`, `title`, `company_name`, `email`, `mobile`,`phone`, `logo`, `address`, `website`) VALUES
            (1, 'US IT SOLUTION', 'US IT SOLUTION LLC', 'info@usitsolution.net', '+(880) 1968-293031', '1(405) 513-5172', 'logo.png', '34, Muktijoddha Sarani (Choto Bazar)
Mymensingh-2200', 'http://www.usitsolution.net')"
        );
    }
}
