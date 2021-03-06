<x-layout>
<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Manage Post
        </h1>
    </header>

    <table class="w-full">
        <tbody>
            @unless($listings->isEmpty())
            @foreach($listings as $listing)
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg font-bold">
                    <a href="show.html">{{$listing->title}}</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg font-bold">
                    <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2">
                        <i class="fa-solid fa-pen-to-square"></i>Edit</a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg font-bold">
                    <form method="Post" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b boreder-gray-300 text-lg">
                    <p class="text-center">No listings Found</p>
                </td>
            </tr>
            @endunless

        </tbody>
    </table>
</div>
</x-layout>