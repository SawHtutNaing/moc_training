@extends('branding.layouts') 

@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Inter:wght@400;700&display=swap" rel="stylesheet">

<!-- Page Header -->
<section class="relative py-16 bg-gradient-to-r from-blue-800 to-blue-600">
    <div class="absolute inset-0 overflow-hidden">
        <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 390" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(0, 11.511, 223.445, 1)" offset="0%"></stop><stop stop-color="rgba(167.659, 182.451, 225.722, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,117L48,123.5C96,130,192,143,288,169C384,195,480,234,576,227.5C672,221,768,169,864,182C960,195,1056,273,1152,266.5C1248,260,1344,169,1440,117C1536,65,1632,52,1728,52C1824,52,1920,65,2016,58.5C2112,52,2208,26,2304,26C2400,26,2496,52,2592,97.5C2688,143,2784,208,2880,208C2976,208,3072,143,3168,136.5C3264,130,3360,182,3456,208C3552,234,3648,234,3744,221C3840,208,3936,182,4032,156C4128,130,4224,104,4320,97.5C4416,91,4512,104,4608,143C4704,182,4800,247,4896,240.5C4992,234,5088,156,5184,130C5280,104,5376,130,5472,130C5568,130,5664,104,5760,130C5856,156,5952,234,6048,279.5C6144,325,6240,338,6336,286C6432,234,6528,117,6624,97.5C6720,78,6816,156,6864,195L6912,234L6912,390L6864,390C6816,390,6720,390,6624,390C6528,390,6432,390,6336,390C6240,390,6144,390,6048,390C5952,390,5856,390,5760,390C5664,390,5568,390,5472,390C5376,390,5280,390,5184,390C5088,390,4992,390,4896,390C4800,390,4704,390,4608,390C4512,390,4416,390,4320,390C4224,390,4128,390,4032,390C3936,390,3840,390,3744,390C3648,390,3552,390,3456,390C3360,390,3264,390,3168,390C3072,390,2976,390,2880,390C2784,390,2688,390,2592,390C2496,390,2400,390,2304,390C2208,390,2112,390,2016,390C1920,390,1824,390,1728,390C1632,390,1536,390,1440,390C1344,390,1248,390,1152,390C1056,390,960,390,864,390C768,390,672,390,576,390C480,390,384,390,288,390C192,390,96,390,48,390L0,390Z"></path></svg>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center text-white max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">Our Teachers</h1>
            <p class="text-lg md:text-xl text-blue-100">Explore our comprehensive range of courses designed to enhance your skills and knowledge in various domains of commerce and business.</p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="px-6 py-12">
    <h2 class="text-center text-3xl font-bold mb-8">Our <span class="script-font text-purple-500">interactive</span> features</h2>
    <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
        <div class="bg-purple-100 p-6 rounded-2xl text-center">
            <h3 class="text-xl font-semibold mb-2">Fun Quiz</h3>
            <p>Boost understanding with short quizzes.</p>
        </div>
        <div class="bg-purple-400 text-white p-6 rounded-2xl text-center">
            <h3 class="text-xl font-semibold mb-2">Creative Activities</h3>
            <p>Enjoy crafting, drawing, and science fun!</p>
        </div>
        <div class="bg-yellow-300 p-6 rounded-2xl text-center">
            <h3 class="text-xl font-semibold mb-2">Learn with Games</h3>
            <p>Discover new skills while playing.</p>
        </div>
    </div>
</section>


<!-- <section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Meet Our <span class="text-purple-600 script-font">Instructors</span></h2>

        <div id="teachers-container">
            @include('partials.teacher-cards', ['teachers' => $teachers])
        </div>
    </div>
</section> -->

<!-- Teachers Section -->
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Meet Our <span class="text-purple-600 script-font">Instructors</span></h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teachers as $teacher)
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all text-center">
                    <div class="w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-purple-400 shadow mb-4">
                        <img src="{{ $teacher->profile_image ? asset('storage/' . $teacher->profile_image) : asset('images/default-profile.png') }}" class="object-cover w-full h-full" alt="{{ $teacher->name }}">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $teacher->name }}</h3>
                    <p class="text-purple-600 font-medium">{{ $teacher->position }}</p>
                    <p class="text-gray-500 text-sm mb-4">{{ $teacher->organization ?? '' }}</p>
                    <p class="text-gray-600 text-sm mb-2">📞 {{ $teacher->phone ?? 'N/A' }}</p>
                    <div class="flex justify-center gap-8 mt-4">
                        <div>
                            <p class="text-2xl font-bold text-purple-700 count-up" data-count="{{ $teacher->unique_batches }}">0</p>
                            <p class="text-xs text-gray-500">Batches</p>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-yellow-500 count-up" data-count="{{ $teacher->student_total }}">0</p>
                            <p class="text-xs text-gray-500">Students</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-10 flex justify-center">
            {{ $teachers->links() }}
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="py-12 px-6">
    <h2 class="text-center text-3xl font-bold mb-8">Read our <span class="script-font text-purple-500">blog</span></h2>
    <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <div class="bg-white shadow-md p-4 rounded-xl">
            <img src="{{asset('images/2.png')}}" class="mb-4 rounded-md" />
            <h3 class="font-semibold mb-2">Learning with Games?</h3>
            <p class="text-sm text-gray-600">Why it's fun and effective.</p>
        </div>
        <div class="bg-white shadow-md p-4 rounded-xl">
            <img src="{{asset('images/3.png')}}" class="mb-4 rounded-md" />
            <h3 class="font-semibold mb-2">10 Learning Game Ideas</h3>
            <p class="text-sm text-gray-600">Games to try with your learners.</p>
        </div>
        <div class="bg-white shadow-md p-4 rounded-xl">
            <img src="{{asset('images/3.png')}}" class="mb-4 rounded-md" />
            <h3 class="font-semibold mb-2">Fun Activities for Learners</h3>
            <p class="text-sm text-gray-600">Crafts, science and more.</p>
        </div>
    </div>
</section>

<script>
// Count-up animation
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.count-up').forEach(el => {
        const target = +el.getAttribute('data-count');
        let count = 0;
        const increment = Math.ceil(target / 50);
        function update() {
            count += increment;
            if (count >= target) {
                el.textContent = target;
            } else {
                el.textContent = count;
                requestAnimationFrame(update);
            }
        }
        update();
    });
});
</script>

@endsection
