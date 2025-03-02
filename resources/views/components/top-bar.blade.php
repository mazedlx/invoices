<div class="sticky top-0 z-10 flex shrink-0 h-16 bg-white shadow-sm">
    <button
        @click="showSidebar = true"
        type="button"
        class="px-4 text-gray-500 border-r border-gray-200 focus:outline-hidden focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
    >
        <span class="sr-only">Open sidebar</span>
        <x-heroicon-s-bars-3-bottom-left class="w-6 h-6" />
    </button>

    <div class="flex justify-end flex-1 px-4 ">
        <div
            @click.away="showDropdown = false"
            class="flex items-center ml-4 md:ml-6"
        >
            <!-- Profile dropdown -->
            <div class="relative ml-3">
                <div>
                    <button
                        @click="showDropdown = !showDropdown"
                        type="button"
                        class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        id="user-menu-button"
                        aria-expanded="false"
                        aria-haspopup="true"
                    >
                        <span class="sr-only">Open user menu</span>
                        <div class="flex items-center justify-center w-8 h-8 text-white bg-gray-800 rounded-full">CL
                        </div>
                    </button>
                </div>

                <div
                    x-show="showDropdown"
                    class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-hidden"
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="user-menu-button"
                    tabindex="-1"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                >
                    <a
                        href="#"
                        @click="$refs.logoutForm.submit()"
                        class="block px-4 py-2 text-sm text-gray-700"
                        role="menuitem"
                        tabindex="-1"
                    >Sign out</a>
                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        class="hidden"
                        x-ref="logoutForm"
                    >@csrf</form>
                </div>
            </div>
        </div>
    </div>
</div>
