<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'title' => 'High Vision Camera',
                'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
                'image' => asset('images/products/p1.jpg'),
                'images' => json_encode([asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg')]),

                'price' => 89.00,
                'has_stock' => true,
                'stock_quantity' => 10,
                'category_ids' => [3],
                'brand_ids' => [1],
                'tag_ids' => [1],
            ],
            [
                'title' => 'Full HD WiFi Camera',
                'description' => 'The Full HD WiFi Camera provides high-definition video with seamless wireless connectivity. It is designed to offer clear and detailed surveillance footage, making it ideal for home or office security. The camera’s advanced features include motion detection, real-time alerts, and easy integration with smart home systems.',
                'image' => asset('images/products/p1.jpg'),
                'images' => json_encode([asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg')]),

                'price' => 100,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [2],
                'tag_ids' => [1],
            ],
            [
                'title' => 'Smart Door Lock',
                'description' => 'The Smart Door Lock offers advanced security features with easy installation and smartphone control. This innovative lock enhances the safety of your home by providing keyless entry and real-time access management.',
                'image' => asset('images/products/p1.jpg'),
                'images' => json_encode([asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg')]),

                'price' => 70,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [4],
                'tag_ids' => [3],
            ],
            [
                //4
                'title' => 'Ultra HDR Camera',
                "description" => "The Ultra HDR Camera delivers stunning high dynamic range video for detailed surveillance. This camera is designed to capture the finest details in both bright and dark areas, providing exceptional clarity and depth. Ideal for both indoor and outdoor use, it ensures your property is monitored with the highest quality video. Features include motion detection, real-time alerts, and seamless integration with smart home systems. Its robust build and reliable performance make it a top choice for any security setup.",
                'image' => asset('images/products/p1.jpg'),
                'images' => json_encode([asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg')]),

                'price' => 120,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [2],
                'tag_ids' => [1],
            ],
            [
                //5
                'title' => 'Wireless Camera',
                "description" => "The Wireless Camera provides seamless connectivity and high-definition video recording. This camera is perfect for those who need a versatile and portable security solution. With its wireless capabilities, you can easily place it anywhere without worrying about cable management. It offers clear video quality, motion detection, and real-time notifications. The camera is also compatible with various smart home systems, making it a convenient addition to your security setup.",
                'image' => asset('images/products/p1.jpg'),
                'images' => json_encode([asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg'), asset('images/products/p1.jpg')]),

                'price' => 89,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [1],
                'tag_ids' => [2],
            ],
            [
                //6
                'title' => 'Vision Pro Cameraa',
                "description" => "The Vision Pro Camera by Samsung offers unparalleled video quality and advanced features, making it an excellent choice for professional surveillance and monitoring. This camera provides stunning high-definition video and includes advanced functionalities such as enhanced zoom capabilities, intelligent motion detection, and superior night vision. Its robust design ensures durability and reliability in various environments, while its compatibility with smart home systems allows for seamless integration. Ideal for both indoor and outdoor use, the Vision Pro Camera is perfect for those seeking top-tier performance in their security setup.",
                'image' => 'images/products/p3.jpg',
                'images' => json_encode(['images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg']),
                'price' => 140,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [6],
                'tag_ids' => [1, 2],
            ],
            [
                //7
                'title' => 'Wide Angle Smart Camera',
                "description" => "The Wide Angle Smart Camera offers an expansive field of view with its advanced wide-angle lens, making it ideal for comprehensive surveillance and monitoring. This smart camera integrates seamlessly with various smart home systems, providing convenient features such as remote control, real-time alerts, and intelligent motion detection. With its sleek design and high-definition video recording capabilities, it ensures clear and detailed images, even in low-light conditions. The camera's wireless functionality allows for flexible placement and easy setup, providing a versatile security solution for any home or business.",
                'image' => 'images/products/p3.jpg',
                'images' => json_encode(['images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg']),
                'price' => 90,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [1],
                'tag_ids' => [1, 2],
            ],
            [
                //8
                "title" => "Dome Camera",
                "description" => "The Dome Camera combines sleek design with cutting-edge technology to deliver exceptional video quality and 360-degree coverage. Ideal for comprehensive surveillance, this camera features a compact, unobtrusive dome design that fits seamlessly into various settings. It offers high-definition video recording and advanced features such as motion detection and night vision. The camera's 360-degree rotation capability ensures complete coverage of your space, making it a valuable tool for maintaining security and monitoring activity. With its easy installation and integration with smart home systems, the Dome Camera provides both functionality and convenience.",
                'image' => 'images/products/p3.jpg',
                'images' => json_encode(['images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg']),
                'price' => 89,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [4],
                'tag_ids' => [1, 3],
            ],
            [
                //9
                "title" => "Wireless Security Camera",
                "description" => "The Wireless Security Camera from HK Vision provides dependable performance with its wireless connectivity and high-definition recording. This camera is designed to offer flexible placement options and easy installation, making it a convenient choice for both residential and commercial security needs. It delivers clear video quality and features reliable wireless transmission to ensure seamless monitoring. Although the camera is praised for its value and performance, occasional connectivity issues have been noted. Overall, it's a solid choice for those seeking a budget-friendly option with essential security features.",
                'image' => 'images/products/p3.jpg',
                'images' => json_encode(['images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg']),
                'price' => 75,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [2],
                'tag_ids' => [1, 3],
            ],
            [
                //10
                "title" => "Smart Desk Camera",
                "description" => "The Smart Desk Camera by D-Link provides an affordable solution for high-definition video needs, ideal for home and office environments. This camera is designed to deliver clear and crisp video quality, making it suitable for both casual and professional use. With its compact size and easy installation, the Smart Desk Camera fits seamlessly into any workspace. It offers reliable performance for basic surveillance and video conferencing, though it may not meet the needs of users requiring high-definition video for more demanding applications. Overall, it's a cost-effective choice for those seeking a simple and efficient camera solution.",
                'image' => 'images/products/p3.jpg',
                'images' => json_encode(['images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg']),
                'price' => 50,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [5],
                'tag_ids' => [3, 4],
            ],
            [
                //11
                "title" => "High Vision HD Camera",
                "description" => "The High Vision HD Camera from HK Vision provides exceptional video clarity and detail with its high-definition recording capabilities. Designed for superior performance, this camera features advanced technologies to ensure reliable and high-quality video surveillance. It offers easy installation and user-friendly controls, making it suitable for both residential and commercial security applications. The camera's robust design and dependable functionality make it a top choice for those seeking a high-performing security solution. However, users have noted that while the video quality is excellent, the accompanying app could benefit from improvements.",
                'image' => 'images/products/p3.jpg',
                'images' => json_encode(['images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg']),
                'price' => 130,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [2],
                'tag_ids' => [1, 5],
            ],
            [
                //12
                "title" => "Smart HDR WiFi Camera",
                "description" => "The Smart HDR WiFi Camera by D-Link provides high dynamic range video and seamless WiFi connectivity, offering a blend of advanced features and user-friendly performance. This camera is designed to capture vivid and detailed video with enhanced contrast and color accuracy, making it ideal for both security and everyday monitoring. The integrated WiFi capability ensures easy connectivity and remote access, allowing users to monitor their premises from anywhere. While the camera offers great video quality, some users have noted that the app could be improved for a more intuitive experience. Overall, it’s a reliable choice for those needing high-definition video with HDR support.",
                'image' => 'images/products/p3.jpg',
                'images' => json_encode(['images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg', 'images/products/p1.jpg']),
                'price' => 100,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [5],
                'tag_ids' => [1, 5],
            ],

        ];


        foreach ($products as $productData) {
            $product = Product::create([
                'title' => $productData['title'],
                'description' => $productData['description'],
                'image' => $productData['image'],
                'images' => $productData['images'],
                'price' => $productData['price'],
                'has_stock' => $productData['has_stock'],
                'stock_quantity' => $productData['stock_quantity'],
            ]);

            $product->categories()->attach($productData['category_ids']);
            $product->brands()->attach($productData['brand_ids']);
            $product->tags()->attach($productData['tag_ids']);
        }
    }
}