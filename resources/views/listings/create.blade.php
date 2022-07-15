<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 max-w-lg 
    mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase"
            mb-1> Create a Post</h2>
            <p class="mb-4"> Create a new post to share your work with us</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="company" class="inline-block
                text-lg mb-2"> Company Name:</label>
                <input type="text" class="border
                border-gray-250 rounded p-2 w-full"
                name="company" value="{{old('company')}}" />

                @error('company')
                <p class="text-red-500 text-s mt-1">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="title" class="inline-block
                text-lg mb-2"> Job title:</label>
                <input type="text" class="border
                border-gray-250 rounded p-2 w-full"
                name="title"
                placeholder="Example: Junior Laravel Developer"
                value="{{old('title')}}" />

                @error('title')
                <p class="text-red-500 text-s mt-1">{{$message}}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="location" class="inline-block
                text-lg mb-2"> Location:</label>
                <input type="text" class="border
                border-gray-250 rounded p-2 w-full"
                name="location"
                placeholder="Example: Remote, Szczecin, Poland" 
                value="{{old('location')}}"/>

                @error('location')
                <p class="text-red-500 text-s mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block
                text-lg mb-2"> Post your Website/APP URL:</label>
                <input type="text" class="border
                border-gray-250 rounded p-2 w-full"
                name="website"
                value="{{old('website')}}"
                />
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block
                text-lg mb-2"> Share your email with us:</label>
                <input type="text" class="border
                border-gray-250 rounded p-2 w-full"
                name="email"
                placeholder="Example: laravel.developer@gmail.com"
                value="{{old('email')}}"
                />

                @error('email')
                <p class="text-red-500 text-s mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block
                text-lg mb-2"> Tags:</label>
                <input type="text" class="border
                border-blue-250 rounded p-2 w-full"
                name="tags"
                placeholder="Example: Laravel, API, React"
                value="{{old('tags')}}" />

                @error('tags')
                <p class="text-red-500 text-s mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block
                text-lg mb-2"> Company logo:</label>
                <input type="file" class="border
                border-black-200 rounded p-2 w-full"
                name="logo"
                value="{{old('logo')}}"
                />
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block
                text-lg mb-2"> Small description of your work:</label>
                <textarea class="border
                border-black-200 rounded p-2 w-full"
                name="description"
                placeholder="Include everything that you need"> 
                {{old('description')}}
                </textarea>

                @error('description')
                <p class="text-red-500 text-s mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2
                    px-4 hover:bg-black"
                >
                 Create Post
                </button>

                <a href="/" class="text-black ml-4"> Back</a>
            </div>
        </form>
    </div>
</x-layout>