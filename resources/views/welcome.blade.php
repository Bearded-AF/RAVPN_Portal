<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif


            @csrf

            <div style="text-align:center;">
              Welcome to NetSec Team's RAVPN Web Portal!
            </div>







            <div style="padding:20px; padding-left:145px;">



                <x-button class="ml-4">
                  <a href="{{route('login')}}">  {{ __('Log in') }} </a>
                </x-button>

            </div>




    </x-authentication-card>
</x-guest-layout>
