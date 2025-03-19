<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Review;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function productCreate()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('backend.product.create', compact('categories', 'subCategories'));
    }

    public function productStore(Request $request)
    {
        $product = new Product();

        // for image

        if (isset($request->image)) {
            // single image upload
            $imageName = rand() . '-product-' . '.' . $request->image->extension();
            $request->image->move('backend/images/product', $imageName);

            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->sku_code = $request->sku_code;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->policy = $request->policy;
        $product->product_type = $request->product_type;

        $product->save();

        // Add Color
        if (isset($request->color) && $request->color[0] != null) {
            foreach ($request->color as $color_name) {
                $color = new Color();

                $color->product_id = $product->id;
                // $color->color_name = $request->color;
                $color->color_name = $color_name;

                $color->save();
            }
        }

        // $color->product_id = $product->id;
        // $color->color_name = $request->color;

        // Add Size 
        if (isset($request->size) && $request->size[0] != null) {
            foreach ($request->size as $size_name) {
                $size = new Size();

                $size->product_id = $product->id;
                // $size->size_name = $request->size;
                $size->size_name = $size_name;

                $size->save();
            }
        }

            //Gallery Image
            if (isset($request->galleryImage)) {
                foreach ($request->galleryImage as $image) {
                    $galleryImage = new GalleryImage();

                    $galleryImage->product_id = $product->id;

                    $imageName = rand().'-galleryimage-'.'.'.$image->extension();
                    $image->move('backend/images/galleryImage', $imageName);

                    $galleryImage->image = $imageName;

                    $galleryImage->save();
                }
            }

        return redirect()->back();
    }

    public function productList()
    {
        $products = Product::orderBy('id', 'desc')->with('category', 'subCategory')->get();

        // dd($products);
        return view('backend.product.list', compact('products'));
    }

    // CRUD Delete
    public function productDelete($id){
        $product = Product::find($id);
        // $colors = Color::find($id); -----wrong way
        $colors = Color::where('product_id', $product->id)->get();
        // dd($color);
        $sizes = Size::where('product_id', $product->id)->get();
        $galleryImages = GalleryImage::where('product_id', $product->id)->get();
        $reviews = Review::where('product_id', $product->id)->get();


        // main/single image delete from ProductController (CategoryController categoryDelete copy and paste)
        if ($product->image && file_exists('backend/images/product/' . $product->image)) {
            unlink('backend/images/product/' . $product->image);
        }

        $product->delete();


        //multple Color delete
        if ($colors->isNotEmpty()) {
            foreach ($colors as $color) {
                $color->delete();
            }
        }

        //multple Size delete
        if ($sizes->isNotEmpty()) {
            foreach ($sizes as $size) {
                $size->delete();
            }
        }

        //multple Review delete
        if ($reviews->isNotEmpty()) {
            foreach ($reviews as $review) {
                $review->delete();
            }
        }

        //multple Gallery Image delete 2 way
        if ($galleryImages->isNotEmpty()) {
            foreach ($galleryImages as $image) {

                //public folder gallery image delete
                if ($image->image && file_exists('backend/images/galleryImage/' . $image->image)) {
                    unlink('backend/images/galleryImage/' . $image->image);
                }

                $image->delete();
            }
        }

        return redirect()->back();
    }

    //Edit
    public function productEdit($id)
    {
        //for all table get->
        $product = Product::where('id', $id)->with('color', 'size', 'galleryImage')->first();
        // dd($product);
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('backend.product.edit', compact('product', 'categories', 'subCategories'));
    }

    //Update

    public function productUpdate(Request $request, $id)
    {
        $product = Product::find($id);

        // new single image astese kina check 
        if (isset($request->image)) {
            // main/single image delete from ProductController (CategoryController categoryDelete copy and paste)
            if ($product->image && file_exists('backend/images/product/' . $product->image)) {
                unlink('backend/images/product/' . $product->image);
            }
            // single image upload
            $imageName = rand() . '-product-' . '.' . $request->image->extension();
            $request->image->move('backend/images/product', $imageName);

            $product->image = $imageName;
        }

        //Gallery Image
        if (isset($request->galleryImage)) {
            foreach ($request->galleryImage as $image) {
                $galleryImage = new GalleryImage();

                $galleryImage->product_id = $product->id;

                $imageName = rand() . '-galleryimage-' . '.' . $image->extension();
                $image->move('backend/images/galleryImage', $imageName);

                $galleryImage->image = $imageName;

                $galleryImage->save();
            }
        }


        // For Not Showing auto duplicate color after edit 
         
        // Add Color 48.00min c70
         if (isset($request->color) && $request->color[0] != null) {
            $colors = Color::where('product_id', $product->id)->get();
            //multple Color delete
        if ($colors->isNotEmpty()) {
            foreach ($colors as $color) {
                $color->delete();
            }
        }
            foreach ($request->color as $color_name) {
                $color = new Color();

                $color->product_id = $product->id;
                // $color->color_name = $request->color;
                $color->color_name = $color_name;

                $color->save();
            }
        }
        

        // Add Size 
        if (isset($request->size) && $request->size[0] != null) {
            $sizes = Size::where('product_id', $product->id)->get();

            //multple Size delete
        if ($sizes->isNotEmpty()) {
            foreach ($sizes as $size) {
                $size->delete();
            }
        }

            foreach ($request->size as $size_name) {
                $size = new Size();

                $size->product_id = $product->id;
                // $size->size_name = $request->size;
                $size->size_name = $size_name;

                $size->save();
            }
        }

        


        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->sku_code = $request->sku_code;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->policy = $request->policy;
        $product->product_type = $request->product_type;

        $product->save();

        return redirect()->back();
    }
}
