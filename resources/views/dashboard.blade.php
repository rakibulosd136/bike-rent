<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Welcome, {{ auth()->user()->name }}! 🎉</h3>
                    <p>You are logged in to Dhaka Bike Rent System.</p>

                    <div style="margin-top: 20px;">
                        <a href="{{ route('booking.index') }}" 
                           style="background:#0b6fa4; color:white; padding:12px 25px; border-radius:5px; text-decoration:none; margin-right:10px;">
                            🏍️ Book a Bike
                        </a>

                        @if(auth()->user()->email === 'admin@admin.com')
                        <a href="{{ route('admin.index') }}" 
                           style="background:green; color:white; padding:12px 25px; border-radius:5px; text-decoration:none;">
                            🔧 Admin Panel
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>