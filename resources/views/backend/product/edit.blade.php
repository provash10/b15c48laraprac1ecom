@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('/admin/product/update/' . $product->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Product Name*</label>
                                        <input type="text" class="form-control" value="{{ $product->name }}"
                                            name="name" id="name" placeholder="Enter Product Name*" required>
                                    </div>

                                    {{-- Product Code --}}
                                    <div class="form-group">
                                        <label for="name">Product Code</label>
                                        <input type="text" class="form-control" value="{{ $product->sku_code }}"
                                            name="sku_code" id="name" placeholder="Enter Product Code">
                                    </div>

                                    {{-- copy from subcat/create for category --}}
                                    <div class="form-group">
                                        <label for="name">Select Category Name*</label>
                                        {{-- <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name*" required> --}}
                                        <select name="cat_id" class="form-control">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                {{-- <option value="">Category1</option> --}}
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $product->cat_id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- for subcategory --}}
                                    <div class="form-group">
                                        <label for="name">Select Sub-Category Name</label>
                                        {{-- <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name*" required> --}}
                                        <select name="sub_cat_id" class="form-control">
                                            <option selected disabled>Select Sub-Category</option>
                                            @foreach ($subCategories as $subcategory)
                                                {{-- <option value="">Category1</option> --}}
                                                <option
                                                    value="{{ $subcategory->id }}"@if ($subcategory->id == $product->sub_cat_id) selected @endif>
                                                    {{ $subcategory->name }} </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    {{-- Product Color --}}
                                    <div class="form-group" id="color_fields">
                                        <label for="name">Product Color (Optional)</label>
                                        {{-- <input type="text" class="form-control" name="color[]" id="color" placeholder="Enter Product Color"> --}}
                                        @foreach ($product->color as $singleColor)
                                            <input type="text" class="form-control" name="color[]" value="{{ $singleColor->color_name }}" id="color" placeholder="Enter Product Color">
                                        @endforeach

                                    </div>
                                    <button type="button" class="btn btn-primary" id="add_color">Add More</button>

                                    {{-- Product Size --}}
                                    <div class="form-group" id="size_fields">
                                        <label for="name">Product Size (Optional)</label>
                                        {{-- <input type="text" class="form-control" name="size[]" id="size" placeholder="Enter Product Size"> --}}
                                        @foreach ($product->size as $singleSize)
                                            <input type="text" class="form-control" name="size[]" value="{{ $singleSize->size_name }}" id="size" placeholder="Enter Product Size">
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary" id="add_size">Add More</button>

                                    {{-- Product Quantity --}}
                                    <div class="form-group">
                                        <label for="name">Product Quantity*</label>
                                        <input type="number" class="form-control" value="{{ $product->qty }}"
                                            name="qty" id="name" placeholder="Enter Product Quantity" required>
                                    </div>

                                    {{-- Product Buying Price --}}
                                    <div class="form-group">
                                        <label for="name">Product Buying Price*</label>
                                        <input type="number" class="form-control" value="{{ $product->buying_price }}"
                                            name="buying_price" id="name" placeholder="Enter Product Buying Price"
                                            required>
                                    </div>

                                    {{-- Product Regular Price --}}
                                    <div class="form-group">
                                        <label for="name">Product Regular Price*</label>
                                        <input type="number" class="form-control" value="{{ $product->regular_price }}"
                                            name="regular_price" id="name" placeholder="Enter Product Regular Price"
                                            required>
                                    </div>

                                    {{-- Product Discount Price --}}
                                    <div class="form-group">
                                        <label for="name">Product Discount Price</label>
                                        <input type="number" class="form-control" value="{{ $product->discount_price }}"
                                            name="discount_price" id="name"
                                            placeholder="Enter Product Discount Price" required>
                                    </div>

                                    {{-- Product Description -- not value}}
                                    <div class="form-group">
                                        <label for="name">Product Description*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                    <textarea id="summernote" name="description" class="form-control" required>{{ $product->description }}</textarea>
                                </div>

                                {{-- Product Policy --not value}}
                                    <div class="form-group">
                                        <label for="name">Product Policy*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                <textarea id="summernote2" name="policy" class="form-control" required>{{ $product->policy }}</textarea>
                        </div>

                        {{-- copy from category for product_type --}}
                        <div class="form-group">
                            <label for="name">Select Product Type*</label>
                            {{-- <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name*" required> --}}
                            <select name="product_type" class="form-control">
                                <option selected disabled>Select Type*</option>
                                {{-- <option value="">Category1</option> --}}
                                <option value="hot"@if ($product->product_type == 'hot') selected @endif>Hot Products
                                </option>
                                <option value="new"@if ($product->product_type == 'new') selected @endif>New Products
                                </option>
                                <option value="regular"@if ($product->product_type == 'regular') slected @endif>Regular Products
                                </option>
                                <option value="discount"@if ($product->product_type == 'discount') selected @endif>Discount Products
                                </option>
                            </select>
                        </div>
                        {{-- product image no required --}}

                        <div class="form-group">
                            <label for="exampleInputFile">Product Image*</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image"
                                        accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <img src="{{asset('backend/images/product/'.$product->image)}}" height="100"
                                width="100">
                        </div>



                        {{-- For Multiple Product Image/Gallery Image --}}
                        <div class="form-group">
                            <label for="exampleInputFile">Product Gallery Image*</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="galleryImage[]" multiple
                                        id="galleryImage" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @foreach ($product->galleryImage as $image)
                                <img src="{{ asset('backend/images/galleryImage/' . $image->image) }}" height="100"
                                    width="100">
                            @endforeach
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection


@push('script')
    <!-- Page specific script -->
    <script>
        $(function() {
            //   bsCustomFileInput.init();
            // input file ar id >>>image
            image.init();
        });
    </script>

    <!-- Page specific script summernote -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    <!-- Page specific script summernote -->
    <script>
        $(function() {
            // Summernote
            $('#summernote2').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    {{-- Add Color -> use jquery/js --}}
    <script>
        $(document).ready(function() {
            $("#add_color").click(function() {
                $("#color_fields").append(
                    '<input type="text" class="form-control" name="color[]" id="color" placeholder="Enter Product Color">'
                )
            })
        })
    </script>

    {{-- Add Size -> use jquery/js --}}
    <script>
        $(document).ready(function() {
            $("#add_size").click(function() {
                $("#size_fields").append(
                    '<input type="text" class="form-control" name="size[]" id="size" placeholder="Enter Product Size">'
                )
            })
        })
    </script>
@endpush
