@props(['name','image'])
    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer group">
                    <div class="h-64 bg-gradient-to-br from-pink-400 to-rose-500 flex items-center justify-center">
                       @if ($image)
                           <img src="{{ asset('storage/'.$image) }}" alt="{{ $name }}" class="w-full h-full object-cover">
                       @else
                            <span class="text-white text-4xl font-bold">{{ substr($name, 0, 1) }}</span>
                       @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $name }}</h3>
                        {{-- <p class="text-gray-600 mb-4">Explore the latest trends</p> --}}
                        <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-700">Shop Now →</a>
                    </div>
</div>


                