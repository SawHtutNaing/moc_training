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
      <div
        class="grid-item tall"
        style="background-image: url('images/1.png')"
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/2.png');
        "
      ></div>

      <div
        class="grid-item wide"
        style="
          background-image: url('images/3.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/4.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/5.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/main.png');
        "
      ></div>
     <div
        class="grid-item"
        style="
          background-image: url('images/7.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/8.png');
        "
      ></div>
     <div
        class="grid-item"
        style="
          background-image: url('images/9.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/10.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/11.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/12.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/13.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/3.png');
        "
      ></div>
      <div
        class="grid-item"
        style="
          background-image: url('images/4.png');
        "
      ></div>
    </div>

@endsection
