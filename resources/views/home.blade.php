<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ExpertSystem | Laravel</title>
    </head>
    <body>
        
        @extends('layouts.user')

        @section('banner')
        <div className="absolute inset-0 bg-black bg-opacity-50"></div>
            <section class="bg-[#004643] pt-44 pb-20">
                <div class="container mx-auto flex flex-col items-center justify-center p-6">
                    <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0">
                        <x-application-logo class="w-44 h-auto fill-current text-black" />
                    </div>
                    <div class="w-full md:w-1/2 text-center mt-12">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-[#fffffe]">
                            Temukan Jurusan Terbaik untuk Masa Depan Anda!
                        </h1>
                        <p class="mt-8 text-[#abd1c6] text-lg md:text-xl">
                            Kamu lagi bingung jurusan apa yang mau kamu ambil? Ayoo, eksplor minat dan bakat kamu, lalu temukan jurusan yang paling pas bareng sistem pakar ini!
                        </p>
                        <div class="mt-10">
                            <a href="#about" class="bg-[#f9bc60] hover:bg-[#abd1c6] text-black font-bold py-2 px-6 border-2 border-black rounded inline-block">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endsection

        @section('about') 
            <section class="bg-[#abd1c6] p-6 py-24" id="about">
                <div class="container mx-auto flex flex-col justify-center items-center px-4 py-10">
                    <div class="relative flex flex-col items-center justify-center mt-4 mb-10">
                        <h1 class="absolute text-6xl md:text-8xl font-extrabold text-[#004643] opacity-25 select-none">
                            About
                        </h1>
                        <h1 class="relative text-2xl md:text-4xl font-extrabold text-[#004643]">
                            About Us
                        </h1>
                    </div>
                    <div class="text-[#0f3433[">
                        <h1 class="text-2xl font-bold mb-4">Apa itu Expert System ?</h1>
                        <p class="text-justify">
                        Expert system (sistem pakar) adalah salah satu cabang kecerdasan buatan (AI) yang dirancang untuk meniru kemampuan pengambilan keputusan seorang ahli dalam suatu bidang tertentu. Sistem ini menggunakan basis pengetahuan (knowledge base) dan aturan logika (inference engine) untuk menganalisis data, memberikan solusi, atau memberikan rekomendasi berdasarkan masalah yang dihadapi.
                        </p>
                        <p class="text-justify">
                        Sistem pakar adalah program komputer yang meniru kemampuan pengambilan keputusan seorang ahli dalam bidang tertentu. Sistem ini memanfaatkan basis pengetahuan dan mesin inferensi untuk menganalisis data dan memberikan solusi atau rekomendasi.
                        </p>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:justify-between w-full mt-7 text-[#0f3433]">
                        <div class="md:w-1/2">
                            <h1 class="text-2xl font-bold mb-4">Komponen Utama Expert System:</h1>
                            <div class="mb-10">
                                <ul class="text-justify list-disc px-4">
                                    <li>Basis Pengetahuan (Knowledge Base)</li>
                                    <li>Mesin Inferensi (Inference Engine):</li>
                                    <li>Antarmuka Pengguna (User Interface):</li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <x-application-logo class="max-w-full h-[75px] fill-current text-white" />
                        </div>
                    </div>
                </div>
            </section>

            <div class="fixed bottom-6 left-6 z-50">
                <a href="https://wa.me/6281375839812" target="_blank" class="bg-green-500 text-white flex items-center justify-center p-4 rounded-full shadow-lg hover:bg-green-600 transform animate-bounce duration-1000">
                    <i class="fab fa-whatsapp text-3xl"></i>
                </a>
            </div>
        @endsection

    </body>
</html>