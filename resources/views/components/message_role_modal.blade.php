<div x-data="{ showModal: @entangle('showRoleNotification'), loading: false }" 
    x-show="showModal"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60"
    style="display: none;" 
    @keydown.escape.window="showModal = false">
    
    <div class="bg-gray-800 p-8 py-5 rounded-lg shadow-lg max-w-sm w-full text-center">
        
        <div x-show="loading" class="flex justify-center mb-4">
            <iframe src="https://lottie.host/embed/a2414ce6-873d-4622-b4c6-8c3ccd0a8217/WMiVWZkvKK.json"></iframe>
        </div>

        <div x-show="!loading" class="flex justify-center mb-4">
            <template x-if="$wire.notificationTitle === 'Success'">
                <iframe x-bind:key="$wire.notificationTitle + '-success'"
                        src="https://lottie.host/embed/dab6b1c7-e970-40d7-8dc4-abc55be4c2e9/NgCJxfteSL.json">
                </iframe>
            </template>
            <template x-if="$wire.notificationTitle === 'Error'">
                <iframe x-bind:key="$wire.notificationTitle + '-error'"
                        src="https://lottie.host/embed/b0a89f2b-78bd-4f15-99fb-16e2b828ce89/zKPx6VsPm5.json">
                </iframe>
            </template>
        </div>


        <h2 class="text-xl font-semibold text-white mb-2" x-show="!loading" x-text="$wire.notificationTitle"></h2>
        <p class="text-sm text-gray-300 mb-6" x-show="!loading" x-html="$wire.notificationMessage"></p>

        <div class="flex justify-center">
            <button 
                :class="{
                    'bg-green-600 hover:bg-green-500': $wire.notificationTitle === 'Success',
                    'bg-red-600 hover:bg-red-500': $wire.notificationTitle === 'Error'
                }"
                class="px-5 py-2 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-opacity-75 transition duration-200"
                @click="showModal = false"
            >
                Close
            </button>
        </div>
    </div>
</div>
