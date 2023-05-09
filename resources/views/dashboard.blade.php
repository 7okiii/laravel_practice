<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg border-2 border-gray-500 mb-5">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('product.create') }}">
                        @csrf
                        <div class="flex flex-col">
                            <label for="">商品名</label>
                            <input type="text" name="product_name" class="h-9 w-80 text-black rounded-lg">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-600">{{ __('messages.validation_error') }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button class="px-7 py-2 bg-gradient-to-r from-cyan-600 to-sky-700 text-white font-medium outline-none mt-2 focus:ring-1 hover:opacity-90 rounded-lg">送信</button>
                    </form>
                </div>
            </div>
            <div class="flex justify-end items-center">
                <a href="/get_csv" class="text-white font-medium px-5 py-2 bg-gradient-to-tr from-orange-400 to-pink-500 outline-none focus:ring-1 hover:opacity-90 rounded-md">CSV出力</a>
            </div>
            <div class="bg-white overflow-hidden mt-1 shadow-md sm:rounded-lg border-2 border-gray-500">
                <div class="p-3 sm:p-6 text-gray-900 w-full">
                    <table class="grid table-auto w-full border-[1px] border-white">
                        <tbody class="rounded-lg">

                            <tr class="grid grid-cols-6 items-center bg-gradient-to-br from-gray-600 to-gray-800 h-10 border-[1px] border-gray-800 text-white drop-shadow-lg rounded-t-lg">
                                <th class="col-span-3 sm:col-span-2">商品ID</th>
                                <th class="col-span-3 sm:col-span-2">商品名</th>
                                <th class="hidden sm:grid sm:col-span-1">編集</th>
                                <th class="hidden sm:grid sm:col-span-1">削除</th>
                            </tr>
                            @foreach ($allProducts as $allProduct)
                                <tr class="grid grid-cols-6 items-center odd:bg-white even:bg-gray-100 border-b-[1px] border-x-[1px] border-gray-500" id="row_{{ $allProduct->id }}">
                                    <td class="col-span-3 sm:col-span-2 text-center">
                                        <input type="text" id="{{ $allProduct->id }}" value="{{ $allProduct->id }}" class="text-center w-full bg-transparent outline-none border-none rounded-lg" readonly>
                                    </td>
                                    <td class="col-span-3 sm:col-span-2 text-center">
                                        <input type="text" value="{{ $allProduct->product_name }}" id="product_name_{{ $allProduct->id }}" class="product_name w-full text-center bg-transparent outline-none border-none rounded-lg" readonly>
                                    </td>
                                    <td class="col-span-3 sm:col-span-1 text-center">
                                        <button class="showOkBtn px-4 py-2 bg-gradient-to-tr from-lime-500 to-green-600 text-white text-sm font-bold my-2 hover:opacity-90 focus:ring-1 rounded-lg" id="showOkBtn_{{ $allProduct->id }}">編集</button>
                                        <button class="clickClass px-4 py-2 bg-gradient-to-tr from-teal-500 to-green-600 text-white text-sm font-bold my-2 hover:opacity-90 focus:ring-1 rounded-lg hidden" id="product_{{ $allProduct->id }}">OK</button>
                                    </td>
                                    <td class="col-span-3 sm:col-span-1 text-center">
                                        <button class="deleteBtn px-4 py-2 bg-gradient-to-tr from-rose-500 to-red-600 text-white text-sm font-bold my-2 focus:ring-1 hover:opacity-90 rounded-lg" id="deleteBtn_{{ $allProduct->id }}">削除</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </tbody>
                    <div class="mt-3">
                        {{ $allProducts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
