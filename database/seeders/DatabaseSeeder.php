<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\Career;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('admins')->insert([
                'name' => 'HungLamDev',
                'email' => 'hunglam.dev@gmail.com',
                'phone' => '0772190842',
                'password' => \Hash::make('123456789')
            ]);
        } catch (\Exception $exception) {
            Log::error("[seed Admin] " . $exception->getMessage());
        }
        $attributes = [
            Attribute::TYPE_EXPERIENCE => [
                'Chưa có kinh nghiệm', 'Dưới một năm ', '1 năm ', '2 năm', '3 năm', '4 năm', '5 năm', 'Trên 5 năm ',
            ],
            Attribute::TYPE_RANK => [
                'Mới tốt Nghiệp / thực tập ',
                'Nhân viên',
                'Trường nhóm ',
                'Trưởng phòng ',
                'Phó giám đốc',
                'Tổng giám đốc'
            ],
            Attribute::TYPE_FORM_OF_WORK => [
                'Toàn thơi gian cố định  ',
                'Bán thơi gian cố định  ',
                'Bán thơi gian tạm thời ',
                'Thực tập  ',
                'Theo hợp đồng tư vấn',
            ]
        ];

        foreach ($attributes as $key => $attribute) {
            foreach ($attribute as $item) {
                try {
                    dump($item);
                    Attribute::insert([
                        'a_name' => $item,
                        'a_slug' => Str::slug($item),
                        'a_type' => $key,
                        'created_at' => Carbon::now(),
                    ]);
                } catch (\exception  $exception) {
                }
            }
        }

        $careers = [
            'IT phân mềm',
            'IT phần cứng',
            'Bán Hàng',
            'Khách sạn - Nhà hàng',
            'Biên dịch ngoại ngữ',
            'tài chính văn phòng',
            'kế toán - kiểm toán ',
            'kỹ thuật',
            'Maeketing - PR'
        ];
        foreach ($careers as  $item) {
            try {
                Career::insert([
                    'c_name' => $item,
                    'c_slug' => Str::slug($item),
                    'created_at' => Carbon::now(),
                ]);
            } catch (\exception $exception) {
                dump($exception);
            }
        }
    }
    // \App\Models\Attribute::factory(10)->create();
}
