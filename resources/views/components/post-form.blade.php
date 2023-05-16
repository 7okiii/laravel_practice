<div {{ $attributes->merge([ 'class' => 'bg-white w-full overflow-hidden shadow-md sm:rounded-lg mb-5']) }}>
    <div class="p-6 text-gray-900">
        <span class="text-lg font-semibold text-sky-600">新規投稿</span>
        <form method="POST" action="{{ route('post.create') }}">
            @csrf
            <div class="flex flex-col mb-2">
                <label for="">タイトル</label>
                <input type="text" name="title" class="h-9 w-80 text-black rounded-lg">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->get('product_name') as $error)
                            <li class="text-red-600">{{ __('messages.register_error') }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <x-button class="px-7 py-2 bg-gradient-to-r from-cyan-600 to-sky-700">登録</x-button>
        </form>
    </div>
</div>