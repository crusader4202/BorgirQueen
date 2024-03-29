@extends('master.master')
@section('content')
    {{-- Proof Modal --}}
    <div id="proofModal" class="hidden flex-col items-center justify-center fixed top-0 w-screen h-screen bg-[#44403C80]">
        <div class="relative flex flex-col bg-[rgb(255,255,255)] p-4 rounded-lg border border-[1px] border-[#E5E7EB]">
            <div onclick="closeModal()" class="absolute right-2 top-0 cursor-pointer">X</div>
            <img id="proofImage" class="mt-2" src="" alt="" style="width: 500px;">
        </div>
    </div>
    <div class="grid grid-cols-12 min-h-screen bg-[#F9FAFB]">
        <div class="bg-[#FFFFFF] col-span-2 border">
            @include('page.admin.components.sidebar')
        </div>
        <div class="col-start-3 px-8 py-12" style="grid-column-end: 13">
            <div class="overflow-x-auto bg-[#FFFFFF] p-4 rounded-lg border border-[1px] border-[#E5E7EB]">
                @if (Session::has('success'))
                    {{-- Success --}}
                    <div id="modalPopup"
                        class="fixed top-10 right-4 w-fit drop-shadow-xl text-black bg-[#F5F3FF] p-3 px-4 rounded-lg border border-2 border-[#7C3AED] mb-4">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close float-right text-black ml-8"
                            onclick="getElementById('modalPopup').classList.add('hidden')">X</button>
                    </div>
                @endif
                <div class="flex justify-between">
                    <div class="font-semibold">All Product</div>
                </div>
                <div class="flex flex-row gap-x-4 mt-4">
                    @if($filter == "priority")
                        <a href="/admin/orders"
                            class="font-semibold border border-2 border-[#3bb26d] bg-[#6FCF97]
                            text-white
                            rounded-lg px-3 py-1"
                            >Priority
                        </a>
                    @else
                        <a href="/admin/orders"
                            class="font-semibold border border-2 border-[#6FCF97] hover:bg-[#6FCF97]
                            text-[#6FCF97] hover:text-white
                            rounded-lg px-3 py-1"
                            >Priority
                        </a>
                    @endif

                    @if($filter == "delivery")
                        <a href="/admin/orders/filter/delivery"
                            class="font-semibold border border-2 border-[#7522c2] bg-[#9B51E0]
                            text-white
                            rounded-lg px-3 py-1"
                            >On Delivery
                        </a>
                    @else
                        <a href="/admin/orders/filter/delivery"
                            class="font-semibold border border-2 border-[#7522c2] hover:bg-[#9B51E0]
                            text-[#9B51E0] hover:text-white
                            rounded-lg px-3 py-1"
                            >On Delivery
                        </a>
                    @endif

                    @if($filter == "complete")
                    <a href="/admin/orders/filter/complete"
                        class="font-semibold border border-2 border-[#1c76a9] bg-[#2D9CDB]
                        text-white
                        rounded-lg px-3 py-1"
                        >Complete
                    </a>
                    @else
                    <a href="/admin/orders/filter/complete"
                        class="font-semibold border border-2 border-[#1c76a9] hover:bg-[#2D9CDB]
                        text-[#2D9CDB] hover:text-white
                        rounded-lg px-3 py-1"
                        >Complete
                    </a>
                    @endif
                </div>
                @if($filter == "delivery")
                    <form action="{{ route('customerOrderFilter', 'delivery') }}">
                @elseif ($filter == "complete")
                    <form action="{{ route('customerOrderFilter', 'complete') }}">
                @else
                    <form action="{{ route('customerOrder') }}">
                @endif
                    <div class="flex mt-4 mr-8">
                        <button class="mr-2 text-gray-700" type="button" id="button-addon2">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#d1d5db"
                                    d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                </path>
                            </svg>
                        </button>
                        <input class="text-sm" id="search" name="search" type="search" placeholder="Search by name"
                            style="outline: none;" value="{{ request('search') }}">
                    </div>
                </form>
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Date
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    User
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Items
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Shipping Type
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Payment Type
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Price
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Status
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Notes
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Address
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Proof of Payment
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr
                                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">

                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        {{ $order->date }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        {{ $order->user->name }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        @foreach ($order->foods as $food)
                                                            {{ $food->name }} {{ $food->pivot->qty }} piece(s)
                                                            <br>
                                                        @endforeach
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        {{ $order->shipping_type }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        {{ $order->payment_type }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        ${{ $order->total_price }}
                                                    </td>
                                                    <td class="text-sm {{ $order->status == 'Unconfirmed' ? 'text-[#733338]' : '' }} {{ $order->status == 'Preparing' ? 'text-[#6FCF97]' : '' }} {{ $order->status == 'OnDelivery' ? 'text-[#9B51E0]' : '' }} {{ $order->status == 'Completed' ? 'text-[#2D9CDB]' : '' }} font-normal px-6 py-4 whitespace-nowrap"
                                                        style="list-style-type: disc;">
                                                        <li><span class="text-gray-900">{{ $order->status }}</span></li>
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        {{ $order->notes }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        {{ $order->address }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap ">
                                                        <button onclick="showModal('{{ $order->image }}')"
                                                        class="font-semibold text-[#F2F2F2] bg-[#2D9CDB] hover:bg-[#1c76a9] border border-[1px] border-[#E5E7EB] rounded-lg px-3 py-2">
                                                        Show Proof</button>
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4">
                                                        <form action="{{ route('editOrder', $order->id) }}" method="post" style="margin: 0">
                                                            @csrf
                                                            <div class="flex flex-row items-center gap-x-2 text-[#F2F2F2]">
                                                                <button
                                                                    type="submit"
                                                                    class="font-semibold bg-[#6FCF97] hover:bg-[#3bb26d] border border-[1px] border-[#E5E7EB] rounded-lg px-3 py-2"
                                                                    name="action" value="accept">Accept</button>
                                                                <button
                                                                    type="submit"
                                                                    class="font-semibold bg-[#9B51E0] hover:bg-[#7522c2] border border-[1px] border-[#E5E7EB] rounded-lg px-3 py-2"
                                                                    name="action" value="onDelivery">OnDelivery</button>
                                                                <button
                                                                    type="submit"
                                                                    class="font-semibold bg-[#2D9CDB] hover:bg-[#1c76a9] border border-[1px] border-[#E5E7EB] rounded-lg px-3 py-2"
                                                                    name="action" value="complete">Complete</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr
                                                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">

                                                    <td
                                                        class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                                                        No Orders
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex justify-between pt-6">
                                    <div class="text-sm" style="">
                                        @if ($orders->firstItem())
                                            {{ $orders->firstItem() }}
                                            -
                                            {{ $orders->lastItem() }}
                                            of
                                        @endif
                                        {{ $orders->total() }}
                                        results
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-right mt-2">
                {{ $orders->links('pagination::default') }}
            </div>
        </div>
    </div>
@endsection

<script>
    function closeModal() {
        const modal = document.getElementById('proofModal');
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }

    function showModal(image) {
        const modal = document.getElementById('proofModal');
        const proofImage = document.getElementById('proofImage');
        proofImage.src="../../../storage/images/" + image;
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>

<style>
    .pagination {
        display: flex;
    }

    .pagination li {
        background: #FFFFFF;
        list-style: none;
        padding: 0.5rem;
    }

    .pagination li a {
        text-decoration: none;
        color: #6B7280;
    }

    .pagination li.active a {
        color: #2D9CDB;
    }

    .pagination li.active span {
        color: #2D9CDB;
    }

    .pagination li a:hover {
        color: #2D9CDB;
    }
</style>
