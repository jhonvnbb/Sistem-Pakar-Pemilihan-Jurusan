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
            <section class="bg-[#eee] pt-52 pb-20">
                <div class="container mx-auto flex flex-col items-center justify-center p-6">
                    <div class="w-full md:w-1/2 flex justify-center mb-6 md:mb-0">
                        <x-application-logo class="w-44 h-auto fill-current text-black" />
                    </div>
                    <div class="w-full md:w-1/2 text-center mt-12">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                            Dare to Dream, Strive for Greatness
                        </h1>
                        <div class="mt-10">
                            <a href="#about" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endsection

        @section('about') 
            <section class="bg-gray-800 p-6 py-24" id="about">
                <div class="container mx-auto flex flex-col justify-center items-center px-4 py-10">
                    <div class="relative flex flex-col items-center justify-center mt-4 mb-10">
                        <h1 class="absolute text-6xl md:text-8xl font-extrabold text-gray-300 opacity-25 select-none">
                            About
                        </h1>
                        <h1 class="relative text-2xl md:text-4xl font-extrabold text-white">
                            About Us
                        </h1>
                    </div>
                    <div class="text-white">
                        <h1 class="text-2xl font-bold mb-4">Apa itu Expert System ?</h1>
                        <p class="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam tenetur reiciendis, pariatur aliquid saepe aliquam ipsa quod est fugiat ex nam sed dolorem magni quasi repellendus et harum consectetur quas commodi cum delectus officiis? Eos, eligendi. Id voluptas, voluptate, blanditiis laudantium eveniet odio enim libero nemo facere explicabo, aperiam accusantium!
                        </p>
                        <p class="text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, id voluptate. Veniam nesciunt excepturi ducimus ab, impedit maxime minima dignissimos laborum esse perspiciatis accusamus eveniet doloribus vel necessitatibus atque et nostrum mollitia. Nulla omnis perferendis provident esse earum blanditiis ad alias! Pariatur nemo sequi corrupti, quibusdam provident accusantium voluptatem molestias?
                        </p>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:justify-between w-full mt-7 text-white">
                        <div class="md:w-1/2">
                            <h1 class="text-2xl font-bold mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, dignissimos.</h1>
                            <div class="mb-10">
                                <ul class="text-justify list-disc px-4">
                                    <li>Lorem, ipsum.</li>
                                    <li>Lorem, ipsum.</li>
                                    <li>Lorem, ipsum dolor.</li>
                                    <li>Lorem, ipsum dolor.</li>
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
