<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Verify Email') . ' (' . auth()->user()->email . ') ' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <x-card class="flex flex-col justify-between p-6 mx-5 shadow md:mx-0 shadow-gray-400">

                    <x-card.title>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Open Email Verification Message') }}
                        </h2>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>
                    </x-card.title>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="flex items-center justify-between mt-4">

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-primary-button>
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </div>
                        </form>


                        <div class="flex items-center justify-center gap-6 text-sm text-gray-600">
                            <a href="{{ route('profile.edit') }}"
                                class="block underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit
                                Profile</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>


                    </div>

                </x-card>
            </div>

        </div>
    </div>
</x-app-layout>
