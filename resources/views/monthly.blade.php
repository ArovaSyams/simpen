<x-app-layout>
    <div class="px-4">

        <p class="text-gray-500 text-sm font-light mb-4">Balance: &#x20BA;{{ $pocketMoney->balance }}</p>
        <h1 class="text-3xl font-bold text-center ">Belanja bulanan</h1>

        <section class="mt-6">

            <div id="openUangJajanBtn"
                class="w-full h-24 border-4 border-sky-900 rounded-2xl mb-5 p-4 pt-5 flex flex-row justify-between">
                <div>
                    <p class="text-base ">Sisa Uang Jajan <span class="text-gray-500">(balance - tagihan)</span></p>
                    <p class="text-2xl font-semibold">&#x20BA; {{ $pocketMoney->pocket_money }}</p>
                </div>


                <div class="mt-3">
                    <svg class="fill-sky-900" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 128 512">
                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            svg {
                                fill: #ffffff
                            }
                        </style>
                        <path
                            d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                    </svg>
                </div>
            </div>

            {{-- modal uang jajan --}}

            <div id="uangJajanModal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">

                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class=" fixed inset-0 z-10 overflow-y-auto">
                    <div class=" flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">

                        <div
                            class="w-full relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">

                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                            Kurangi uang jajan</h3>
                                        <div class="mt-2">
                                            <form action="/pocket-money/{{ $pocketMoney->id }}" method="POST">

                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="balanceId" value="{{ $pocketMoney->id }}">
                                                <div
                                                    class="mt-2 w-full flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <span
                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">&#x20BA;
                                                        {{ $pocketMoney->pocket_money }} - </span>
                                                    <input type="text" name="nominal" id="nominal"
                                                        autocomplete="none"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="100">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-sky-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-500 sm:ml-3 sm:w-auto">Kurangi</button>
                                </form>
                                <button type="button" id="closeUangJajanBtn"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($monthlies as $monthly)
                <div id="openAddedAlokasiBtn{{ $monthly->id }}"
                    class="w-full h-24 bg-sky-900 rounded-2xl mb-5 p-4 pt-5 flex flex-row justify-between">
                    <div>
                        <p class="text-base text-white ">{{ $monthly->monthlyType->monthly_type }}</p>
                        <p class="text-2xl font-semibold text-white">&#x20BA; {{ $monthly->nominal }}</p>
                    </div>

                    <div class="mt-3">
                        <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 128 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <style>
                                svg {
                                    fill: #ffffff
                                }
                            </style>
                            <path
                                d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                        </svg>
                    </div>
                </div>

                {{-- alokasi-modal --}}
                <div id="addedAlokasiModal{{ $monthly->id }}" class="hidden relative z-10"
                    aria-labelledby="modal-title" role="dialog" aria-modal="true">

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                    <div class=" fixed inset-0 z-10 overflow-y-auto">
                        <div
                            class=" flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">

                            <div
                                class="w-full relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">

                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                            <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                id="modal-title">
                                                {{ $monthly->monthlyType->monthly_type }}</h3>
                                            <div class="mt-2">

                                                <form action="/monthly/{{ $monthly->id }}" method="POST">

                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="monthlyId" value="{{ $monthly->id }}">
                                                    <div
                                                        class="mt-2 w-full flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                        <span
                                                            class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">&#x20BA;
                                                            {{ $monthly->nominal }} - </span>
                                                        <input type="text" name="nominal" id="nominal"
                                                            autocomplete="none"
                                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                            placeholder="100">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button type="submit"
                                        class="inline-flex w-full justify-center rounded-md bg-sky-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-500 sm:ml-3 sm:w-auto">Kurangi</button>
                                    </form>
                                    <button type="button" id="closeAddedAlokasiBtn{{ $monthly->id }}"
                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <button id="addAlokasiBtn" class="w-full h-16 border border-gray-400 rounded-2xl mb-5 flex flex-row">
                <svg class="m-4" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512">
                    <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <style>
                        svg {
                            fill: #11258d
                        }
                    </style>
                    <path
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                </svg>
                <p class="font-semibold text-lg self-center">Tambah/Edit alokasi uang</p>
            </button>
            {{-- <button id="editAlokasiBtn" class="w-full h-16 border border-gray-400 rounded-2xl mb-5 flex flex-row">
                <svg class="m-4" xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                <p class="font-semibold text-lg self-center">Edit alokasi uang</p>
            </button> --}}

            {{-- modal tambah alokasi --}}
            <div id="addAlokasiModal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">

                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class=" fixed inset-0 z-10 overflow-y-auto">
                    <div class=" flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">

                        <div
                            class="w-full relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">

                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                            Tambah/Edit alokasi keuangan</h3>
                                        <div class="mt-2">
                                            <form action="/monthly" method="POST">
                                                @csrf
                                                <select id="monthlyType" name="monthlyType"
                                                    class="w-full block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                    @foreach ($monthlyTypes as $monthlyType)
                                                        <option value="{{ $monthlyType->id }}">
                                                            {{ $monthlyType->monthly_type }}</option>
                                                    @endforeach
                                                </select>

                                                <div
                                                    class="mt-2 w-full flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <span
                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">&#x20BA;</span>
                                                    <input type="text" name="nominal" id="nominal"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="2000">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-sky-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-600 sm:ml-3 sm:w-auto">Tambahkan</button>
                                </form>
                                <button type="button" id="closeAlokasiBtn"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- edit alokasi modal --}}
            <div id="editAlokasiModal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">

                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class=" fixed inset-0 z-10 overflow-y-auto">
                    <div class=" flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">

                        <div
                            class="w-full relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">

                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                            Edit alokasi keuangan</h3>
                                        <div class="mt-2">
                                            <form action="/edit-monthly" method="POST">
                                                @csrf
                                                <select id="monthlyType" name="monthlyType"
                                                    class="w-full block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                    @foreach ($monthlyTypes as $monthlyType)
                                                        <option value="{{ $monthlyType->id }}">
                                                            {{ $monthlyType->monthly_type }}</option>
                                                    @endforeach
                                                </select>

                                                <div
                                                    class="mt-2 w-full flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <span
                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">&#x20BA;</span>
                                                    <input type="text" name="nominal" id="nominal"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                        placeholder="2000">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit"
                                    class="inline-flex w-full justify-center rounded-md bg-sky-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-600 sm:ml-3 sm:w-auto">Tambahkan</button>
                                </form>
                                <button type="button" id="closeEditAlokasiBtn"
                                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</x-app-layout>
