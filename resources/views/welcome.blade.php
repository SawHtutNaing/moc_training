@extends('branding.layouts')

@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
  .swiper-slide {
    width: 100px; /* Smaller width for collapsed images */
    height: 300px; /* Smaller height for collapsed images */
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:30px;
    transition: transform 0.3s ease-in-out;

  }

  .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 1rem;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }

  .swiper-slide-active {
    margin-top: 0px; /* Reset margin for active slide */
   width: 170px; /* Smaller width for collapsed images */
    height: 350px; /* Smaller height for collapsed images */
    display: flex;
    flex-direction: column;
    justify-content: center;

    align-items: stretch; /* Scale up the active (middle)our slide */
    z-index: 10; /* Bring the active slide to the front */
  }

  .swiper-slide-active img {
  
    transition: transform 0.5s ease;
  }

  @media (min-width: 768px) {
  .swiper-slide {
    width: 100px;
    height: 300px; /* Smaller height for collapsed images */
    
    transition: transform 0.3s ease-in-out;
  }

  .swiper-slide-active {
    margin-top: 0px; /* Reset margin for active slide */
   width: 800px; /* Smaller width for collapsed images */
    height: 350px; /* Smaller height for collapsed images */
    display: flex;
    flex-direction: column;
    justify-content: center;

    align-items: stretch; /* Scale up the active (middle)our slide */
    z-index: 10; /* Bring the active slide to the front */
  }
}
</style>

<!-- Swiper Initialization -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".myNewSwiper", {
      slidesPerView: 5, // Show 5 slides at a time
      spaceBetween: 0,
      centeredSlides: true, // Center the active slide
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
     
    });
  });
</script>


<script>
  const text = "Welcome to the Ministry of Commerce";
  let index = 0;

  function typeEffect() {
    if (index < text.length) {
      document.getElementById("typing-text").innerHTML += text.charAt(index);
      index++;
      setTimeout(typeEffect, 100); // typing speed (in ms)
    }
  }

  // Start typing when the page loads
  window.onload = typeEffect;
</script>

<!-- Enhanced Hero Section -->
<section  class="relative h-[500px] md:h-[600px] overflow-hidden flex items-center justify-center bg-gray-700">
    <div data-aos="fade-right">
<img src="{{ asset('images/main.png') }}" alt="Office" class="absolute inset-0 w-full h-full object-cover filter  scale-105 transition-transform duration-10000 hover:scale-110">
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/40"></div>
    <div data-aos="fade-right" class="relative z-10 text-center px-4 text-white max-w-4xl mx-auto animate-fadeIn" style="animation-delay: 0.2s;">
       <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">
  <span id="typing-text"></span>
</h1>

        <p class="mt-4 text-lg md:text-xl max-w-2xl mx-auto text-gray-100">Empowering businesses and fostering growth in Myanmar</p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="#services" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-lg font-medium transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1">Our Services</a>
            <a href="#contact" class="px-8 py-3 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white border border-white/30 rounded-md text-lg font-medium transition-all duration-300 hover:shadow-lg">Contact Us</a>
        </div>
    </div>
    </div>
  </section>


<section id="galleries" class="py-20 bg-gray-50
">
<div data-aos="fade-right">
    <div class="container mx-auto text-center px-4">
       <h2 class="text-3xl md:text-4xl font-bold text-blue-700 mb-3">Our Gallery</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>


    <!-- Swiper Container -->
    <div class="swiper myNewSwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="{{ asset('images/main.png') }}" alt="Image 1" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/3.png') }}" alt="Image 2" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/4.png') }}" alt="Image 3" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/1.png') }}" alt="Image 4" />
        </div>
         <div class="swiper-slide">
          <img src="{{ asset('images/2.png') }}" alt="Image 4" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/5.png') }}" alt="Image 4" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/2.png') }}" alt="Image 4" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/3.png') }}" alt="Image 4" />
        </div>
      </div>

      <!-- Optional Controls -->
      <div class="swiper-pagination mt-6"></div>
    
    </div>
  </div>
</div>
</section>


<!-- Enhanced Services Section -->
<section id="services" class="py-20 bg-gray-50
">
<div data-aos="fade-right">
    <div class="container mx-auto text-center px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-700 mb-3">Our Services</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">Comprehensive solutions to support your business needs</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="service-card bg-white p-6 rounded-xl shadow-md overflow-hidden group">
                <div class="relative h-48 mb-6 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/2.png') }}" alt="Service 1" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Business Licensing</h3>
                <p class="text-gray-600">We provide comprehensive services for business registrations and licensing to help you establish your enterprise legally and efficiently.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">Learn more →</a>
            </div>

            <div class="service-card bg-white p-6 rounded-xl shadow-md overflow-hidden group">
                <div class="relative h-48 mb-6 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/3.png') }}" alt="Service 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Export & Import</h3>
                <p class="text-gray-600">Guiding businesses through import and export processes in Myanmar with expert advice on regulations, documentation, and compliance.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">Learn more →</a>
            </div>

            <div class="service-card bg-white p-6 rounded-xl shadow-md overflow-hidden group">
                <div class="relative h-48 mb-6 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/4.png') }}" alt="Service 3" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-blue-700">Regulations & Compliance</h3>
                <p class="text-gray-600">Ensuring that your business complies with all national regulations and standards to avoid penalties and operate smoothly.</p>
                <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">Learn more →</a>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Enhanced Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div data-aos="fade-right" class="container mx-auto px-4">
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
