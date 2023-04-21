<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('product.create') }}">
                        @csrf
                        <div class="flex flex-col">
                            <label for="">商品名</label>
                            <input type="text" name="product_name" class="h-8 w-80 text-black">
                        </div>
                        <button class="px-5 py-1 bg-gray-900 mt-2">送信</button>
                    </form>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden mt-10 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-full">
                    <table class="table-auto w-full border-[1px] border-white rounded-sm">
                        <tr class="bg-gray-900 h-10 border-b-[1px] border-white">
                            <th>商品ID</th>
                            <th>商品名</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                        @foreach ($allProducts as $allProduct)
                            <tr class="odd:bg-gray-800 even:bg-gray-700 clickClass">
                                <td class="text-center">
                                    <input type="text" id="{{ $allProduct->id }}" value="{{ $allProduct->id }}" class="text-center bg-transparent outline-none border-none text-white" readonly>
                                </td>
                                <td class="text-center">
                                    <input type="text" value="{{ $allProduct->product_name }}" name="{{ $allProduct->product_name }}" class="text-center bg-transparent outline-none border-none text-white" readonly>
                                </td>
                                <td class="text-center">
                                    <form action="">
                                        @csrf
                                        <button type="button" class="edit inline-block px-3 py-1 bg-green-700 font-medium my-2 rounded-sm" id="a_{{ $allProduct->id }}">編集</button>
                                        <a href="" class="edit px-3 py-1 bg-green-700 font-medium my-2 rounded-sm hidden">OK</a>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="">
                                        @csrf
                                        <a href="" class="delete inline-block px-3 py-1 bg-red-700 font-medium my-2 rounded-sm">削除</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
