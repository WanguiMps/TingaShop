<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register as a supplier
        </h2>
    </x-slot>
    <div>
        <form method="POST" action="{{ url('create-supplier') }}">
            @csrf
            <!-- if any error, display it -->
            <p>
                @if (session('error'))
            <div class="bg-red-500 text-white p-4 mb-4">
                {{ session('error') }}
            </div>
            @endif
            </p>
            <div class="container">
                <label for="phone_number">Phone Number</label>
                <input type="number" min="1" name="phone_number" id="phone-number" :value="old('phone_number')" placeholder="+254712345678" required>
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
            <div class="container">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" :value="old('address')" placeholder="Enter your address" required>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <button type="submit">Submit</button>
        </form>

        <div class="login">
            <p>Already have an account? <a href="{{ url('supplier-login') }}">Login</a></p>
        </div>

        <style>
            form {
                display: flex;
                flex-direction: column;
                margin: 1rem auto;
                max-width: 500px;
                border-radius: 7px;
                padding: 1rem;
                box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            }

            form .container {
                display: flex;
                width: 100%;
                margin: 1rem;
                flex-direction: column;
                max-width: 340px;
            }

            form .container label {
                display: flex;
                font-size: 1.2rem;
                color: black;
            }

            form .container input {
                border-radius: 7px;
                border: none;
                padding: 0.5rem;
                width: 100%;
            }

            form input:focus {
                outline: none;
            }

            form button {
                border-radius: 7px;
                margin: auto;
                border: none;
                padding: 0.5rem 1.5rem;
                background-color: #78C1F3 !important;
                color: black;
                font-size: 1.2rem;
                font-weight: bold;
                cursor: pointer;
            }

            form button:hover {
                background-color: #1E40AF !important;
                color: white;
            }

            .login {
                text-align: center;
                margin: 1rem auto;
            }

            .login a {
                color: #78C1F3;
                font-weight: bold;
            }
        </style>

</x-app-layout>