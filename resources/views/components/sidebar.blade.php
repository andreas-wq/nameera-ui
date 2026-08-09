<!-- ============ SIDEBAR ============ -->
<aside
  :class="{'translate-x-0 w-[280px]': sidebarOpen, '-translate-x-full w-[280px]': !sidebarOpen && isMobile, 'translate-x-0 w-[88px]': !sidebarOpen && !isMobile}"
  class="fixed lg:relative z-50 h-full transition-all duration-400 ease-out bg-[#142414] dark:bg-gray-900 text-white flex flex-col shadow-2xl lg:rounded-3xl shrink-0 overflow-hidden border border-white/5 dark:border-gray-800"
>
  <div
    class="h-20 flex items-center px-6 border-b border-white/5 shrink-0"
  >
    <div
      class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-light to-primary flex items-center justify-center shrink-0 shadow-lg shadow-primary/30"
    >
      <svg
        class="w-6 h-6 text-white"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"
        ></path>
      </svg>
    </div>
    <span
      x-show="sidebarOpen"
      class="ml-4 font-heading font-extrabold text-xl text-white tracking-wide whitespace-nowrap"
      >Nameera <span class="text-primary-light">ui</span></span
    >
  </div>

  <nav class="flex-1 overflow-y-auto p-4 space-y-1.5 scrollbar-hide">
    <p
      x-show="sidebarOpen"
      class="px-4 text-[10px] font-bold uppercase tracking-wider text-gray-500 mb-3 mt-2"
    >
      Main Menu
    </p>

    <!-- Menu Dashboard / Home -->
    <a
      href="{{ url('nameera/dashboard') }}"
      class="{{ request()->is('nameera/dashboard') ? 'bg-primary/90 text-white shadow-md shadow-primary/20 backdrop-blur-md' : 'text-gray-400 hover:bg-white/5 hover:text-white' }} flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all duration-300 whitespace-nowrap group"
    >
      <div class="{{ request()->is('nameera/dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-primary-light' }} transition-colors">
        <svg
          class="w-5 h-5 shrink-0"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
          ></path>
        </svg>
      </div>
      <span x-show="sidebarOpen" class="font-bold text-sm tracking-wide"
        >Home / Dashboard</span
      >
    </a>

    <!-- Form menu -->
    <div x-data="{ open: {{ request()->is('nameera/form-*') ? 'true' : 'false' }} }" class="whitespace-nowrap mt-2">
      <button
        @click="open = !open"
        class="text-gray-400 hover:bg-white/5 hover:text-white w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-300 group"
      >
        <div class="flex items-center gap-4">
          <div
            class="text-gray-400 group-hover:text-primary-light transition-colors"
          >
            <svg
              class="w-5 h-5 shrink-0"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              ></path>
            </svg>
          </div>
          <span
            x-show="sidebarOpen"
            class="font-bold text-sm tracking-wide"
            >Form Elements</span
          >
        </div>
        <svg
          x-show="sidebarOpen"
          :class="open ? 'rotate-180' : ''"
          class="w-4 h-4 transition-transform duration-300 text-gray-500 group-hover:text-gray-300"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div
        x-show="open && sidebarOpen"
        x-collapse
        class="pl-[3.25rem] pr-4 py-1 space-y-1"
      >
        <a
          href="{{ url('nameera/form-kit') }}"
          class="{{ request()->is('nameera/form-kit') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Form Kit</a
        >
        <a
          href="{{ url('nameera/form-basic') }}"
          class="{{ request()->is('nameera/form-basic') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Basic Form</a
        >
        <a
          href="{{ url('nameera/form-special') }}"
          class="{{ request()->is('nameera/form-special') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Special Form</a
        >
        <a
          href="{{ url('nameera/form-custom') }}"
          class="{{ request()->is('nameera/form-custom') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Custom Form</a
        >
      </div>
    </div>

    <!-- Table menu -->
    <div x-data="{ open: {{ request()->is('nameera/table-*') ? 'true' : 'false' }} }" class="whitespace-nowrap">
      <button
        @click="open = !open"
        class="text-gray-400 hover:bg-white/5 hover:text-white w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-300 group"
      >
        <div class="flex items-center gap-4">
          <div
            class="text-gray-400 group-hover:text-primary-light transition-colors"
          >
            <svg
              class="w-5 h-5 shrink-0"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 10h18M3 6h18M3 14h18M3 18h18"
              ></path>
            </svg>
          </div>
          <span
            x-show="sidebarOpen"
            class="font-bold text-sm tracking-wide"
            >Data Tables</span
          >
        </div>
        <svg
          x-show="sidebarOpen"
          :class="open ? 'rotate-180' : ''"
          class="w-4 h-4 transition-transform duration-300 text-gray-500 group-hover:text-gray-300"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div
        x-show="open && sidebarOpen"
        x-collapse
        class="pl-[3.25rem] pr-4 py-1 space-y-1"
      >
        <a
          href="{{ url('nameera/table-basic') }}"
          class="{{ request()->is('nameera/table-basic') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Basic Table</a
        >
        <a
          href="{{ url('nameera/table-special') }}"
          class="{{ request()->is('nameera/table-special') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Special Table</a
        >
        <a
          href="{{ url('nameera/table-custom') }}"
          class="{{ request()->is('nameera/table-custom') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Custom Table</a
        >
        <a
          href="{{ url('nameera/table-custom-v2') }}"
          class="{{ request()->is('nameera/table-custom-v2') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} flex justify-between items-center text-sm py-2 transition-colors"
        >
          <span>Custom V2</span>
          <span
            class="bg-primary text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm"
            >Laravel</span
          >
        </a>
      </div>
    </div>

    <!-- Components menu -->
    <div x-data="{ open: {{ request()->is('nameera/comp-*') ? 'true' : 'false' }} }" class="whitespace-nowrap">
      <button
        @click="open = !open"
        class="text-gray-400 hover:bg-white/5 hover:text-white w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-300 group"
      >
        <div class="flex items-center gap-4">
          <div
            class="text-gray-400 group-hover:text-primary-light transition-colors"
          >
            <svg
              class="w-5 h-5 shrink-0"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
              ></path>
            </svg>
          </div>
          <span
            x-show="sidebarOpen"
            class="font-bold text-sm tracking-wide"
            >UI Components</span
          >
        </div>
        <svg
          x-show="sidebarOpen"
          :class="open ? 'rotate-180' : ''"
          class="w-4 h-4 transition-transform duration-300 text-gray-500 group-hover:text-gray-300"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div
        x-show="open && sidebarOpen"
        x-collapse
        class="pl-[3.25rem] pr-4 py-1 space-y-1"
      >
        <a
          href="{{ url('nameera/comp-base') }}"
          class="{{ request()->is('nameera/comp-base') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Base UI</a
        >
        <a
          href="{{ url('nameera/comp-nav') }}"
          class="{{ request()->is('nameera/comp-nav') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Navigation</a
        >
        <a
          href="{{ url('nameera/comp-feedback') }}"
          class="{{ request()->is('nameera/comp-feedback') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Feedback</a
        >
        <a
          href="{{ url('nameera/comp-data') }}"
          class="{{ request()->is('nameera/comp-data') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Data Display</a
        >
        <a
          href="{{ url('nameera/comp-advanced') }}"
          class="{{ request()->is('nameera/comp-advanced') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Advanced</a
        >
      </div>
    </div>

    <!-- Auth Pages menu -->
    <div x-data="{ open: {{ request()->is('nameera/login') || request()->is('nameera/register') || request()->is('nameera/error-404') ? 'true' : 'false' }} }" class="whitespace-nowrap mt-4">
      <p
        x-show="sidebarOpen"
        class="px-4 text-[10px] font-bold uppercase tracking-wider text-gray-500 mb-3"
      >
        Pages
      </p>
      <button
        @click="open = !open"
        class="text-gray-400 hover:bg-white/5 hover:text-white w-full flex items-center justify-between px-4 py-3.5 rounded-2xl transition-all duration-300 group"
      >
        <div class="flex items-center gap-4">
          <div
            class="text-gray-400 group-hover:text-primary-light transition-colors"
          >
            <svg
              class="w-5 h-5 shrink-0"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
              ></path>
            </svg>
          </div>
          <span
            x-show="sidebarOpen"
            class="font-bold text-sm tracking-wide"
            >Authentication</span
          >
        </div>
        <svg
          x-show="sidebarOpen"
          :class="open ? 'rotate-180' : ''"
          class="w-4 h-4 transition-transform duration-300 text-gray-500 group-hover:text-gray-300"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <div
        x-show="open && sidebarOpen"
        x-collapse
        class="pl-[3.25rem] pr-4 py-1 space-y-1"
      >
        <a
          href="{{ url('nameera/login') }}"
          class="{{ request()->is('nameera/login') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Login</a
        >
        <a
          href="{{ url('nameera/register') }}"
          class="{{ request()->is('nameera/register') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Register</a
        >
        <a
          href="{{ url('nameera/error-404') }}"
          class="{{ request()->is('nameera/error-404') ? 'text-primary-light font-bold' : 'text-gray-400 hover:text-white' }} block text-sm py-2 transition-colors"
          >Error 404</a
        >
      </div>
    </div>
  </nav>

  <div class="p-4 shrink-0">
    <div
      class="p-2 rounded-2xl bg-white/5 border border-white/10 flex items-center gap-3 hover:bg-white/10 transition-colors cursor-pointer"
    >
      <div
        class="w-10 h-10 rounded-xl bg-primary-mid overflow-hidden shrink-0"
      >
        <img
          src="https://ui-avatars.com/api/?name=Admin+Panel&background=639922&color=fff&rounded=true"
          class="w-full h-full object-cover"
        />
      </div>
      <div x-show="sidebarOpen" class="flex-1 overflow-hidden pr-2">
        <h4 class="text-sm font-bold text-white truncate">
          Administrator
        </h4>
        <p class="text-xs text-gray-400 font-medium truncate">
          admin@domain.com
        </p>
      </div>
    </div>
  </div>
</aside>