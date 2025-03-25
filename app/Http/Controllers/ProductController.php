<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showData()
    {
        $products = Products::all();
        return response()->json($products);
    }
    public function page($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }
    public function search(Request $request)
    {
        try {
            // Get the search term from the query string
            $search = $request->query('search');

            // Start building the query
            $query = Products::query();

            // If there's a search term, apply the filters
            if ($search) {
                $query->where('product_name', 'LIKE', "%{$search}%")
                      ->orWhere('product_brand', 'LIKE', "%{$search}%")
                      ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(product_category, '$[*]')) LIKE ?", ["%{$search}%"]);
                      // This searches for partial matches in the JSON array
            }

            // Only get enabled products
            $query->where('product_is_enable', true);

            // Sort the results alphabetically
            $query->orderBy('product_name', 'asc');
            $query->orderBy('product_brand', 'asc');
            $query->orderBy('product_category', 'asc');

            // Execute the query and get all matching results
            $products = $query->get();

            // Check if no products were found
            if ($products->isEmpty()) {
                return response()->json(['message' => 'No products found'], 404);
            }

            // Return the results
            return response()->json($products);
        } catch (\Exception $e) {
            // Log the error and return a generic error message
            \Log::error("Search Error: " . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function index() {
        $products = Products::paginate(10);
        return view('products.index', compact('products'));
    }
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }
    public function men()
    {
        $products = Products::where(function ($query) {
            $query->where('product_category', 'like', '%men%')
                  ->orWhereJsonContains('product_category', 'men');
        })->where(function ($query) {
            $query->where('product_category', 'not like', '%women%')
                  ->whereJsonDoesntContain('product_category', 'women');
        })->paginate(10);
    
        return view('products.index', compact('products'));
    }
    public function women()
    {
        $products = Products::where('product_category', 'like', '%women%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    
        return view('products.index', compact('products'));
    }
    public function kids()
    {
        $products = Products::where('product_category', 'like', '%kids%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function shoes()
    {
        $products = Products::where('product_category', 'like', '%shoes%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function clothing()
    {
        $products = Products::where('product_category', 'like', '%clothing%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function t_shirt()
    {
        $products = Products::where('product_category', 'like', '%t_shirt%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function terry()
    {
        $products = Products::where('product_category', 'like', '%terry%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function pant()
    {
        $products = Products::where('product_category', 'like', '%pant%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function basketball_jersey()
    {
        $products = Products::where('product_category', 'like', '%basketball_jersey%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function sport()
    {
        $products = Products::where('product_category', 'like', '%sport%')->paginate(10); // Adjust query based on your schema
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create'); // Adjust the view name as needed
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:256',
            'product_category' => 'required|array',  
            'product_category.*' => 'required|string', 
            'product_brand' => 'required|string|max:256',
            'product_sizes' => 'required|array',  
            'product_sizes.*' => 'required|string',  
            'product_description' => 'nullable|string',
            'product_regular_price' => 'required|numeric|min:0',
            'product_sale_price' => 'required|numeric|min:0',
            'product_qty' => 'required|integer',
            'product_is_enable' => 'boolean',
            'product_comming_soon' => 'boolean',
            'product_image' => 'required|image',
            'product_list_image.*' => 'nullable|image' 
        ]);
    
        $image = $request->file('product_image')->store('products', 'public');
        $image_list = [];
        if ($request->hasFile('product_list_image')) {
            foreach ($request->file('product_list_image') as $file) {
                $image_list[] = $file->store('products', 'public');
            }
        }
    
        Products::create([
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,  
            'product_brand' => $request->product_brand,
            'product_sizes' => $request->product_sizes,  
            'product_description' => $request->product_description,
            'product_regular_price' => $request->product_regular_price,
            'product_sale_price' => $request->product_sale_price,
            'product_qty' => $request->product_qty,
            'product_is_enable' => $request->product_is_enable ?? 0,
            'product_comming_soon' => $request->product_comming_soon ?? 0,
            'product_image' => $image,
            'product_list_image' => $image_list
        ]);
    
        return redirect()->route('products.index');
    }
    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:256',
            'product_category' => 'required|array',  
            'product_category.*' => 'required|string', 
            'product_brand' => 'required|string|max:256',
            'product_sizes' => 'required|array',  
            'product_sizes.*' => 'required|string',  
            'product_description' => 'nullable|string',
            'product_regular_price' => 'required|numeric|min:0',
            'product_sale_price' => 'required|numeric|min:0',
            'product_qty' => 'required|integer',
            'product_is_enable' => 'boolean',
            'product_comming_soon' => 'boolean',
            'product_image' => 'nullable|image', // Changed to nullable for updates
            'product_list_image.*' => 'nullable|image'
        ]);
    
        // Find the existing product
        $product = Products::findOrFail($id);
    
        // Handle main image
        if ($request->hasFile('product_image')) {
            // Delete old image if it exists
            if ($product->product_image && Storage::disk('public')->exists($product->product_image)) {
                Storage::disk('public')->delete($product->product_image);
            }
            $image = $request->file('product_image')->store('products', 'public');
        } else {
            $image = $product->product_image; // Keep existing image
        }
    
        // Handle additional images
        $image_list = $product->product_list_image ?? []; // Start with existing images
        if ($request->hasFile('product_list_image')) {
            // Optionally clear old images (uncomment if you want to replace all)
            // if (!empty($image_list)) {
            //     foreach ($image_list as $oldImage) {
            //         if (Storage::disk('public')->exists($oldImage)) {
            //             Storage::disk('public')->delete($oldImage);
            //         }
            //     }
            //     $image_list = [];
            // }
            
            // Add new images
            foreach ($request->file('product_list_image') as $file) {
                $image_list[] = $file->store('products', 'public');
            }
        }
    
        // Update the product
        $product->update([
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'product_brand' => $request->product_brand,
            'product_sizes' => $request->product_sizes,
            'product_description' => $request->product_description,
            'product_regular_price' => $request->product_regular_price,
            'product_sale_price' => $request->product_sale_price,
            'product_qty' => $request->product_qty,
            'product_is_enable' => $request->product_is_enable ?? 0,
            'product_comming_soon' => $request->product_comming_soon ?? 0,
            'product_image' => $image,
            'product_list_image' => $image_list
        ]);
    
        return redirect()->route('products.index');
    }
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    } 
}
