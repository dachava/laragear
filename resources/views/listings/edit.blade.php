<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                           Edit the post!
                        </h2>
                        <p class="mb-4">Edit: {{$listing->title}}</p>
                    </header>
                    {{-- Postear el form a /listings --}}
                    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label
                                for="title"
                                class="inline-block text-lg mb-2"
                                >Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Fender Stratocaster Vintage 69"
                                value="{{$listing->title}}"
                                {{-- value old mantiene el valor del field incluso si hay error --}}
                            />
                            {{-- Muestra msg de error si hay, ej si no se lleno el campo, etc --}}
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="brand" class="inline-block text-lg mb-2"
                                >Brand</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="brand"
                                placeholder="Example: Fender"
                                value="{{$listing->brand}}"
                            />
                            @error('brand')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="model" class="inline-block text-lg mb-2"
                                >Model</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="model"
                                placeholder="Example: Stratocaster"
                                value="{{$listing->model}}"
                            />
                            @error('model')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Miami, FL"
                                value="{{$listing->location}}"
                            />
                            @error('location')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{$listing->email}}"
                            />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="phone"
                                class="inline-block text-lg mb-2"
                            >
                                Phone Number
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="phone"
                                value="{{$listing->phone}}"
                            />
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: guitar, strat, amp, etc"
                                value="{{$listing->tags}}"
                            />
                            @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Image
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />
                            <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->logo ? 
                                asset ('storage/'. $listing->logo) : 
                                asset('/images/no-image.png')}}"
                            alt=""
                        />
                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include year, serial, condition, price"
                               
                            >{{$listing->description}}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                               Update gear
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
    </x-card>
</x-layout>