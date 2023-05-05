<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-2 border-gray-500">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('product.create') }}">
                        @csrf
                        <div class="flex flex-col">
                            <label for="">商品名</label>
                            <input type="text" name="product_name" class="h-8 w-80 text-black rounded-sm">
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
                        <button class="px-5 py-1 border-[1px] bg-gradient-to-r from-sky-600 to-sky-700 text-white font-medium border-gray-600 shadow-md shadow-gray-300 mt-2 rounded-sm">送信</button>
                    </form>
                </div>
            </div>
            <div class="bg-white overflow-hidden mt-10 shadow-sm sm:rounded-lg border-2 border-gray-500">
                <div class="p-6 text-gray-900 w-full">
                    <table class="table-auto w-full border-[1px] border-white">
                        <tr class="bg-gradient-to-br from-gray-600 to-gray-800 h-10 border-[1px] border-gray-800 text-white drop-shadow-lg">
                            <th>商品ID</th>
                            <th>商品名</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                        @foreach ($allProducts as $allProduct)
                            <tr class="odd:bg-white even:bg-gray-100 border-[1px] border-gray-500" id="row_{{ $allProduct->id }}">
                                <td class="text-center">
                                    <input type="text" id="{{ $allProduct->id }}" value="{{ $allProduct->id }}" class="text-center bg-transparent outline-none border-none" readonly>
                                </td>
                                <td class="text-center">
                                    <input type="text" value="{{ $allProduct->product_name }}" id="product_name_{{ $allProduct->id }}" class="product_name text-center bg-transparent outline-none border-none rounded-sm" readonly>
                                </td>
                                <td class="text-center">
                                    {{-- <button class="showOkBtn px-3 py-1 bg-green-600 text-white font-medium my-2 rounded-sm" id="showOkBtn_{{ $allProduct->id }}">編集</button> --}}
                                    <button class="showOkBtn px-3 py-1 border-[1px] border-green-800 bg-gradient-to-tr from-green-500 to-green-600 shadow-md shadow-gray-300 text-white text-sm font-bold my-2 rounded-sm" id="showOkBtn_{{ $allProduct->id }}">編集</button>
                                    <button class="clickClass px-3 py-1 border-[1px] border-green-800 bg-gradient-to-tr from-green-500 to-green-600 shadow-md shadow-gray-300 text-white text-sm font-bold my-2 rounded-sm hidden" id="product_{{ $allProduct->id }}">OK</button>
                                </td>
                                <td class="text-center">
                                    <button class="deleteBtn px-3 py-1 border-[1px] border-red-800 bg-gradient-to-tr from-red-500 to-red-600 shadow-md shadow-gray-300 text-white text-sm font-bold my-2 rounded-sm" id="deleteBtn_{{ $allProduct->id }}">削除</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
