<div class="bg-gray-600 min-h-screen flex flex-col py-10"
    x-data="{ showModal: $wire.entangle('showModal'), name: '', slug: '' }">

    <!-- Add Role Button -->
    <div class="xl:px-12 flex justify-end mb-4">
        <button @click="showModal = true"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center space-x-2 mx-6">
            <i class="fa-solid fa-plus"></i>
            <span>Add Role</span>
        </button>
    </div>

    <div class="xl:px-12 flex-grow">
        <div class="w-full px-6 pb-14 pt-3">
            <div class="bg-gray-800 rounded-lg shadow-md">
                <div class="flex items-center border-b border-gray-600 p-3 pl-10">
                    <h4 class="text-lg font-bold text-white flex-grow">All Roles</h4>
                </div>
                <div class="px-10 py-7">
                    @if($roles->isEmpty())
                        <div class="text-center text-gray-400 py-4">
                            No roles found.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto text-gray-300 rounded-lg">
                                <thead>
                                    <tr class="border-b border-gray-600">
                                        <th class="px-4 py-4 text-center">ID</th>
                                        <th class="px-4 py-4 text-center">Name</th>
                                        <th class="px-4 py-4 text-center">Slug</th>
                                        <th class="px-4 py-4 text-center">User Count</th>
                                        <th class="px-4 py-4 text-center">Status</th>
                                        <th class="px-4 py-4 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($roles as $role)
                                        <tr class="hover:bg-gray-600 border-b border-gray-600">
                                            <td class="px-4 py-2 text-center text-sm">#role_{{ $role->id }}</td>
                                            <td class="px-4 py-2 text-center text-sm">{{ $role->name }}</td>
                                            <td class="px-4 py-2 text-center text-sm">{{ $role->slug }}</td>
                                            <td class="px-4 py-2 text-center text-sm">{{ $role->users_count }}</td>
                                            <td class="px-4 py-2 text-center text-sm">
                                                <span
                                                    class="inline-block px-4 py-1 rounded-full text-sm {{ $role->status === '1' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                                    {{ $role->status === '1' ? 'ACTIVE' : 'INACTIVE' }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-2 text-center">
                                                <button wire:click="viewRole({{ $role->id }})" class="py-0 px-1 rounded-lg">
                                                    <i class="fa-solid fa-pen-to-square text-blue-600"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('components.message_role_modal')
    @include('components.add_new_role')
    @include('components.edit_role_management')

</div>