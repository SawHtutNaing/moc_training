@extends('branding.layouts')

@section('content')



<!-- Enhanced Hero Section -->
<section class="relative h-[500px] md:h-[600px] overflow-hidden flex items-center justify-center bg-gray-700">
    <img src="{{ asset('images/officeone.jfif') }}" alt="Office" class="absolute inset-0 w-full h-full object-cover filter blur-sm scale-105 transition-transform duration-10000 hover:scale-110">
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/40"></div>
    <div class="relative z-10 text-center px-4 text-white max-w-4xl mx-auto animate-fadeIn" style="animation-delay: 0.2s;">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">Welcome to the Ministry of Commerce</h1>
        <p class="mt-4 text-lg md:text-xl max-w-2xl mx-auto text-gray-100">Empowering businesses and fostering growth in Myanmar</p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="#services" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-lg font-medium transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1">Our Services</a>
            <a href="#contact" class="px-8 py-3 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white border border-white/30 rounded-md text-lg font-medium transition-all duration-300 hover:shadow-lg">Contact Us</a>
        </div>
    </div>
</section>

<!-- Enhanced Swiper Image Slider -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-700 mb-3">Our Gallery</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Explore our facilities and activities through our image gallery</p>
        </div>

        <div class="swiper mySwiper rounded-xl overflow-hidden shadow-lg">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('images/officeone.jfif') }}" alt="Slide 1" class="transition-transform duration-500"></div>
                <div class="swiper-slide"><img src="{{ asset('images/officetwo.jfif') }}" alt="Slide 2" class="transition-transform duration-500"></div>
                <div class="swiper-slide"><img src="{{ asset('images/officeone.jfif') }}" alt="Slide 3" class="transition-transform duration-500"></div>
                <div class="swiper-slide"><img src="{{ asset('images/officetwo.jfif') }}" alt="Slide 4" class="transition-transform duration-500"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Enhanced Services Section -->
<section id="services" class="py-20 bg-gray-50">
    <div class="container mx-auto text-center px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-700 mb-3">Our Services</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Comprehensive solutions to support your business needs</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="service-card bg-white p-6 rounded-xl shadow-md overflow-hidden group">
                <div class="relative h-48 mb-6 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/officeone.jfif') }}" alt="Service 1" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Business Licensing</h3>
                <p class="text-gray-600">We provide comprehensive services for business registrations and licensing to help you establish your enterprise legally and efficiently.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">Learn more →</a>
            </div>

            <div class="service-card bg-white p-6 rounded-xl shadow-md overflow-hidden group">
                <div class="relative h-48 mb-6 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/officetwo.jfif') }}" alt="Service 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Export & Import</h3>
                <p class="text-gray-600">Guiding businesses through import and export processes in Myanmar with expert advice on regulations, documentation, and compliance.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">Learn more →</a>
            </div>

            <div class="service-card bg-white p-6 rounded-xl shadow-md overflow-hidden group">
                <div class="relative h-48 mb-6 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/officeone.jfif') }}" alt="Service 3" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Regulations & Compliance</h3>
                <p class="text-gray-600">Ensuring that your business complies with all national regulations and standards to avoid penalties and operate smoothly.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">Learn more →</a>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-700 mb-3">Contact Us</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Get in touch with our team for any inquiries or assistance</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="bg-blue-50 p-8 rounded-xl shadow-md">
                <form class="space-y-5">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                        <input type="text" id="name" placeholder="Enter your full name" class="form-input w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Your Email</label>
                        <input type="email" id="email" placeholder="Enter your email address" class="form-input w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all duration-300">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your Message</label>
                        <textarea id="message" rows="5" placeholder="How can we help you?" class="form-input w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all duration-300"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg font-medium">Send Message</button>
                </form>
            </div>

            <div class="rounded-xl overflow-hidden shadow-lg h-[400px]">
                <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full"></iframe>
            </div>
        </div>
    </div>
</section>



@endsection
