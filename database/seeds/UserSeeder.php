<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $dat = [];

    public function __construct()
    {
        ini_set('auto_detect_line_endings',TRUE);
        echo(__DIR__);
        $handle = fopen(__DIR__.'\1.csv','r');
        while ( ($data = fgetcsv($handle) ) !== FALSE ) {
            array_push($this->dat, [
                'name' => $data[0],
                'username' => $data[8],
                'email' => $data[2],
                'password' => Hash::make($data[7]),
                'phone_number' => $data[6],
                'age' => $data[3],
                'child_name' => $data[1],
                'school' => $data[5],
                'grade' => $data[4]
            ]);
        }

        ini_set('auto_detect_line_endings',FALSE);
    }
    public function run()
    {
        DB::table('users')->insert(
            $this->dat
        );
    }
}
