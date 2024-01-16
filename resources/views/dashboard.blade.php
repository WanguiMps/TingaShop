<x-app-layout>

    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl  p-5">
                <h1 class="text-2xl font-bold">Welcome {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>

    <!-- Create links to log in as supplier or client -->
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="flex  flex-col items-center bg-white overflow-hidden shadow-xl  p-5">
                <h1 class="text-2xl font-bold">What would you like to do?</h1>
                <div class="flex justify-center">
                    <div class="p-5">
                        <a href="{{ route('supplier.dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Access Supplier Dashboard
                        </a>
                    </div>
                    <div class="p-5">
                        <a href="{{ route('client.create-client') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Access Client Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>