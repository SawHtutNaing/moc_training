@extends('branding.layouts')
@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    .grid-item {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #03afff;
  border-radius: 4px;
  transition: transform 0.3s ease-in-out;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.grid-item:hover {
  filter: opacity(0.9);
  transform: scale(1.04);
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  grid-auto-rows: minmax(200px, auto);
  gap: 20px;
  padding: 20px;
  grid-auto-flow: dense;
}

@media (min-width: 600px) {
  .wide {
    grid-column: span 2;
  }

  .tall {
    grid-row: span 2;
  }
}
    </style>

<div class="grid-container">
    @forelse ($galleries as $gallery)
        <div
            class="grid-item {{ $loop->index % 5 == 0 ? 'tall' : ($loop->index % 3 == 0 ? 'wide' : '') }}"
            style="background-image: url('{{ asset('storage/' . $gallery->file_name) }}')"
        ></div>
    @empty
        <p class="text-gray-500 col-span-full">No gallery images found.</p>
    @endforelse
</div>

@endsection
