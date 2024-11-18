@if ($showRoleEditModal)
    <div x-data="{ showModal: @entangle('showRoleEditModal') }" x-show="showModal"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
        <div class="bg-gray-800 rounded-lg shadow-md w-96 py-3">
            <div class="flex justify-between items-center border-b border-gray-600 pb-3 px-4">
                <h4 class="text-lg font-bold text-white">Edit Role</h4>
                <button @click="showModal = false" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            <div class="mt-4 space-y-4 px-4">
                <!-- Name Field -->
                <div>
                    <label for="editRoleName" class="block text-gray-400 mb-1 text-sm">Name</label>
                    <input type="text" id="editRoleName" wire:model="name" wire:keyup="generateSlug"
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" required>
                    @error('name') <!-- Show error message for 'name' -->
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Slug Field -->
                <div>
                    <label for="editRoleSlug" class="block text-gray-400 mb-1 text-sm">Slug</label>
                    <input type="text" id="editRoleSlug" wire:model="slug" disabled
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-gray-400 text-sm cursor-not-allowed">
                    @error('slug') <!-- Show error message for 'slug' -->
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status Field -->
                <div>
                    <label for="editRoleStatus" class="block text-gray-400 mb-1 text-sm">Status</label>
                    <select id="editRoleStatus" wire:model="status"
                        class="w-full py-1 px-3 rounded border border-gray-700 bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status') <!-- Show error message for 'status' -->
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-5 flex justify-end space-x-3 px-3 mb-2">
                <button @click="showModal = false"
                    class="px-4 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">Cancel</button>
                <button wire:click="updateRole"
                    class="px-4 py-1 bg-green-500 text-white rounded hover:bg-green-600 text-sm">Save</button>
            </div>
        </div>
    </div>
@endif
