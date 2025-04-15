@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

  @push('styles')
    <style>
    .category-button,
    .category-item {
    transition: all 0.3s ease;
    }

    /* Highlight styles */
    .category-button.selected,
    .category-item.selected {
    background-color: #2563eb;
    /* Blue highlight */
    color: white;
    /* Change text color to white */
    border-color: #2563eb;
    /* Blue border */
    animation: bounceIn 0.5s;
    }

    /* Bouncing effect when selected */
    @keyframes bounceIn {
    0% {
      transform: scale(0.8);
      opacity: 0;
    }

    50% {
      transform: scale(1.1);
      opacity: 1;
    }

    100% {
      transform: scale(1);
      opacity: 1;
    }
    }
    </style>
  @endpush

  <!-- banner-section -->
  <section class="relative">
    <div class="mb-10">
    <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image" alt="Banner Image"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-4xl font-extrabold text-white">Downloads</h3>
      <div class="flex space-x-5 items-center">
      <a href="homepage" class="text-white font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="downloads" class="text-accent font-bold">Downloads</a>
      </div>
    </div>
  </section>
  <!-- banner-section -->

  <div id="card-prototype" class="hidden">
  <div class="bg-white p-4 rounded-lg shadow-md max-h-40 hover:shadow-xl cursor-pointer transition-all ease-in-out">
    <div class="flex items-center gap-10 h-20">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1oX7_c8ln65NHhs86VmmAlH5ZnpeDdYR5CA&s" class="w-6" alt="icon">
      <span class="font-bold file-name"></span>
    </div>
    <button class="mt-2 bg-black text-white w-full p-2 rounded-lg flex items-center justify-center cursor-pointer download-btn">
      <img src="/images/contact-us/download-minimalistic-svgrepo-com.svg" class="w-6 hover:scale-125 ease-in-out transition-all" alt="download">
    </button>
  </div>
</div>




  <div class="flex flex-col justify-center mx-auto bg-white p-6 rounded-lg md:mx-[50px] xl:mx-[100px] ">
    <h2 class="text-2xl font-bold mb-2">Downloads</h2>
    <hr class="text-gray-300 font-bold mb-4" />
    <div class="flex flex-col lg:flex-row gap-6 w-full">
    <!-- Dropdown for small screens -->
    <div class="relative lg:hidden w-full md:hidden text-left">
      <button id="dropdownBtn"
      class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 transition ease-in-out duration-300"
      aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
      <div class="flex flex-row justify-between gap-6 w-full">
        <h3 class="font-bold">Categories</h3>
        <svg class="-mr-1 w-5 h-5 text-gray-400 transition ease-in-out duration-300" viewBox="0 0 20 20"
        fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd"
          d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
          clip-rule="evenodd" />
        </svg>
      </div>
      </button>
      <ul id="dropdownMenu"
      class="opacity-0 scale-95 hidden absolute right-0 z-10 mt-2 w-full origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none transition ease-in-out duration-300"
      role="menu" aria-orientation="vertical">
      <li
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 category-button transition duration-300 ease-in-out transform"
        onclick="loadContent('forms'); toggleDropdown();">
        Forms
      </li>
      <li
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 category-button transition duration-300 ease-in-out transform"
        onclick="loadContent('annualReports'); toggleDropdown();">
        Annual Reports
      </li>
      <li
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 category-button transition duration-300 ease-in-out transform"
        onclick="loadContent('financialHighlights'); toggleDropdown();">
        Financial Highlights
      </li>
      <li
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 category-button transition duration-300 ease-in-out transform"
        onclick="loadContent('dividend'); toggleDropdown();">
        Dividend
      </li>
      <li
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 category-button transition duration-300 ease-in-out transform"
        onclick="loadContent('shareCapital'); toggleDropdown();">
        Share Capital
      </li>
      <li
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 category-button transition duration-300 ease-in-out transform"
        onclick="loadContent('debenture'); toggleDropdown();">
        Debenture
      </li>
      </ul>
    </div>

    <!-- Sidebar for larger screens -->
    <div class="flex flex-row justify-between w-full">
      <div class="w-full flex-1 hidden md:flex flex-row">
      <ul id="sidebar" class="space-y-2 w-[80%]">
        <li class="bg-gray-200 p-3 rounded cursor-pointer hover:bg-gray-300" onclick="loadContent('forms')">
        Forms
        </li>
        <li class="bg-gray-200 p-3 rounded cursor-pointer hover:bg-gray-300" onclick="loadContent('annualReports')">
        Annual Reports
        </li>
        <li class="bg-gray-200 p-3 rounded cursor-pointer hover:bg-gray-300"
        onclick="loadContent('financialHighlights')">
        Financial Highlights
        </li>
        <li class="bg-gray-200 p-3 rounded cursor-pointer hover:bg-gray-300" onclick="loadContent('dividend')">
        Dividend
        </li>
        <li class="bg-gray-200 p-3 rounded cursor-pointer hover:bg-gray-300" onclick="loadContent('shareCapital')">
        Share Capital
        </li>
        <li class="bg-gray-200 p-3 rounded cursor-pointer hover:bg-gray-300" onclick="loadContent('debenture')">
        Debenture
        </li>
      </ul>
      </div>
      <!-- Content Area -->
      <div id="content" class="flex-2 w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div>
    </div>
    </div>
  </div>
@endsection


@push('scripts')

  <script>
    function toggleDropdown() {
    const menu = document.getElementById("dropdownMenu");
    menu.classList.toggle("hidden");
    if (menu.classList.contains("hidden")) {
      menu.classList.remove("opacity-100", "scale-100");
      menu.classList.add("opacity-0", "scale-95");
    } else {
      menu.classList.remove("opacity-0", "scale-95");
      menu.classList.add("opacity-100", "scale-100");
    }
    document.addEventListener("click", (event) => {
      if (
      !event.target.closest("#dropdownBtn") &&
      !event.target.closest("#dropdownMenu")
      ) {
      menu.classList.add("hidden");
      menu.classList.remove("opacity-100", "scale-100");
      menu.classList.add("opacity-0", "scale-95");
      }
    });
    }
  </script>

  <script>

function loadContent(category) {
  const content = document.getElementById("content");
  content.innerHTML = "";

  const prototype = document.querySelector("#card-prototype > div");

  contentData[category].forEach((item) => {
    const clone = prototype.cloneNode(true);
    clone.querySelector(".file-name").textContent = item.name;
    clone.querySelector(".download-btn").addEventListener("click", () => downloadFile(item.file));
    content.appendChild(clone);
  });
}



  </script>
  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
<!-- ✅ jQuery (must come first) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- ✅ Select2 (depends on jQuery) -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endpush