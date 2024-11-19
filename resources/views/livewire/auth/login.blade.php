<div class="mt-12 flex flex-col items-center">
    <!-- Show error message if it exists -->
    @if ($errorMessage)
        <div class="text-red-500 text-sm font-semibold mb-4">
            {{ $errorMessage }}
        </div>
    @endif

    <div class="w-full flex-1 mt-8">
        <div class="mx-auto max-w-xs">
            <!-- Email Input -->
            <input wire:model="email"
                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-gray-800"
                type="email" placeholder="Email" maxlength="255" />
            @error('email')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <!-- Password Input with Eye Icon -->
            <div x-data="{ showPassword: false }" class="relative">
                <input :type="showPassword ? 'text' : 'password'" wire:model="password"
                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-gray-800 mt-5"
                    type="password" placeholder="Password" maxlength="12" />

                <!-- Eye icon (visible when password is hidden) -->
                <button type="button" @click="showPassword = !showPassword"
                    class="absolute right-0 top-[63%] transform -translate-y-1/2 pr-3 flex items-center text-gray-400 focus:outline-none">
                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M22 12.0002C20.2531 15.5764 15.8775 19 11.9998 19C8.12201 19 3.74646 15.5764 2 11.9998"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M22 12.0002C20.2531 8.42398 15.8782 5 12.0005 5C8.1227 5 3.74646 8.42314 2 11.9998"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path
                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>

                    <!-- Eye slash icon (visible when password is shown) -->
                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M4 4L9.87868 9.87868M20 20L14.1213 14.1213M9.87868 9.87868C9.33579 10.4216 9 11.1716 9 12C9 13.6569 10.3431 15 12 15C12.8284 15 13.5784 14.6642 14.1213 14.1213M9.87868 9.87868L14.1213 14.1213M6.76821 6.76821C4.72843 8.09899 2.96378 10.026 2 11.9998C3.74646 15.5764 8.12201 19 11.9998 19C13.7376 19 15.5753 18.3124 17.2317 17.2317M9.76138 5.34717C10.5114 5.12316 11.2649 5 12.0005 5C15.8782 5 20.2531 8.42398 22 12.0002C21.448 13.1302 20.6336 14.2449 19.6554 15.2412"
                            stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            @error('password')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <!-- Login Button -->
            <div class="mt-5">
                <button x-data="{ loading: false }" :class="loading ? 'bg-indigo-700' : 'bg-indigo-600'"
                    :disabled="loading" @click="loading = true; $wire.login().then(() => { loading = false; })"
                    class="tracking-wide font-semibold text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">

                    <template x-if="loading">
                        <svg class="w-6 h-6 -ml-2 animate-spin" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                            <circle cx="8.5" cy="7" r="4" />
                            <path d="M20 8v6M23 11h-6" />
                        </svg>
                    </template>

                    <template x-if="!loading">
                        <span class="ml-3">Login</span>
                    </template>
                </button>
            </div>
        </div>
    </div>
</div>