@props(['product'])
<a href="{{ route('product.show', $product) }}" class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition group">
                    <div class="relative h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                        <i class="fas fa-image text-6xl text-gray-400"></i>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white w-10 h-10 rounded-full shadow-md flex items-center justify-center hover:bg-indigo-600 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            -20%
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold mb-2 group-hover:text-indigo-600 transition">{{$product->name}}</h3>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star text-sm"></i>
                                <i class="fas fa-star-half-alt text-sm"></i>
                            </div>
                            <span class="text-gray-600 text-sm ml-2">(128)</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through text-sm">${{$product->price}}</span>
                                <span class="text-xl font-bold text-indigo-600 ml-2">${{ $product->price }}</span>
                            </div>
                            <button class="bg-indigo-600 text-white w-10 h-10 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </a>
