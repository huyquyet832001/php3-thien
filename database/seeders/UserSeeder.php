<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "Nguyễn Văn Thắng",
                'email' => "thangnvph11827@fpt.edu.vn",
                'password' => '123456',
                'phone_number' => '0987654321',
                'address' => 'Dân Hòa',
                'gender' => '0',
                'role' => '0'
            ],
            [
                'name' => "Nguyễn Huy QUyết",
                'email' => "quyetnhph10607@fpt.edu.vn",
                'password' => '123456',
                'phone_number' => '0582805832',
                'address' => 'Cao Dương',
                'gender' => '0',
                'role' => '1'
            ]
        ];

        foreach ($data as $item) {
            $user = new User();
            $user->name = $item['name'];
            $user->email = $item['email'];
            $user->password = Hash::make($item['password']);
            $user->phone_number = $item['phone_number'];
            $user->address = $item['address'];
            $user->gender = $item['gender'];
            $user->role = $item['role'];
            $user->save();
        }
    }
}
