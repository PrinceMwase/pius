<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('payment_types')->insert([
            'name' => 'Tithe'
        ]);
        DB::table('payment_types')->insert([
            'name' => 'Paper Sunday'
        ]);
        DB::table('payment_types')->insert([
            'name' => 'Sunday Offering'
        ]);
        DB::table('payment_types')->insert([
            'name' => 'Other'
        ]);
        
        
        
    }
}
