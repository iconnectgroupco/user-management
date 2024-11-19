<div class="min-h-screen bg-gray-900 text-gray-100 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-gray-800 shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="mt-12 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl font-extrabold text-white">Welcome</h1>

                <main class="flex-grow w-full mt-8">
                    <div>
                        @if ($showSignup)
                            @livewire('auth.signup')
                            <div class="text-center mt-4">
                                <button wire:click="switchToLogin" class="text-indigo-400 hover:underline">
                                    Already have an account? Log in
                                </button>
                            </div>
                        @else
                            @livewire('auth.login')
                            <div class="text-center mt-4">
                                <button wire:click="switchToSignup" class="text-indigo-400 hover:underline">
                                    Don't have an account? Sign up
                                </button>
                            </div>
                        @endif
                    </div>
                </main>
            </div>
        </div>
        <div class="flex-1 bg-indigo-900 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
            </div>
        </div>
    </div>
</div>