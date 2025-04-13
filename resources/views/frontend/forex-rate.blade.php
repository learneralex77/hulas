@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

 <!-- banner-section -->
 <section class="relative">
  <div class="mb-10">
  <img src="{{ asset('assets/images/become-an-agent/breadcrumb-serv.jpg') }}" alt="About Us Image"

      alt="Banner Image"
      class="h-60 w-full object-cover"
    />
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
    Live Exchange Rates        </p>
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
                <th scope="col" class="px-2 md:px-6 py-3">Nov 27, 23-10 AM</th>
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
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img src="./img/usa.png" class="w-8 rounded-full" alt="" />
                    <p class="text-base text-[#212529]">US Dollar</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">133.10</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/japan.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">JPY (Japanees Yen)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">10</td>
                <td class="px-2 md:px-6 py-4">8.91</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img src="./img/uk.png" class="w-8 rounded-full" alt="" />
                    <p class="text-base text-[#212529]">
                      GBP (UK Pound Sterling)
                    </p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">167.19</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/newzland.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">Newzland Dollar</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">145.62</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/canada.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">Canadian Dollar</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">97.06</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/european-flag.png"
                      class="w-8"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">EUR(European Euro)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">145.12</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/switzerland.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">CHF(Swiss Franc)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">149.91</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/australia-circle.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">AUD(Australian Dollar)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">87.22</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/singapore-circle.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">SGD(Singapore Dollar)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">98.99</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/china-circle.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">CNY(Chinese Yuan)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">18.53</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/saudi-arabia.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">
                      SAR(Saudi Arabian Riyal)
                    </p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">35.11</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/qatar.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">QAR(Qatari Riyal)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">35.99</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/thailand.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">THB(Thai Baht)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">3.76</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/united-arab-emirates.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">AED(UAE Dirham)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">36.07</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/malaysia.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">MYR(Malasian Ringgit)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">28.12</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/south-korea.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">KRW(South Korean Won)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">100</td>
                <td class="px-2 md:px-6 py-4">10.13</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/sweden.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">SEK(Swedish Kroner)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">12.67</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/denmark.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">DKK(Danish Kroner)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">19.61</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/hong-kong.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">HKD(Hong Kong Dollar)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">17.04</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/kuwait.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">KWD(Kuwaity Dinar)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">430.02</td>
              </tr>
              <tr class="bg-white">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/bahrain.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">BHD(Bahrain Dinar)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">351.92</td>
              </tr>
              <tr class="bg-white">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/india.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">IND(Indian Rupee)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">100</td>
                <td class="px-2 md:px-6 py-4">160.00</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!--  -->
        <div class="relative mx-3 shadow-xl overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-[#035797]">
              <tr>
                <th scope="col" class="px-2 md:px-6 py-3">
                  Currency Rate for Remittance
                </th>
                <th scope="col" class="px-2 md:px-6 py-3"></th>
                <th scope="col" class="px-2 md:px-6 py-3">Nov 27, 23-02 PM</th>
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
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img src="./img/usa.png" class="w-8 rounded-full" alt="" />
                    <p class="text-base text-[#212529]">US Dollar</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">133.10</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/japan.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">Japanees Yen</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">10</td>
                <td class="px-2 md:px-6 py-4">8.91</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img src="./img/uk.png" class="w-8 rounded-full" alt="" />
                    <p class="text-base text-[#212529]">British Pound</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">167.30</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/newzland.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">Newzland Dollar</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">145.62</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/canada.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">Canadian Dollar</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">97.03</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/european-flag.png"
                      class="w-8"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">EUR(European Euro)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">145.13</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/switzerland.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">CHF(Swiss Franc)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-2 md:px-6 py-4">150.06</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-2 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/australia-circle.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">AUD(Australian Dollar)</p>
                  </div>
                </th>
                <td class="px-2 md:px-6 py-4">1</td>
                <td class="px-6 py-4">87.28</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/singapore-circle.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">SGD(Singapore Dollar)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">99.04</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/china-circle.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">CNY(Chinese Yuan)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">18.52</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/saudi-arabia.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">
                      SAR(Saudi Arabian Riyal)
                    </p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">35.08</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/qatar.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">QAR(Qatari Riyal)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">35.84</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/thailand.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">THB(Thai Baht)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">3.78</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/united-arab-emirates.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">AED(UAE Dirham)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">35.97</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/malaysia.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">MYR(Malasian Ringgit)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">27.96</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/south-korea.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">KRW(South Korean Won)</p>
                  </div>
                </th>
                <td class="px-6 py-4">100</td>
                <td class="px-6 py-4">10.17</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/sweden.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">SEK(Swedish Kroner)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">12.73</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/denmark.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">DKK(Danish Kroner)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">19.49</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/hong-kong.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">HKD(Hong Kong Dollar)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">17.06</td>
              </tr>
              <tr class="bg-white border-b">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/kuwait.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">KWD(Kuwaity Dinar)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">429.12</td>
              </tr>
              <tr class="bg-white">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/bahrain.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">BHD(Bahrain Dinar)</p>
                  </div>
                </th>
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">351.27</td>
              </tr>
              <tr class="bg-white">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                >
                  <div class="flex space-x-3 items-center">
                    <img
                      src="./img/flags/india.png"
                      class="w-8 rounded-full"
                      alt=""
                    />
                    <p class="text-base text-[#212529]">IND(Indian Rupee)</p>
                  </div>
                </th>
                <td class="px-6 py-4">100</td>
                <td class="px-6 py-4">160.00</td>
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