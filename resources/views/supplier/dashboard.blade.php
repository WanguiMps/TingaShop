<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage your shop
            </h2>
        </div>
        <div class="  flex space-x-3 bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <a href="{{url('/sup-fertilizer')}}" class=" fertilizers hover:bg-gray-700   font-bold py-2 px-4 rounded">
                <h1>
                    Fertilizers
                </h1>

            </a>
            <a href="{{url('/equipment')}}" class=" equipment hover:bg-gray-700  font-bold py-2 px-4 rounded">
                <h1>
                    Equipment
                </h1>
            </a>
            <a href="{{url('/orders')}}" class=" equipment hover:bg-gray-700  font-bold py-2 px-4 rounded">
                <h1>
                    Orders
                </h1>
            </a>
        </div>

        <style>
            .fertilizers,
            .equipment {
                font-size: 1.3rem;
                font-weight: bold;
                color: #1E40AF;
            }

            .fertilizers:hover,
            .equipment:hover {
                color: #78C1F3;
            }
        </style>
    </x-slot>
</x-app-layout>