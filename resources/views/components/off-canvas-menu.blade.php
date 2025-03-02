<div>
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div
        x-show="showSidebar"
        class="fixed inset-0 z-40 flex md:hidden"
        role="dialog"
        aria-modal="true"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div
            x-show="showSidebar"
            class="fixed inset-0 bg-gray-600 bg-opacity-75"
            aria-hidden="true"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
        ></div>

        <div
            x-show="showSidebar"
            class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-gray-800"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
        >
            <div
                x-show="showSidebar"
                class="absolute top-0 right-0 pt-2 -mr-12"
                x-transition:enter="ease-in-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
                <button
                    @click="showSidebar = false"
                    type="button"
                    class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-hidden focus:ring-2 focus:ring-inset focus:ring-white"
                >
                    <span class="sr-only">Close sidebar</span>
                    <x-heroicon-c-x-mark class="w-6 h-6 text-white" />
                </button>
            </div>

            <x-sidebar-content />
        </div>
    </div>

    <div
        class="shrink-0 w-14"
        aria-hidden="true"
    >
        <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
</div>
