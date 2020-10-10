<div>
    @if($shown)
        <div class="fixed inset-0 z-10000 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
            <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => { show = false; $wire.dismiss(); }, {{ getToastDuration($toast) }})"
                    x-show="show"
                    x-transition:enter="transform ease-out duration-300 transition"
                    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="max-w-sm w-full shadow-lg rounded-lg pointer-events-auto border-t-4 border-l-2 border-gray-300 bg-white">
                <div class="relative rounded-lg shadow-xs overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            @if($toast['type'] === 'default')
                                @include('toastnotification::icons.default')
                            @endif
                            @if($toast['type'] === 'success')
                                @include('toastnotification::icons.success')
                            @endif
                            @if($toast['type'] === 'warning')
                                @include('toastnotification::icons.warning')
                            @endif
                            @if($toast['type'] === 'info')
                                @include('toastnotification::icons.info')
                            @endif
                            @if($toast['type'] === 'danger')
                                @include('toastnotification::icons.danger')
                            @endif
                            <div class="ml-4 w-0 flex-1">
                                <p class="text-base leading-5 font-medium capitalize
                                    @if($toast['type'] === 'danger') text-danger @endif
                                @if($toast['type'] === 'default') text-gray-500 @endif
                                @if($toast['type'] === 'info') text-info @endif
                                @if($toast['type'] === 'success') text-success @endif
                                @if($toast['type'] === 'warning') text-warning @endif
                                        ">
                                    {{ $toast['title'] ?? $toast['type'] }}
                                </p>
                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    {{ $toast['description'] }}
                                </p>
                            </div>
                            @if (! $toast['autoDismiss'])
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button x-on:click="show = false; $wire.dismiss()" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                        @include('toastnotification::icons.close')
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>