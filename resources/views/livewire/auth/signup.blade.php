<div class="mt-12 flex flex-col items-center">
    <!-- Success Modal -->
    @if (session()->has('message'))
        <div class="fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                <h3 class="text-xl font-semibold text-green-500 mb-4">Account Created Successfully!</h3>
                <p class="text-gray-700">Your account has been created successfully. Click OK to continue.</p>
                <div class="mt-4 text-right">
                    <button wire:click="redirectToLogin"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                        OK
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="w-full flex-1 mt-8">
        <div class="mx-auto max-w-xs">
            <!-- Name -->
            <input wire:model="name"
                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-gray-800"
                type="text" placeholder="Name" maxlength="255" />
            @error('name') 
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <!-- Email -->
            <input wire:model="email"
                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-gray-800 mt-5"
                type="email" placeholder="Email" maxlength="255" />
            @error('email') 
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <!-- Role Dropdown -->
            <select wire:model="role_id"
                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-gray-800 mt-5">
                <option value="">Select a Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') 
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <!-- Contact Number -->
            <input wire:model="contact_no"
                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-gray-800 mt-5"
                type="text" placeholder="Contact Number" maxlength="15" />
            @error('contact_no') 
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <div x-data="{ showPassword: false }" class="relative">
                <input :type="showPassword ? 'text' : 'password'" wire:model="password"
                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-gray-800 mt-5"
                    type="password" placeholder="Password" maxlength="12" />
                <button type="button" @click="showPassword = !showPassword"
                    class="absolute right-0 top-[50%] pr-3 flex items-center text-gray-400 focus:outline-none">
                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M22 12.0002C20.2531 15.5764 15.8775 19 11.9998 19C8.12201 19 3.74646 15.5764 2 11.9998"
                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M22 12.0002C20.2531 8.42398 15.8782 5 12.0005 5C8.1227 5 3.74646 8.42314 2 11.9998"
                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path
                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M4 4L9.87868 9.87868M20 20L14.1213 14.1213M9.87868 9.87868C9.33579 10.4216 9 11.1716 9 12C9 13.6569 10.3431 15 12 15C12.8284 15 13.5784 14.6642 14.1213 14.1213M9.87868 9.87868L14.1213 14.1213M6.76821 6.76821C4.72843 8.09899 2.96378 10.026 2 11.9998C3.74646 15.5764 8.12201 19 11.9998 19C13.7376 19 15.5753 18.3124 17.2317 17.2317M9.76138 5.34717C10.5114 5.12316 11.2649 5 12.0005 5C15.8782 5 20.2531 8.42398 22 12.0002C21.448 13.1302 20.6336 14.2449 19.6554 15.2412"
                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            @error('password') 
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <!-- Signup Button -->
            <div class="mt-5">
                <button wire:click="signup"
                    class="tracking-wide font-semibold text-gray-100 w-full py-4 rounded-lg bg-indigo-700 hover:bg-indigo-600 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                    <span class="ml-3">Sign Up</span>
                </button>
            </div>
        </div>
    </div>
</div>
