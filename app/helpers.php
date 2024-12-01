<?php

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

function getHourlyGreeting() {
    // Ensure the time is in the correct timezone
    $currentHour = Carbon::now('Asia/Jakarta')->hour;

    // Set random greetings for different times of day
    $greetings = [
        'morning' => [
            "Selamat Pagi, Admin!",
            "Semangat pagi, Admin!",
            "Hari baru, semangat baru, Admin!",
            "Selamat menikmati sarapan, Admin!",
            "Pagi cerah untuk awal yang baik, Admin!",
        ],
        'afternoon' => [
            "Selamat siang, Admin!",
            "Tetap semangat di siang hari, Admin!",
            "Jangan lupa makan siang, Admin!",
            "Siang yang produktif, Admin!",
            "Istirahat sejenak untuk energi, Admin!",
        ],
        'evening' => [
            "Selamat sore, Admin!",
            "Sore yang indah, bukan begitu, Admin?",
            "Waktunya bersantai, Admin!",
            "Nikmati waktu sore, Admin!",
            "Segarkan pikiran di sore ini, Admin!",
        ],
        'night' => [
            "Selamat malam, Admin!",
            "Istirahat yang cukup ya, Admin!",
            "Malam ini penuh inspirasi, Admin!",
            "Jangan lupa bersiap untuk esok, Admin!",
            "Malam yang tenang untuk relaksasi, Admin!",
        ],
        'late_night' => [
            "Selamat tidur, Admin!",
            "Waktunya istirahat, Admin!",
            "Semoga mimpi indah, Admin!",
            "Tidur yang nyenyak dan sehat, Admin!",
            "Waktunya recharge energi, Admin!",
        ],
    ];

    // Determine the appropriate greeting
    if ($currentHour >= 5 && $currentHour < 12) {
        $timeSlot = 'morning';
    } elseif ($currentHour >= 12 && $currentHour < 16) {
        $timeSlot = 'afternoon';
    } elseif ($currentHour >= 16 && $currentHour < 19) {
        $timeSlot = 'evening';
    } elseif ($currentHour >= 19 && $currentHour < 24) {
        $timeSlot = 'night';
    } else {
        $timeSlot = 'late_night';
    }

    // Cache the greeting and select a random one from the slot
    return Cache::remember('hourly_greeting', 3600, function () use ($greetings, $timeSlot) {
        $selectedGreeting = $greetings[$timeSlot];
        return $selectedGreeting[array_rand($selectedGreeting)];
    });
}
