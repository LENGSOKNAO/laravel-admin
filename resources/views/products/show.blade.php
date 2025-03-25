<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->product_name }} - Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="container mx-auto p-8 max-w-6xl">
        <!-- Header: Back Link -->
        <div class="mb-6">
            <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800 text-sm font-medium transition-colors duration-200">← Back to Products</a>
        </div>

        <!-- Main Product Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Image Section -->
            <div class="space-y-4">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="w-full h-96 object-contain rounded-lg">
                </div>
                @if (!empty($product->product_list_image))
                    <div class="flex gap-3 justify-center">
                        @foreach ($product->product_list_image as $image)
                            <div class="w-16 h-16">
                                <img src="{{ asset('storage/' . $image) }}" alt="Additional Image" class="w-full h-full object-cover rounded-md border border-gray-200 hover:border-gray-400 transition-all duration-200 cursor-pointer">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Info Section -->
            <div class="space-y-6">
                <!-- Product Title -->
                <h1 class="text-4xl font-light text-gray-900 tracking-wide">{{ $product->product_name }}</h1>

                <!-- Brand -->
                <p class="text-gray-600 text-sm">by {{ $product->product_brand }}</p>

                <!-- Price and Discount -->
                <div class="flex items-center gap-4">
                    <p class="text-3xl font-semibold text-gray-900">${{ number_format($product->product_sale_price, 2) }}</p>
                    @if ($product->product_sale_price < $product->product_regular_price)
                        <p class="text-lg text-gray-500 line-through">${{ number_format($product->product_regular_price, 2) }}</p>
                        <p class="text-lg text-amber-600 font-medium">
                            {{ round((($product->product_regular_price - $product->product_sale_price) / $product->product_regular_price) * 100) }}% off
                        </p>
                    @endif
                </div>

                <!-- Stock Status -->
                <p class="text-sm {{ $product->product_qty > 0 ? 'text-green-600' : 'text-red-600' }} font-medium">
                    {{ $product->product_qty > 0 ? 'In Stock' : 'Out of Stock' }}
                    @if ($product->product_qty > 0)
                        <span class="text-gray-600">({{ $product->product_qty }} available)</span>
                    @endif
                </p>

                <!-- Description -->
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Description</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ $product->product_description ?? 'N/A' }}</p>
                </div>

                <!-- Categories -->
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Categories</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        @if (is_array($product->product_category))
                            {{ implode(', ', $product->product_category) }}
                        @else
                            {{ $product->product_category ?? 'None' }}
                        @endif
                    </p>
                </div>

                <!-- Sizes -->
                <div>
                    <h3 class="text-sm font-medium text-gray-900">Sizes</h3>
                    <div class="flex flex-wrap gap-2 mt-1">
                        @if (is_array($product->product_sizes) && !empty($product->product_sizes))
                            @forelse ($product->product_sizes as $size)
                                <span class="border border-gray-300 px-3 py-1 rounded-full text-sm text-gray-700 hover:border-gray-500 transition-colors duration-200">
                                    @if (is_array($size) && isset($size['size']))
                                        {{ $size['size'] }}
                                    @elseif (is_string($size))
                                        {{ $size }}
                                    @else
                                        Unknown
                                    @endif
                                </span>
                            @empty
                                <span class="text-gray-500 text-sm">No sizes specified</span>
                            @endforelse
                        @else
                            <span class="text-gray-500 text-sm">{{ $product->product_sizes ?? 'No sizes specified' }}</span>
                        @endif
                    </div>
                </div>

                <!-- Enabled and Coming Soon -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Enabled</h3>
                        <p class="text-sm {{ $product->product_is_enable ? 'text-green-600' : 'text-red-600' }} font-medium">
                            {{ $product->product_is_enable ? 'Yes' : 'No' }}
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Coming Soon</h3>
                        <p class="text-sm text-gray-600">{{ $product->product_comming_soon ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>