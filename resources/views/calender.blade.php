<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('カレンダー') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div id="app">
            <div class="m-auto w-4/5 p-5 bg-white rounded-lg border border-gray-500 shadow-md">
                <div id='calendar'></div>
            </div>
        </div>

    </div>

    {{-- npm installしてるがうまく動いていないので一時的にCDN使う --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });
    </script>
</x-app-layout>