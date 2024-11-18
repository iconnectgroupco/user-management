<!-- Modal -->
<div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
    <div class="bg-gray-800 rounded-lg shadow-lg w-1/3 py-3">
        <div class="flex justify-between items-center mb-4 border-b border-gray-600 pb-3 px-5">
            <h3 class="text-lg font-bold text-white">Add New Role</h3>
            <button @click="showModal = false" class="text-gray-400 hover:text-white flex items-center space-x-1">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        <!-- Form -->
        <form wire:submit.prevent="addRole" class="px-5">
            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-400 mb-2">Name</label>
                <input type="text" id="name" x-model="name"
                    @input="slug = name.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '')"
                    wire:model.defer="name"
                    class="w-full bg-gray-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-sm text-gray-400 mb-2">Slug</label>
                <input type="text" id="slug" x-model="slug" readonly wire:model.defer="slug"
                    @input="$wire.set('slug', name.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, ''))"
                    class="w-full bg-gray-700 text-gray-400 px-4 py-2 rounded cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('slug')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm text-gray-400 mb-2">Status</label>
                <select id="status" x-model="status" wire:model.defer="status"
                    class="w-full bg-gray-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled selected>Choose...</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end space-x-4">
                <button wire:click="$set('showModal', false)" type="button"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 flex items-center space-x-1">
                    <i class="fa-solid fa-times-circle pr-1"></i>
                    <span>Cancel</span>
                </button>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center space-x-1">
                    <i class="fa-solid fa-save pr-1"></i>
                    <span>Save</span>
                </button>
            </div>
        </form>
    </div>
</div>