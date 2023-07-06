<x-app-layout>
    <div class=" px-4 ">

        <h1 class="text-3xl font-bold text-center ">Tagihan</h1>

        <section class="mt-6">
            @foreach ($billTypes as $billType)
                <div class="flex flex-row mb-5 rounded-2xl">
                    <div id="modalBtn{{ $billType->id }}"
                        class=" basis-4/5 w-full h-24 bg-sky-900 rounded-l-2xl  p-4 flex flex-row justify-between">

                        <div class="flex flex-row">
                            <div class="w-10">
                                <svg class="fill-white mt-3 ml-2" xmlns="http://www.w3.org/2000/svg" height="2em"
                                    viewBox="0 0 384 512">
                                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    {{-- <style>
                                        svg {
                                            fill: #ffffff
                                        }
                                    </style> --}}
                                    <path
                                        d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8V488c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488V24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96zM80 352c0 8.8 7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16H288c8.8 0 16-7.2 16-16s-7.2-16-16-16H96z" />
                                </svg>
                            </div>
                            <div class="ml-4">

                                <p class="text-base text-white ">{{ $billType->bill_type }}</p>

                                @if (!$bills->where('bill_type_id', $billType->id)->first())
                                    <div class="flex flex-row mt-3">
                                        <svg class="fill-gray-300" xmlns="http://www.w3.org/2000/svg" height="20px"
                                            viewBox="0 0 512 512">
                                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <style>
                                                svg {
                                                    fill: #11258d
                                                }
                                            </style>
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                        </svg>
                                        <p class="ml-2 text-sm text-gray-400">tambah alokasi</p>
                                    </div>
                                @else
                                    @foreach ($bills->where('bill_type_id', $billType->id) as $bill)
                                        @if ($bill->status == 1)
                                            <div class="flex flex-row">
                                                <p class="mt-1 text-2xl font-semibold text-white">&#x20BA;
                                                    {{ $bill->nominal }}</p>
                                                <p
                                                    class="text-xs rounded-lg text-white h-4 px-1 bg-green-700 mt-3  ml-2">
                                                    Lunas</p>
                                            </div>
                                        @else
                                            <p class="mt-1 text-2xl font-semibold text-white">&#x20BA;
                                                {{ $bill->nominal }}</p>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="pl-0 ml-0 bg-sky-900 basis-1/5 rounded-r-2xl border-0 grid place-content-center">

                        <label for="storeBill{{ $billType->id }}">
                            <svg class="fill-white" id="billCheck{{ $billType->id }}" xmlns="http://www.w3.org/2000/svg"
                                height="2em" viewBox="0 0 512 512">
                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->

                                <path
                                    d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                            </svg>
                        </label>

                    </div>
                </div>



                @if (!$bills->where('bill_type_id', $billType->id)->first())
                    <div id="modal{{ $billType->id }}" class="hidden relative z-10" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div id="overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                        <div class="fixed inset-0 z-10 overflow-y-auto ">
                            <div
                                class=" flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">

                                <div
                                    class="w-full relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="bg-white px-4 pb-4 pt-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class=" text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                    id="modal-title">
                                                    Atur alokasi keuangan {{ $billType->bill_type }}</h3>
                                                <div class="mt-4">
                                                    <div class="sm:col-span-4">
                                                        <div class="mt-3">

                                                            <form action="/billing" method="post">
                                                                @csrf
                                                                <input type="hidden" name="status" value="status">
                                                                <input type="hidden" name="billTypeId"
                                                                    value="{{ $billType->id }}">
                                                                <div
                                                                    class="w-full flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                                    <span
                                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">&#x20BA;</span>
                                                                    <input type="text" name="nominal" id="nominal"
                                                                        autofocus
                                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                                        placeholder="2000">
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="gap-3 flex flex-row bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="submit"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Konfirmasi</button>
                                        </form>
                                        <button type="button" id="closeModal{{ $billType->id }}"
                                            class=" mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div id="modal{{ $billType->id }}" class="hidden relative z-10" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div id="overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                        <div class="fixed inset-0 z-10 overflow-y-auto ">
                            <div
                                class=" flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">

                                <div
                                    class="w-full relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="bg-white px-4 pb-4 pt-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class=" text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                    id="modal-title">
                                                    Edit nominal {{ $billType->bill_type }}</h3>
                                                <div class="mt-4">
                                                    <div class="sm:col-span-4">
                                                        <div class="mt-3">
                                                            <form action="/billing/{{ $bill->id }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="billId"
                                                                    value="{{ $bill->id }}">
                                                                <div
                                                                    class="w-full flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                                    <span
                                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">&#x20BA;</span>
                                                                    <input type="text" name="nominal" id="nominal"
                                                                        autofocus
                                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                                        placeholder="2000">
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="gap-3 flex flex-row bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="submit"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Konfirmasi</button>
                                        </form>
                                        <button type="button" id="closeModal{{ $billType->id }}"
                                            class=" mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <form action="/balance/{{ Auth::user()->id }}" method="post">
                @csrf
                @method('PUT')
                @foreach ($billTypes as $billType)
                    @foreach ($bills->where('bill_type_id', $billType->id) as $bill)
                        <input type="hidden" name="billId{{ $bill->id }}" value="{{ $bill->id }}">
                        <input id="storeBill{{ $billType->id }}" name="storeBill{{ $billType->id }}"
                            type="checkbox" value="{{ $bill->nominal }}"
                            class="hidden rounded-full border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    @endforeach
                @endforeach
                <button type="submit"
                    class="w-full h-14 border border-gray-400 rounded-2xl mb-5 text-center text-xl font-semibold">Bayar
                    tercentang</button>
            </form>

        </section>

    </div>

</x-app-layout>
