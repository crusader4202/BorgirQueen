@extends('master.master')
@section('content')
    <div class="grid grid-cols-12 bg-[#F9FAFB]">
        <div class="bg-[#FFFFFF] col-span-2 border">
            <div class="mt-8 px-4">
                <div class="flex items-center text-base font-medium rounded-full md:mr-0 mb-4">
                    <img class="mr-2 w-8 h-8 rounded-full" src="{{ asset('assets/anon.png') }}" alt="user photo">
                        {{ auth()->user()->name }}
                </div>
                <a class="flex items-center text-sm font-normal cursor-pointer py-2" href="/admin">
                    Home
                </a>
                <a class="flex items-center text-sm font-normal cursor-pointer py-2">
                    Products
                </a>
                <a class="flex items-center text-sm font-normal cursor-pointer py-2">
                    My Orders
                </a>
                <a class="flex items-center text-sm font-normal cursor-pointer py-2" href="/admin/allCustomer">
                    All Customers
                </a>
                <a class="flex items-center text-sm font-normal cursor-pointer py-2">
                    Customer Orders
                </a>
            </div>
        </div>
        <div class="col-start-3 px-8 py-12" style="grid-column-end: 13">
            <div class="bg-[#FFFFFF] p-4 rounded-lg border border-[1px] border-[#E5E7EB]">
                <div class="flex justify-between">
                    <div class="font-semibold">All Customers</div>
                </div>
                <div class="flex justify-end mr-8">
                    <button class="mr-2 text-gray-700" type="button" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                          <path fill="#d1d5db"  d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                    <input class="text-sm" type="text" placeholder="Search by name" style="outline: none">
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Name
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Email
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Phone Number
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Address
                                                </th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Member Since
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < 10; $i++)
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                
                                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                    Customer Name
                                                </td>
                                                <td class="max-w-xs text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap overflow-x-hidden">
                                                    user@gmail.com
                                                </td>
                                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                    +6287312731
                                                </td>
                                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                    Jalan Baru
                                                </td>
                                                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                    Nov 01 2022
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection