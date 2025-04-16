@extends('frontend.layouts.app')
@section('title', 'Forex Rate')
@section('meta', 'Forex Rate')
@section('content')

  <!-- banner-section -->
  <section class="relative">
    <div class="mb-10">
    <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image" alt="Banner Image"
      class="h-60 w-full object-cover" />
    </div>
    <div class="absolute w-full top-20">
    <div class="flex flex-col space-y-8 ml-10">
      <h3 class="text-4xl font-extrabold text-white">Forex Rate</h3>
      <div class="flex space-x-5 items-center">
      <a href="index.html" class="text-[#666] font-bold">Home</a>
      <p class="text-white text-base fony-bold hover:cursor-pointer">></p>
      <a href="forex-rate" class="text-accent font-bold">Forex Rate</a>
      </div>
    </div>
  </section>
  <!-- banner-section -->

  <!-- live exchange rates -->
  <section>
    <div class="overflow-x-hidden">
    <div class="p-4 md:ml-8 lg:my-4 lg:mx-20 lg:mb-2">
      <div class="flex flex-col items-center space-y-6">

      <p class="text-xl font-bold md:text-2xl lg:text-3xl">
        Live Exchange Rates </p>
      <p class="text-xl text-[#737879] text-center max-w-4xl">
        Exchange money across the world in real time with lowest fees

      </p>
      </div>
    </div>
    </div>

    <div class="flex flex-col lg:flex-row justify-center gap-6 items-center my-10">
    <div class="relative mx-3 shadow-xl overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-white uppercase bg-red-500">
        <tr>
        <th scope="col" class="px-2 md:px-6 py-3">
          Currency Rate for Remittance
        </th>
        <th scope="col" class="px-2 md:px-6 py-3"></th>
        <th scope="col" class="px-2 md:px-6 py-3">Apr 16, 23-10 AM</th>
        </tr>
      </thead>
      <thead class="text-xs text-white uppercase bg-gray-500">
        <tr>
        <th scope="col" class="px-2 md:px-6 py-3">Currency</th>
        <th scope="col" class="px-2 md:px-6 py-3">Unit</th>
        <th scope="col" class="px-2 md:px-6 py-3">Buying rate(average)</th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-us w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">US Dollar</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">133.10</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-jp w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">JPY (Japanees Yen)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">10</td>
        <td class="px-2 md:px-6 py-4">8.91</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-gb w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">
            GBP (UK Pound Sterling)
          </p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">167.19</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-nz w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">Newzland Dollar</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">145.62</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-ca w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">Canadian Dollar</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">97.06</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-eu w-8 h-8"></span>
          <p class="text-base text-[#212529]">EUR(European Euro)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">145.12</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-ch w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">CHF(Swiss Franc)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">149.91</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-au w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">AUD(Australian Dollar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">87.22</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-sg w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">SGD(Singapore Dollar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">98.99</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-cn w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">CNY(Chinese Yuan)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">18.53</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-sa w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">
            SAR(Saudi Arabian Riyal)
          </p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">35.11</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-qa w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">QAR(Qatari Riyal)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">35.99</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-th w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">THB(Thai Baht)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">3.76</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-ae w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">AED(UAE Dirham)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">36.07</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-my w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">MYR(Malasian Ringgit)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">28.12</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-kr w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">KRW(South Korean Won)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">100</td>
        <td class="px-2 md:px-6 py-4">10.13</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-se w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">SEK(Swedish Kroner)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">12.67</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-dk w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">DKK(Danish Kroner)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">19.61</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-hk w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">HKD(Hong Kong Dollar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">17.04</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-kw w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">KWD(Kuwaity Dinar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">430.02</td>
        </tr>
        <tr class="bg-white">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-bh w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">BHD(Bahrain Dinar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">351.92</td>
        </tr>
        <tr class="bg-white">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-in w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">IND(Indian Rupee)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">100</td>
        <td class="px-2 md:px-6 py-4">160.00</td>
        </tr>
      </tbody>
      </table>
    </div>

    <div class="relative mx-3 shadow-xl overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500">
      <thead class="text-xs text-white uppercase bg-[#035797]">
        <tr>
        <th scope="col" class="px-2 md:px-6 py-3">
          Currency Rate for Remittance
        </th>
        <th scope="col" class="px-2 md:px-6 py-3"></th>
        <th scope="col" class="px-2 md:px-6 py-3">Apr 16, 23-02 PM</th>
        </tr>
      </thead>
      <thead class="text-xs text-white uppercase bg-gray-500">
        <tr>
        <th scope="col" class="px-2 md:px-6 py-3">Currency</th>
        <th scope="col" class="px-2 md:px-6 py-3">Unit</th>
        <th scope="col" class="px-2 md:px-6 py-3">Buying rate(average)</th>
        </tr>
      </thead>
      <tbody>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-us w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">US Dollar</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">133.10</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-jp w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">JPY (Japanees Yen)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">10</td>
        <td class="px-2 md:px-6 py-4">8.91</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-gb w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">
            GBP (UK Pound Sterling)
          </p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">167.19</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-nz w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">Newzland Dollar</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">145.62</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-ca w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">Canadian Dollar</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">97.06</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-eu w-8 h-8"></span>
          <p class="text-base text-[#212529]">EUR(European Euro)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">145.12</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-ch w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">CHF(Swiss Franc)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">149.91</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-au w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">AUD(Australian Dollar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">87.22</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-sg w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">SGD(Singapore Dollar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">98.99</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-cn w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">CNY(Chinese Yuan)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">18.53</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-sa w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">
            SAR(Saudi Arabian Riyal)
          </p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">35.11</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-qa w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">QAR(Qatari Riyal)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">35.99</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-th w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">THB(Thai Baht)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">3.76</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-ae w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">AED(UAE Dirham)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">36.07</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-my w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">MYR(Malasian Ringgit)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">28.12</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-kr w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">KRW(South Korean Won)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">100</td>
        <td class="px-2 md:px-6 py-4">10.13</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-se w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">SEK(Swedish Kroner)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">12.67</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-dk w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">DKK(Danish Kroner)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">19.61</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-hk w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">HKD(Hong Kong Dollar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">17.04</td>
        </tr>
        <tr class="bg-white border-b">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-kw w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">KWD(Kuwaity Dinar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">430.02</td>
        </tr>
        <tr class="bg-white">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-bh w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">BHD(Bahrain Dinar)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">1</td>
        <td class="px-2 md:px-6 py-4">351.92</td>
        </tr>
        <tr class="bg-white">
        <th scope="row" class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
          <div class="flex space-x-3 items-center">
          <span class="flag-icon flag-icon-in w-8 h-8 rounded-full"></span>
          <p class="text-base text-[#212529]">IND(Indian Rupee)</p>
          </div>
        </th>
        <td class="px-2 md:px-6 py-4">100</td>
        <td class="px-2 md:px-6 py-4">160.00</td>
        </tr>
      </tbody>
      </table>
    </div>
    </div>
  </section>

@endsection

@push('scripts')
  <script type="module" src="/src/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush