<?php

namespace Database\Seeders;

use App\Models\AccountModel;
use App\Models\MentorModel;
use App\Models\OrderModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //CREATE MENTOR
        $user = User::create([
            'name' => 'RagaBimaJatiRaksa532',
            'email' => 'ragabima93545g@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345'),
            'type' => 1,
        ]);

        $account = AccountModel::create([
            'first_name' => 'Raga',
            'last_name' => 'Bima',
            'gender' => 1,
            'birthday' => date('Y-m-d', strtotime('2002-08-01')),
            'phone_number' => '',
            'whatsapp_number' => '',
            'user_id' => $user->id,
        ]);

        $mentor = MentorModel::create([
            'profesion' => 'UI Design',
            'address' => null,
            'linkedin_link' => null,
            'insta_link' => 'ragabimajatiraksa',
            'country_id' => null,
            'province_id' => null,
            'city_id' => null,
            'account_id' => $account->id,
        ]);

        //CREATE CUSTOMER
        $userCus = User::create([
            'name' => 'UserHM356',
            'email' => 'user@haimentor.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345'),
            'type' => 1,
        ]);

        $accountCus = AccountModel::create([
            'first_name' => 'User',
            'last_name' => 'HM',
            'gender' => 1,
            'birthday' => date('Y-m-d', strtotime('2002-08-01')),
            'phone_number' => '',
            'whatsapp_number' => '',
            'user_id' => $userCus->id,
        ]);

        OrderModel::create([
            'price' => 20000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        ]);

        OrderModel::create([
            'price' => 30000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(1),
        ]);

        OrderModel::create([
            'price' => 10000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(2),
        ]);

        OrderModel::create([
            'price' => 32000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(3),
        ]);


        OrderModel::create([
            'price' => 31000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(4),
        ]);


        OrderModel::create([
            'price' => 20000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(5),
        ]);


        OrderModel::create([
            'price' => 10000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(6),
        ]);


        OrderModel::create([
            'price' => 40000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(7),
        ]);


        OrderModel::create([
            'price' => 10000,
            'account_id' => $accountCus->id,
            'mentor_id' => $mentor->id,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta')->subDays(8),
        ]);
    }
}
