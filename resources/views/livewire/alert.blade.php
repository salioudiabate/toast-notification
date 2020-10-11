<div>
    @if($shown)
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => { show = false; $dispatch('dismiss', false) }, {{ ($toast['autoDismiss']) ? ($toast['duration'] != 0 ? $toast['duration'] : config('toast-notification.duration')) : config('toast-notification.longDuration') }})"
            x-show="show"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="w-full flex justify-start items-center z-10000 px-4 py-1 my-2 relative shadow-lg pointer-events-auto border-t-4 border-l-2 border-gray-200
            @if($toast['type'] == 'danger') bg-danger text-white @endif
            @if($toast['type'] == 'default') bg-gray-500 text-white @endif
            @if($toast['type'] == 'info') bg-info text-white @endif
            @if($toast['type'] == 'success') bg-success text-white @endif
            @if($toast['type'] == 'warning') bg-warning text-white @endif"
            role="alert">
            @if($toast['type'] === 'default')
                @include('toastnotification::icons.alerts.default')
            @endif
            @if($toast['type'] === 'success')
                @include('toastnotification::icons.alerts.success')
            @endif
            @if($toast['type'] === 'warning')
                @include('toastnotification::icons.alerts.warning')
            @endif
            @if($toast['type'] === 'info')
                @include('toastnotification::icons.alerts.info')
            @endif
            @if($toast['type'] === 'danger')
                @include('toastnotification::icons.alerts.danger')
            @endif
            <div class="flex justify-center items-center px-4 sm:inline">{{ $toast['description'] }}</div>
            @if (! $toast['autoDismiss'])
                <span x-on:click="show = false; $dispatch('dismiss', false)" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            @endif
        </div>
    @endif
</div>