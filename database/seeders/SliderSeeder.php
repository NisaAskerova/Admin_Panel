<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            [
                'title' => 'Your Safety and Comfort is Our First Priority',
                'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
                'image' => './portrait-male-security-guard-with-uniform 1.png',
                'heroImage' => './yellowLine.svg',
                'backImage' => 'slide1',
                'icon' => './leftIcon.svg',
            ],
            [
                'title' => 'Secure Your Future with Our Reliable Services',
                'description' => 'Our team is dedicated to providing exceptional service to ensure the safety and comfort of all our clients.',
                'image' => './portrait-male-security-guard-with-uniform 1.png',
                'heroImage' => './yellowLine.svg',
                'backImage' => 'slide2',
                'icon' => './leftIcon.svg',
            ],
            [
                'title' => 'Excellence in Safety for Your Peace of Mind',
                'description' => 'With years of experience, we prioritize security and comfort to protect what matters most to you.',
                'image' => './portrait-male-security-guard-with-uniform 1.png',
                'heroImage' => './yellowLine.svg',
                'backImage' => 'slide3',
                'icon' => './leftIcon.svg',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
