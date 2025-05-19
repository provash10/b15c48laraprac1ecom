@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upadte Policy & Process</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Upadte Policy & Process</li>
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
                                <h3 class="card-title">Upadte Policy & Process</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/policies-process/update')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                   
                                    {{-- Product Description --}}
                                    <div class="form-group">
                                        <label for="name">Privacy Policy*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                        <textarea id="summernote" name="privacy_policy" class="form-control" required>{{$policy->privacy_policy}}</textarea>
                                    </div>

                                    {{-- Product Policy --}}
                                    <div class="form-group">
                                        <label for="name">Terms & Conditions*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                        <textarea id="summernote2" name="terms_conditions" class="form-control" required>{{$policy->terms_conditions}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Refund Policy*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                        <textarea id="summernote3" name="refund_policy" class="form-control" required>{{$policy->refund_policy}}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="name">Payment Policy*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                        <textarea id="summernote4" name="payment_policy" class="form-control" required>{{$policy->payment_policy}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">About Us*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                        <textarea id="summernote5" name="about_us" class="form-control" required>{{$policy->about_us}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Return Process*</label>
                                        {{-- <input type="number" class="form-control" name="discount_price" id="name" placeholder="Enter Product Discount Price" required> --}}
                                        <textarea id="summernote6" name="return_process" class="form-control" required>{{$policy->return_process}}</textarea>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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

     <!-- Page specific script summernote -->
    <script>
        $(function() {
            // Summernote
            $('#summernote3').summernote()

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
            $('#summernote4').summernote()

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
            $('#summernote5').summernote()

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
            $('#summernote6').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    {{-- Add Color -> use jquery/js--}}
    <script>
        $(document).ready(function(){
            $("#add_color").click(function(){
                $("#color_fields").append('<input type="text" class="form-control" name="color[]" id="color" placeholder="Enter Product Color">')
            })
        })
    </script>

    {{-- Add Size -> use jquery/js--}}
    <script>
        $(document).ready(function(){
            $("#add_size").click(function(){
                $("#size_fields").append('<input type="text" class="form-control" name="size[]" id="size" placeholder="Enter Product Size">')
            })
        })
    </script>

@endpush
