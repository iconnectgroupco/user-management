<div>
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
    <nav class="bg-gray-800 py-3 px-12">
        <div class="container-fluid px-6">
            <ul class="flex space-x-6 text-white text-sm">
                <li>
                    <button wire:click="switchView('user-management')"
                        class="flex items-center space-x-2 hover:text-gray-400 {{ $currentView === 'user-management' ? 'font-bold' : 'text-gray-400' }}">
                        <i class="fas fa-users"></i>
                        <span>User Management</span>
                    </button>
                </li>
                <li>
                    <button wire:click="switchView('role-management')"
                        class="flex items-center space-x-2 hover:text-gray-400 {{ $currentView === 'role-management' ? 'font-bold' : 'text-gray-400' }}">
                        <i class="fas fa-user-tag"></i>
                        <span>Role Management</span>
                    </button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Dynamic Component Rendering -->
    <div class="mt-0">
        @if($currentView === 'user-management')
            @livewire('admin.user-management')
        @elseif($currentView === 'role-management')
            @livewire('admin.role-management')
        @endif
    </div>

</div>