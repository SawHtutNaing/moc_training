@extends('branding.layouts')
@section('content')

<!-- Page Header -->
<section class="relative py-16 bg-gradient-to-r from-blue-800 to-blue-600">
    <div class="absolute inset-0 overflow-hidden">
        <svg class="absolute left-0 bottom-0 h-full w-full text-white opacity-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="currentColor" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">Our Teachers</h1>
            <p class="text-lg md:text-xl text-blue-100">Explore our comprehensive range of courses designed to enhance your skills and knowledge in various domains of commerce and business.</p>
        </div>
    </div>
</section>


  <!-- Hero/Profile Section -->
  <section class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white shadow-lg rounded-2xl flex flex-col md:flex-row p-6 md:p-10 gap-8">
      
      <!-- Thumbnail -->
      <div class="flex-shrink-0">
        <img class="w-40 h-40 md:w-48 md:h-48 rounded-full object-cover border-4 border-blue-500" src="https://i.pravatar.cc/300" alt="Teacher Avatar">
      </div>

      <!-- Teacher Info -->
      <div class="flex-grow">
        <h1 class="text-3xl font-bold text-gray-800">Mr. John Doe</h1>
        <p class="text-gray-600 text-lg mt-1">Senior Math Teacher | 10+ Years Experience</p>
        <p class="mt-4 text-gray-700">Passionate about helping students master mathematics through engaging techniques and real-world applications. Specializes in Algebra, Calculus, and SAT prep.</p>

        <!-- Stats -->
        <div class="flex gap-6 mt-6 text-center">
          <div>
            <p class="text-xl font-semibold text-blue-600">20</p>
            <p class="text-gray-500 text-sm">Courses</p>
          </div>
          <div>
            <p class="text-xl font-semibold text-blue-600">4.9</p>
            <p class="text-gray-500 text-sm">Rating</p>
          </div>
          <div>
            <p class="text-xl font-semibold text-blue-600">1.2k</p>
            <p class="text-gray-500 text-sm">Students</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Courses/Related Cards Section -->
  <section class="max-w-6xl mx-auto mt-12 px-4">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Courses by Mr. John Doe</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Course Card -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
         <img class="w-full h-40 object-cover" src="{{asset('images/3.png')}}" alt="Course Image">
        <div class="p-4">
          <h3 class="text-xl font-bold text-gray-800">Algebra Fundamentals</h3>
          <p class="text-gray-600 mt-2 text-sm">Master the basics of algebra with real-world problems and step-by-step examples.</p>
          <div class="mt-4 flex justify-between text-sm text-gray-500">
            <span>⏱ 12h</span>
            <span>⭐ 4.8</span>
          </div>
        </div>
      </div>

      <!-- Course Card -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <img class="w-full h-40 object-cover" src="https://source.unsplash.com/400x200/?calculus,study" alt="Course Image">
        <div class="p-4">
          <h3 class="text-xl font-bold text-gray-800">Calculus Made Easy</h3>
          <p class="text-gray-600 mt-2 text-sm">An intuitive guide to derivatives, integrals, and real-world applications of calculus.</p>
          <div class="mt-4 flex justify-between text-sm text-gray-500">
            <span>⏱ 18h</span>
            <span>⭐ 5.0</span>
          </div>
        </div>
      </div>

      <!-- Course Card -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <img class="w-full h-40 object-cover" src="{{asset('images/2.png')}}" alt="Course Image">
        <div class="p-4">
          <h3 class="text-xl font-bold text-gray-800">SAT Math Prep</h3>
          <p class="text-gray-600 mt-2 text-sm">Get top scores with this targeted SAT math course with tips and practice tests.</p>
          <div class="mt-4 flex justify-between text-sm text-gray-500">
            <span>⏱ 10h</span>
            <span>⭐ 4.7</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer Section -->
  <section class="mt-16 bg-white py-6">
    <div class="max-w-6xl mx-auto px-4 text-center text-gray-500 text-sm">
      &copy; 2025 TeacherPlatform. All rights reserved.
    </div>
  </section>



@endsection