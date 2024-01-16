<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage your fertilizers
            </h2>
        </div>

    </x-slot>

    <!-- display success message after successful addition of fertilizer -->
    @if(session('success'))
    <div class="flex justify-center my-5">
        <div class="bg-green-100  text-green-700 px-6 py-1 rounded-md">
            <h1 class="text-xl font-bold ">{{ session('success') }}</h1>
        </div>
    </div>
    @endif


    <!-- display error message after unsuccessful addition of fertilizer -->
    @if(session('error'))
    <div class="flex justify-center my-5">
        <div class="bg-red-100  text-red-700 px-6 py-1 rounded-md">
            <h1 class="text-xl font-bold ">{{ session('error') }}</h1>
        </div>
    </div>

    @endif

    <!--choice to add new, update existing, delete existing, view existing fertilizers  -->
    <div class="flex justify-center  my-5  ">
        <div class="flex flex-col items-center bg-white rounded-lg shadow-xl   md:flex-row md:space-x-4">
            <a href="{{ url('/sup-fertilizer/create') }}"
                class="fertilizers hover:bg-gray-700 font-bold py-2 px-7 rounded ">
                <h1>Add new fertilizer</h1>
            </a>
        </div>

    </div>

    <!-- list of all existing fertilizers -->
    <div class="flex justify-center  my-5  ">
        <div class="flex flex-col items-center bg-white rounded-lg shadow-xl px-12 py-7   ">
            <h1 class="text-2xl font-bold mb-2">List of all existing fertilizers</h1>
            <table class="table-auto border-collapse border border-green-800">
                <thead>
                    <tr>
                        <th class="border border-green-600 px-4 py-2">Fertilizer Name</th>
                        <th class="border border-green-600 px-4 py-2">Fertilizer Price</th>
                        <th class="border border-green-600 px-4 py-2">Fertilizer Description</th>
                        <th class="border border-green-600 px-4 py-2">Fertilizer Image</th>
                        <th class="border border-green-600 px-4 py-2">Added On</th>
                        <th class="border border-green-600 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fertilizers as $fertilizer)
                    <tr>
                        <td class="border border-green-600 px-4 py-2">{{$fertilizer->name}}</td>
                        <td class="border border-green-600 px-4 py-2">Ksh {{$fertilizer->price}}</td>
                        <td class="border border-green-600 px-4 py-2">{{$fertilizer->description}}</td>
                        <td class="border border-green-600 px-4 py-2">
                            <img src="{{ asset('storage/images/fertilizers/'.$fertilizer->image_file_path) }}"
                                alt="image" width="100px" height="100px">
                        </td>
                        <td class="border border-green-300 px-4 py-2">{{$fertilizer->created_at}}</td>

                        <td class="border border-green-600 px-4 py-2 ">
                            <div flex flex-col>
                                <form action="{{ route('sup-fertilizer.destroy', $fertilizer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Delete
                                    </button>
                                </form>
                                <div class="mt-4"></div> <!-- Add a margin of 1rem (16px) -->
                                <a href="{{ url('/sup-fertilizer/'.$fertilizer->id .'/edit') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</a>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
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
</x-app-layout>