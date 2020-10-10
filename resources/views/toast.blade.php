<div>
    @if(session()->has('ndoto_toast_notification') && session()->get('ndoto_toast_notification.model') == 'toast')
        <div class="fixed inset-0 z-10000 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
            <div
                x-data="{ show: true }"
                x-init="setTimeout(() => { show = false }, {{ (session()->get('ndoto_toast_notification.autoDismiss')) ? (session()->get('ndoto_toast_notification.duration') != 0 ? session()->get('ndoto_toast_notification.duration') : config('toast-notification.duration')) : config('toast-notification.longDuration') }})"
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
                            @if(session()->get('ndoto_toast_notification.type') === 'default')
                                @include('toastnotification::icons.default')
                            @endif
                            @if(session()->get('ndoto_toast_notification.type') === 'success')
                                @include('toastnotification::icons.success')
                            @endif
                            @if(session()->get('ndoto_toast_notification.type') === 'warning')
                                @include('toastnotification::icons.warning')
                            @endif
                            @if(session()->get('ndoto_toast_notification.type') === 'info')
                                @include('toastnotification::icons.info')
                            @endif
                            @if(session()->get('ndoto_toast_notification.type') === 'danger')
                                @include('toastnotification::icons.danger')
                            @endif
                            <div class="ml-4 w-0 flex-1">
                                <p class="text-base leading-5 font-medium capitalize
                                    @if(session()->get('ndoto_toast_notification.type') === 'danger') text-danger @endif
                                @if(session()->get('ndoto_toast_notification.type') === 'default') text-gray-500 @endif
                                @if(session()->get('ndoto_toast_notification.type') === 'info') text-info @endif
                                @if(session()->get('ndoto_toast_notification.type') === 'success') text-success @endif
                                @if(session()->get('ndoto_toast_notification.type') === 'warning') text-warning @endif
                                        ">
                                    {{ session()->get('ndoto_toast_notification.title') ?? session()->get('ndoto_toast_notification.type') }}
                                </p>
                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    {{ session()->get('ndoto_toast_notification.description') }}
                                </p>
                            </div>
                            @if (! session()->get('ndoto_toast_notification.autoDismiss'))
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button x-on:click="show = false" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
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