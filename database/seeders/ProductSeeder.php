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
                'image' => 'products/p1.png',
                'images' => [
                    'products/p1.png',
                    'products/p1.png',
                    'products/p1.png',
                    'products/p1.png',
                ],

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
                'image' => 'products/p2.png',
                'images' => [
                    'products/p2.png',
                    'products/p2.png',
                    'products/p2.png',
                    'products/p2.png',
                ],

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
                'image' => 'products/p3.png',
                'images' => [
                    'products/p3.png',
                    'products/p3.png',
                    'products/p3.png',
                    'products/p3.png',
                ],

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
                'image' => 'products/p4.png',
                'images' => [
                    'products/p4.png',
                    'products/p4.png',
                    'products/p4.png',
                    'products/p4.png',
                ],

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
                'image' => 'products/p5.png',
                'images' => [
                    'products/p5.png',
                    'products/p5.png',
                    'products/p5.png',
                    'products/p5.png',
                ],

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
                'image' => 'products/p6.png',
                'images' => [
                    'products/p6.png',
                    'products/p6.png',
                    'products/p6.png',
                    'products/p6.png',
                ],
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
                'image' => 'products/p7.png',
                'images' => [
                    'products/p7.png',
                    'products/p7.png',
                    'products/p7.png',
                    'products/p7.png',
                ],
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
                'image' => 'products/p8.png',
                'images' => [
                    'products/p8.png',
                    'products/p8.png',
                    'products/p8.png',
                    'products/p8.png',
                ],
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
                'image' => 'products/p9.png',
                'images' => [
                    'products/p9.png',
                    'products/p9.png',
                    'products/p9.png',
                    'products/p9.png',
                ],
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
                'image' => 'products/p10.png',
                'images' => [
                    'products/p10.png',
                    'products/p10.png',
                    'products/p10.png',
                    'products/p10.png',
                ],
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
                'image' => 'products/p11.png',
                'images' => [
                    'products/p11.png',
                    'products/p11.png',
                    'products/p11.png',
                    'products/p11.png',
                ],
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
                'image' => 'products/p12.jpg',
                'images' => [
                    'products/p12.jpg',
                    'products/p12.jpg',
                    'products/p12.jpg',
                    'products/p12.jpg',
                ],
                'price' => 100,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3],
                'brand_ids' => [5],
                'tag_ids' => [1, 5],
            ],
            [
                //13
                "title" => "Smart Lock",
                "description"=> "A smart lock that can be controlled via mobile app for easy access and security.",
                'image' => 'products/p13.jpg',
                'images' => [
                    'products/p13.jpg',
                    'products/p13.jpg',
                    'products/p13.jpg',
                    'products/p13.jpg',
                ],
                'price' => 250,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [1],
                'tag_ids' => [3],
            ],
            [
                //14
                "title" => "Smart Padlock",
                "description"=> "Portable smart padlock that offers keyless access with Bluetooth technology.",
                'image' => 'products/p14.jpg',
                'images' => [
                    'products/p14.jpg',
                    'products/p14.jpg',
                    'products/p14.jpg',
                    'products/p14.jpg',
                ],
                'price' => 120,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [1],
                'tag_ids' => [3, 5],
            ],
            [
                //15
                "title" => "CCTV Camera",
                "description"=> "High-definition CCTV camera with night vision and motion detection.",
                'image' => 'products/p15.jpeg',
                'images' => [
                    'products/p15.jpeg',
                    'products/p15.jpeg',
                    'products/p15.jpeg',
                    'products/p15.jpeg',
                ],
                'price' => 200,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [2],
                'tag_ids' => [1, 3],
            ],
            [
                //16
                "title" => "IP Camera",
                "description"=> "High-definition IP camera with advanced motion detection and night vision.",
                'image' => 'products/p16.jpg',
                'images' => [
                    'products/p16.jpg',
                    'products/p16.jpg',
                    'products/p16.jpg',
                    'products/p16.jpg',
                ],
                'price' => 180,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [2],
                'tag_ids' => [1, 3],
            ],
            [
                //17
                "title" => "Smart Doorbell",
                "description"=> "Video doorbell with two-way audio and HD video stream.",
                'image' => 'products/p17.jpg',
                'images' => [
                    'products/p17.jpg',
                    'products/p17.jpg',
                    'products/p17.jpg',
                    'products/p17.jpg',
                ],
                'price' => 150,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [4],
                'tag_ids' => [3],
            ],
            [
                //18
                "title" => "Home Security Kit",
                "description"=> "Complete home security system with sensors and cameras.",
                'image' => 'products/p18.jpg',
                'images' => [
                    'products/p18.jpg',
                    'products/p18.jpg',
                    'products/p18.jpg',
                    'products/p18.jpg',
                ],
                'price' => 300,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [4],
                'tag_ids' => [3,5],
            ],
            [
                //19
                "title" => "Wi-Fi Router",
                "description"=> "Dual-band Wi-Fi router with high-speed internet support.",
                'image' => 'products/p19.webp',
                'images' => [
                    'products/p19.webp',
                    'products/p19.webp',
                    'products/p19.webp',
                    'products/p19.webp',
                ],
                'price' => 70,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [5],
                'tag_ids' => [2],
            ],
            [
                //20
                "title" => "igloohome Water Leakage Detector",
                "description"=> "Water leakage detector with smart alerts via mobile app, ideal for homes and offices.",
                'image' => 'products/p20.webp',
                'images' => [
                    'products/p20.webp',
                    'products/p20.webp',
                    'products/p20.webp',
                    'products/p20.webp',
                ],
                'price' => 59,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [1],
                'tag_ids' => [2,5],
            ],
            [
                //21
                "title" => "HIK Vision Water Leak Detector",
                "description"=> "Reliable water leakage detector with high sensitivity and wireless connectivity.",
                'image' => 'products/p21.jpg',
                'images' => [
                    'products/p21.jpg',
                    'products/p21.jpg',
                    'products/p21.jpg',
                    'products/p21.jpg',
                ],
                'price' => 69.99,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [2],
                'tag_ids' => [5],
            ],
            [
                //22
                "title" => "Ezvir Smart Leakage Detector",
                "description"=> "Smart water leakage detector with app integration and real-time notifications.",
                'image' => 'products/p22.png',
                'images' => [
                    'products/p22.png',
                    'products/p22.png',
                    'products/p22.png',
                    'products/p22.png',
                ],
                'price' => 49.99,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [4],
                'tag_ids' => [3,4],
            ],
            [
                //23
                "title" => "D-Link Water Leak Sensor",
                "description"=> "Water leakage sensor with wireless connection and customizable alert settings.",
                'image' => 'products/p23.jpg',
                'images' => [
                    'products/p23.jpg',
                    'products/p23.jpg',
                    'products/p23.jpg',
                    'products/p23.jpg',
                ],
                'price' => 39,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [5],
                'tag_ids' => [4],
            ],
            [
                //24
                "title" => "Samsung Smart Leakage Detector",
                "description"=> "Advanced smart water leakage detector with app integration and emergency alerts.",
                'image' => 'products/p24.jpeg',
                'images' => [
                    'products/p24.jpeg',
                    'products/p24.jpeg',
                    'products/p24.jpeg',
                    'products/p24.jpeg',
                ],
                'price' => 89,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [6],
                'tag_ids' => [4],
            ],
            [
                //25
                "title" => "CP Plus Security Camera System",
                "description"=> "High-definition security camera system with night vision and motion detection features.",
                'image' => 'products/p25.jpg',
                'images' => [
                    'products/p25.jpg',
                    'products/p25.jpg',
                    'products/p25.jpg',
                    'products/p25.jpg',
                ],
                'price' => 199,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [7],
                'tag_ids' => [1,3],
            ],
            [
                //26
                "title" => "igloohome Smart Water Leak Detector",
                "description"=> "Smart water leak detector with real-time alerts and mobile app integration.",
                'image' => 'products/p26.webp',
                'images' => [
                    'products/p26.webp',
                    'products/p26.webp',
                    'products/p26.webp',
                    'products/p26.webp',
                ],
                'price' => 56,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [1],
                'brand_ids' => [1],
                'tag_ids' => [3,4],
            ],
            [
                //27
                "title" => "D-Link DCS-8600LH Outdoor Camera",
                "description"=> "The D-Link DCS-8600LH is an outdoor camera with full HD 1080p resolution, night vision, and weatherproof design. It includes motion detection and cloud storage options.",
                'image' => 'products/p27.jpg',
                'images' => [
                    'products/p27.jpg',
                    'products/p27.jpg',
                    'products/p27.jpg',
                    'products/p27.jpg',
                ],
                'price' => 139,
                'has_stock' => true,
                'stock_quantity' => 5,
                'category_ids' => [3,4],
                'brand_ids' => [1],
                'tag_ids' => [3,4],
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