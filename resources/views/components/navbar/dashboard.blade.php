@props(['title' => null])

<nav class="bg-white w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">

    <!-- Brand -->
    <a href="https://flowbite.com/" class="flex items-center space-x-3">
      <span class="text-xl font-semibold text-gray-900 whitespace-nowrap">
        {{ $title ?? trim($__env->yieldContent('title')) ?? 'Admin Panel' }}
      </span>
    </a>

    <!-- Right side: Bell + Divider + User -->
    <div class="flex items-center gap-3">

      <!-- Bell icon -->
      <button type="button" class="p-2 text-gray-600 rounded-lg hover:bg-gray-100">
        <span class="sr-only">Notifications</span>
        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.292-.538 1.292H5.538C5 18 5 17.301 5 16.708c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365ZM8.733 18c.094.852.306 1.54.944 2.112a3.48 3.48 0 0 0 4.646 0c.638-.572 1.236-1.26 1.33-2.112h-6.92Z" />
        </svg>
      </button>

      <!-- Divider -->
      <div class="w-px h-7 bg-gray-200"></div>

      <!-- User name + Avatar -->
      <button type="button" class="flex items-center gap-2 px-2 py-1 rounded-lg hover:bg-gray-100"
        id="user-menu-button" data-dropdown-toggle="user-dropdown">
        <span class="text-sm font-medium text-gray-900">Jese Leos</span>
        <img class="w-8 h-8 rounded-full object-cover"
          src="https://i.pravatar.cc/150?img=12"
          alt="user photo">
      </button>

      <!-- Dropdown menu -->
      <div class="z-50 hidden bg-white border border-gray-200 rounded-lg shadow-lg w-44" id="user-dropdown">
        <div class="px-4 py-3 text-sm border-b border-gray-200">
          <span class="block font-medium text-gray-900">Jese Leos</span>
          <span class="block text-gray-500 truncate">name@flowbite.com</span>
        </div>
        <ul class="p-2 text-sm text-gray-700 font-medium">
          <li><a href="#" class="block p-2 hover:bg-gray-100 rounded">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>