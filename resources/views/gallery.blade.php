@extends('branding.layouts')

@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
    .gallery-container {
        padding: 2rem;
        max-width: 1280px;
        margin: 0 auto;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(var(--gallery-cols, 2), 1fr);
        gap: 1rem;
        transition: grid-template-columns 0.3s;
    }

    .grid-item {
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .grid-item img {
        width: 100%;
        height: 230px;
        object-fit: cover;
        display: block;
        transition: transform 0.4s;
    }

    .grid-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .grid-item:hover img {
        transform: scale(1.05);
    }

    .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        opacity: 0;
        transition: opacity 0.3s;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        text-align: center;
    }

    .grid-item:hover .overlay {
        opacity: 1;
    }

    .overlay h3 {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .overlay p {
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .search-combo {
        position: relative;
        width: 400px;
        margin: 0 auto 2rem;
    }

    .search-combo input {
        width: 100%;
        padding: 0.75rem 2.5rem 0.75rem 2.5rem;
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        font-size: 1rem;
    }

    .search-combo .fa-magnifying-glass {
        position: absolute;
        left: 0.8rem;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        cursor: pointer;
        user-select: none;
    }

    .search-combo .fa-chevron-down {
        position: absolute;
        right: 0.8rem;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        user-select: none;
    }

    .dropdown-list {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        border: 1px solid #ddd;
        border-top: none;
        background: white;
        max-height: 200px;
        overflow-y: auto;
        border-radius: 0 0 0.5rem 0.5rem;
        z-index: 100;
        display: none;
    }

    .dropdown-list div {
        padding: 0.75rem 1rem;
        cursor: pointer;
        transition: background 0.2s;
    }

    .dropdown-list div:hover {
        background: #f1f1f1;
    }

    .dropdown-list.active {
        display: block;
    }

    @media (max-width: 600px) {
        .search-combo {
            width: 100%;
        }
    }
</style>

<div class="gallery-container">
    <h1 class="text-3xl font-bold text-center text-primary mb-8">Gallery</h1>

    <!-- Grid View Buttons -->
    <div class="header" id="myHeader">
        <h2 class="text-xl mb-2">Image Grid</h2>
        <p class="mb-4">Click on the buttons to change the grid view.</p>
        <button class="btn" data-cols="1" onclick="setGalleryCols(1)">1</button>
        <button class="btn active" data-cols="2" onclick="setGalleryCols(2)">2</button>
        <button class="btn" data-cols="4" onclick="setGalleryCols(4)">4</button>
    </div>

    <!-- Combined Search + Dropdown -->
    <div class="search-combo">
        <i class="fas fa-magnifying-glass" id="searchIcon" title="Search"></i>
        <input type="text" id="searchInput" placeholder="Search by batch or description...">
        <i class="fas fa-chevron-down" id="dropdownToggle" title="Select Batch"></i>

        <!-- Dropdown list -->
        <div class="dropdown-list" id="dropdownList">
            <div data-value="all">All Batches</div>
            @foreach ($batches as $batch)
                @if ($batch->galleries->count())
                    <div data-value="batch-{{ $batch->id }}">{{ $batch->name }}</div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="all-gallery">
        @forelse ($batches as $batch)
            @if ($batch->galleries->count())
                <div class="batch-gallery batch-{{ $batch->id }}">
                    <div class="grid-container">
                        @foreach ($batch->galleries as $gallery)
                            <div class="grid-item"
                                 data-description="{{ strtolower($gallery->description) }}"
                                 data-batch="batch-{{ $batch->id }}"
                                 data-batchname="{{ strtolower($batch->name) }}">
                                <img src="{{ asset('storage/' . $gallery->file_name) }}" alt="{{ $gallery->description }}">
                                <div class="overlay">
                                    <h3>{{ $gallery->description }}</h3>
                                    <p>{{ $batch->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @empty
            <p class="text-gray-500 text-center">No batches found.</p>
        @endforelse
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Grid view buttons logic
    function setGalleryCols(cols) {
        document.documentElement.style.setProperty('--gallery-cols', cols);
        // Update active button
        var btns = document.querySelectorAll('.header .btn');
        btns.forEach(btn => btn.classList.remove('active'));
        document.querySelector('.header .btn[data-cols="' + cols + '"]').classList.add('active');
    }
    // Set default grid columns on load
    setGalleryCols(2);

    // Search and dropdown logic
    $(function () {
        let selectedBatch = 'all';

        const $searchInput = $('#searchInput');
        const $dropdownToggle = $('#dropdownToggle');
        const $dropdownList = $('#dropdownList');

        // Show/hide dropdown list
        $dropdownToggle.on('click', function () {
            $dropdownList.toggleClass('active');
        });

        // When clicking outside, close dropdown
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.search-combo').length) {
                $dropdownList.removeClass('active');
            }
        });

        // Dropdown batch selection
        $dropdownList.on('click', 'div', function () {
            selectedBatch = $(this).data('value');

            // Update input value with selected batch name or clear if 'all'
            if (selectedBatch === 'all') {
                $searchInput.val('');
            } else {
                $searchInput.val($(this).text());
            }

            $dropdownList.removeClass('active');
            filterGallery();
        });

        // Search icon click triggers filtering
        $('#searchIcon').on('click', filterGallery);

        // Filter on Enter key in input field
        $searchInput.on('keypress', function (e) {
            if (e.which === 13) { // Enter key
                e.preventDefault();
                filterGallery();
            }
        });

        // Live filtering as user types
        $searchInput.on('input', function () {
            // If user types manually, reset batch filter to 'all' to avoid conflict
            selectedBatch = 'all';
            filterGallery();
        });

        function filterGallery() {
            const searchTerm = $searchInput.val().toLowerCase().trim();

            // If selected batch is not 'all', show only that batch and filter inside it
            if (selectedBatch !== 'all') {
                $('.batch-gallery').hide();
                const $targetBatch = $('.batch-gallery.' + selectedBatch);
                $targetBatch.show();

                let batchHasVisibleItems = false;

                $targetBatch.find('.grid-item').each(function () {
                    const $item = $(this);
                    const description = $item.data('description');
                    const batchname = $item.data('batchname');

                    // Filter by search term inside the selected batch
                    if (!searchTerm || description.includes(searchTerm) || batchname.includes(searchTerm)) {
                        $item.show();
                        batchHasVisibleItems = true;
                    } else {
                        $item.hide();
                    }
                });

                // Hide batch container if no items visible
                if (!batchHasVisibleItems) {
                    $targetBatch.hide();
                }

            } else {
                // selectedBatch === 'all', so filter across all batches by description or batch name
                $('.batch-gallery').each(function () {
                    const $batch = $(this);
                    let batchHasVisibleItems = false;

                    $batch.find('.grid-item').each(function () {
                        const $item = $(this);
                        const description = $item.data('description');
                        const batchname = $item.data('batchname');

                        if (!searchTerm || description.includes(searchTerm) || batchname.includes(searchTerm)) {
                            $item.show();
                            batchHasVisibleItems = true;
                        } else {
                            $item.hide();
                        }
                    });

                    $batch.toggle(batchHasVisibleItems);
                });
            }
        }

        // Initial filter on page load (show all)
        filterGallery();
    });
</script>

@endsection