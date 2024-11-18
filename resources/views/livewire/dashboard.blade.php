<div class="bg-gray-600 min-h-screen">

    <header class="bg-gray-900 px-14">
        <div class="container-fluid flex items-center justify-end">
            <div class="flex items-center space-x-10 text-white bg-gray-900 py-3 px-4">
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2">
                            <img src="{{ asset('assets/user.png') }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 rounded-full">
                            <div class="pl-1">
                                <p class="text-sm text-start">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-start text-gray-400">{{ Auth::user()->role->name }}</p>
                            </div>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </header>
    
    <div class="container mx-auto px-6 py-8">
        <div class="bg-gray-800 rounded-lg shadow-lg p-6 max-w-md mx-auto mt-8">
            <div class="flex justify-center mb-6">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-500">
                    <img src="{{ auth()->user()->image_url ?? asset('assets/user.png') }}" alt="User"
                        class="w-full h-full object-cover">
                </div>
            </div>
            <div class="text-center text-white">
                <h2 class="text-2xl font-semibold">{{ auth()->user()->name }}</h2>
                <p class="text-lg text-gray-400">{{ auth()->user()->email }}</p>

                <div class="mt-4">
                    <span
                        class="inline-block px-4 py-1 rounded-full text-xs font-semibold {{ auth()->user()->status === '1' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                        {{ auth()->user()->status === '1' ? 'ACTIVE' : 'INACTIVE' }}
                    </span>
                </div>
            </div>
            <div class="mt-6 space-y-3">
                <div class="flex justify-between text-white">
                    <span class="font-semibold">Role:</span>
                    <span>{{ auth()->user()->role->name ?? 'No Role Assigned' }}</span>
                </div>
                <div class="flex justify-between text-white">
                    <span class="font-semibold">Phone:</span>
                    <span>{{ auth()->user()->contact_no ?? 'Not Provided' }}</span>
                </div>
                <div class="flex justify-between text-white">
                    <span class="font-semibold">Joined On:</span>
                    <span>{{ auth()->user()->created_at->format('F j, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>