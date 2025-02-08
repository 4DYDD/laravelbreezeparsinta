<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' / ' . config('app.name', 'Laravel') : config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>


    <script>
        function handleDrop(event) {
            const file = event.dataTransfer.files[0]; // Ambil file yang di-drop
            if (file) {
                const fileInput = document.getElementById('dropzone-file');
                fileInput.files = event.dataTransfer.files; // Set file input dengan file yang di-drop
                document.querySelector('[x-ref="fileInput"]').dispatchEvent(new Event('change')); // Trigger change event
            }

            // Hilangkan highlight
            event.target.classList.remove('bg-gray-200');

        }
    </script>
    <script>
        const form = document.getElementById('myForm');

        const textarea = document.getElementById('description');
        const errorSpan = document.getElementById('error-description');

        textarea.addEventListener('input', function() {
            if (this.value.length > 255) {
                errorSpan.textContent = "The description field must not be greater than 255 characters";
                textarea.classList.add('!border-red-500');
                textarea.classList.add('!ring-red-500');
            } else {
                errorSpan.textContent = ""; // Hilangkan pesan error jika valid
                textarea.classList.remove('!border-red-500');
                textarea.classList.remove('!ring-red-500');
            }
        });
    </script>
</body>

</html>
