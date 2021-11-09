<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutstationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('outstations')->insert([
            'name' => 'ST Theresa',
        ]);
        DB::table('outstations')->insert([
            'name' => 'ST Peter And Paul',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Pedro Pio',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Don Bosco',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Lucio',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Micheals',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Bernadette',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Charles Wanga',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Mary',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Rita',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Filomina',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Agness',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Joseph',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Anne',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Fostina',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Martin',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Mariagorete',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Augustine',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Yacinta',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Jude',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Bakita',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Clara',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Jones',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Montfort',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Patricks',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Anthony',
        ]);
        DB::table('outstations')->insert([
            'name' => 'Holy Family',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Jeromy',
        ]);
        DB::table('outstations')->insert([
            'name' => 'St Franciss',
        ]);
    }
}
