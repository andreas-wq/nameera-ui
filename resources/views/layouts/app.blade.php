<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard - Nameera ui')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
      rel="stylesheet"
    />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('vendor/nameera/css/style.css') }}" />
    @stack('styles')
  </head>

  <body
    x-data="adminApp()"
    x-init="initApp()"
    class="bg-slate-100 text-gray-800 antialiased overflow-hidden selection:bg-primary-light selection:text-dark transition-colors duration-300 dark:bg-[#0f172a]"
  >
    <div class="flex h-screen w-full relative p-0 lg:p-4 gap-4">
      @hasSection('sidebar')
        @yield('sidebar')
      @else
        @include('nameera::components.sidebar')
      @endif

      <div
        class="flex-1 flex flex-col h-full bg-white dark:bg-gray-800 lg:rounded-3xl shadow-xl border border-gray-200/50 dark:border-gray-700 overflow-hidden relative transition-colors duration-300"
      >
        @hasSection('header')
          @yield('header')
        @else
          @include('nameera::components.header')
        @endif

        <main
          class="flex-1 overflow-y-auto p-6 lg:p-10 transition-colors duration-300"
          id="main-scroll"
        >
          @yield('content')
        </main>
      </div>
    </div>

    <!-- Scripts -->
    <script
      defer
      src="https://unpkg.com/@alpinejs/collapse@3.14.1/dist/cdn.min.js"
    ></script>
    <script
      defer
      src="https://unpkg.com/alpinejs@3.14.1/dist/cdn.min.js"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
    <script src="{{ asset('vendor/nameera/js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>