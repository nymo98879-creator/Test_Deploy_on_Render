<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert(
         [
            [
                'title' => 'Gaming Laptop',
                'price' => 1299.99,
                'stock' => 10,
                'image' => 'uploads/gaming-laptop.jpg',
                'description' => 'High-performance laptop for gaming and heavy applications.',
            ],
            [
                'title' => 'Mechanical Keyboard',
                'price' => 89.99,
                'stock' => 25,
                'image' => 'uploads/mechanical-keyboard.jpg',
                'description' => 'RGB mechanical keyboard with responsive switches.',
            ],
            [
                'title' => 'Wireless Mouse',
                'price' => 29.99,
                'stock' => 50,
                'image' => 'uploads/wireless-mouse.jpg',
                'description' => 'Comfortable wireless mouse for everyday use.',
            ],
            [
                'title' => '27-inch Monitor',
                'price' => 249.99,
                'stock' => 15,
                'image' => 'uploads/monitor.jpg',
                'description' => 'Full HD monitor suitable for work, study, and entertainment.',
            ],
            [
                'title' => 'USB-C Hub',
                'price' => 39.99,
                'stock' => 30,
                'image' => 'uploads/usb-c-hub.jpg',
                'description' => 'Multi-port USB-C hub for laptops and desktop computers.',
            ],
            [
                'title' => 'Laptop Backpack',
                'price' => 45.00,
                'stock' => 20,
                'image' => 'uploads/laptop-backpack.jpg',
                'description' => 'Durable backpack designed to protect your laptop and accessories.',
            ],
            [
                'title' => 'External SSD 1TB',
                'price' => 99.99,
                'stock' => 18,
                'image' => 'uploads/external-ssd.jpg',
                'description' => 'Fast 1TB external SSD for storing and transferring files.',
            ],
            [
                'title' => 'Gaming Headset',
                'price' => 69.99,
                'stock' => 22,
                'image' => 'uploads/gaming-headset.jpg',
                'description' => 'Gaming headset with clear audio and built-in microphone.',
            ],
            [
                'title' => 'Webcam Full HD',
                'price' => 59.99,
                'stock' => 12,
                'image' => 'uploads/webcam.jpg',
                'description' => 'Full HD webcam for online meetings, classes, and streaming.',
            ],
            [
                'title' => 'Bluetooth Speaker',
                'price' => 49.99,
                'stock' => 35,
                'image' => 'uploads/bluetooth-speaker.jpg',
                'description' => 'Portable Bluetooth speaker with high-quality sound.',
            ],
        ]
        );
    }
}
