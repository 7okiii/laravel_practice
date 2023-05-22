<div {{ $attributes->merge([ 'class' => 'bg-white w-full overflow-hidden shadow-md sm:rounded-lg mb-5']) }}>
    <div class="p-6 text-gray-900">
        <span class="text-lg font-semibold text-sky-600">新規投稿</span>
        <form method="POST" action="{{ route('post.create') }}">
            @csrf
            <div class="flex flex-col mb-5">
                <label for="">タイトル</label>
                <input type="text" name="title" class="h-9 w-80 text-black rounded-md">
            </div>
            <div class="flex flex-col mb-2">
                <label for="">内容</label>
                <div id="quill_editor" class="h-60 mb-5"></div>
            </div>
            <div class="flex flex-col mb-5">
                <label for="">画像</label>
                <input type="file" name="upload_image">
            </div>
            <x-button class="px-7 py-2 bg-gradient-to-r from-cyan-600 to-sky-700">投稿</x-button>
        </form>
    </div>
</div>