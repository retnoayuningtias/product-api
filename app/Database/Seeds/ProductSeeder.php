<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('products')->truncate();
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'name' => 'Laptop ASUS Vivobook',
                'description' => '14 inch, Ryzen 5, 16GB RAM',
                'price' => 8500000,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'MacBook Air M1',
                'description' => 'Apple M1, 8GB RAM, 256GB SSD',
                'price' => 13500000,
                'stock' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Keyboard Mechanical',
                'description' => 'Switch Blue, RGB',
                'price' => 750000,
                'stock' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Mouse Wireless Logitech',
                'description' => 'Silent click, battery efficient',
                'price' => 250000,
                'stock' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Monitor LG 24 inch',
                'description' => 'IPS Panel, Full HD',
                'price' => 2200000,
                'stock' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Headset Gaming',
                'description' => 'Surround sound, mic noise cancel',
                'price' => 650000,
                'stock' => 18,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'External SSD 1TB',
                'description' => 'USB-C, high speed',
                'price' => 1800000,
                'stock' => 15,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Webcam Full HD',
                'description' => '1080p, autofocus',
                'price' => 900000,
                'stock' => 9,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Powerbank 20000mAh',
                'description' => 'Fast charging',
                'price' => 450000,
                'stock' => 25,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Smartphone Samsung A54',
                'description' => '8GB RAM, 128GB Storage',
                'price' => 5200000,
                'stock' => 14,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Tablet iPad 10th Gen',
                'description' => '64GB WiFi',
                'price' => 6500000,
                'stock' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Router WiFi 6',
                'description' => 'Dual band, high speed',
                'price' => 1200000,
                'stock' => 11,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'USB Hub Type-C',
                'description' => 'HDMI, USB 3.0, SD Card',
                'price' => 350000,
                'stock' => 22,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
