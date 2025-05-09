@extends('backend.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {{-- <form action="" method=""> --}}
                {{-- <form action="{{url('/admin/update-order/{id}')}}" method=""> --}}
            {{-- <form action="{{url('/admin/update-order/'.$order->id)}}" method="POST" enctype="multipart/form-data"> --}}
            <form action="{{url('/admin/update-order/'.$order->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            {{-- <h3 class="card-title">General</h3> --}}
                            <h3 class="card-title">Customer Details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Invoice Number</label>
                                {{-- <input type="text" id="inputName" class="form-control" value="AdminLTE"> --}}
                                {{-- <input type="text" id="invoiceID" name="" class="form-control" value="XYZ-1"> --}}
                                <input type="text" id="invoiceID" name="invoiceID" class="form-control" value="{{$order->invoiceID}}" readonly>
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Customer Name</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="Mr. X" required> --}}
                                <input type="text" id="" name="c_name" class="form-control" value="{{$order->c_name}}" required>
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Customer Phone</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="01710999" required> --}}
                                <input type="text" id="" name="c_phone" class="form-control" value="{{$order->c_phone}}" required>
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Customer Address</label>
                                {{-- <textarea id="inputDescription" name="" class="form-control" rows="4" required>Mirpur, Dhaka.</textarea> --}}
                                <textarea id="inputDescription" name="address" class="form-control" rows="4" required>{{$order->address}}</textarea>
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputDescription">Project Description</label> --}}
                                <label for="inputDescription">Delivery Charge</label>
                                {{-- <input type="text" id="" name="" class="form-control" value="80" required> --}}
                                <input type="text" id="area" name="area" class="form-control" value="{{$order->area}}" required>
                            </div>

                            <div class="form-group">
                                {{-- <label for="inputStatus">Status</label> --}}
                                <label for="inputStatus">Select Courier</label>
                                <select id="inputStatus" name="courier_name" class="form-control custom-select">
                                    {{-- <option disabled selected>Select one</option> --}}
                                    @if ($order->courier_name == null)
                                     <option disabled selected>Select One</option>
                                     <option value="steadfast">Steadfast</option>
                                     <option value="pathao">Pathao</option>
                                     <option value="others">Others</option>

                                    @elseif ($order->courier_name == "steadfast")
                                     <option value="steadfast" selected>Steadfast</option>
                                     <option value="pathao">Pathao</option>
                                     <option value="others">Others</option>

                                    @elseif ($order->courier_name == "pathao")
                                     <option value="pathao" selected>Pathao</option>
                                     <option value="steadfast">Steadfast</option>
                                     <option value="others">Others</option>
                                    
                                    @else 
                                    <option value="others">Others</option>
                                    @endif
                                    {{-- <option value="steadfast">Steadfast</option>
                                    <option value="pathao">Pathao</option>
                                    <option value="others">Others</option> --}}
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Product Details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                              <div class="row">
                                <div class="col-md-12">
                                    {{-- <img src="https://placehold.co/100x100">
                                    1 X Test Product | Unit Price : 1000 tk| Color : Red | Size : L<br> <br> --}}

                                    @foreach ($order->orderDetails as $details)
                                    <img src="{{asset('backend/images/product/'.$details->product->image)}}" height="100" width="100">
                                    {{$details->qty}} X {{$details->product->name}} | Unit Price : {{$details->price}}| Color : {{$details->color?? 'N.A'}} | Size : {{$details->size?? 'N.A'}}<br> <br>
                                    @endforeach
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{-- <label for="inputDescription">Project Description</label> --}}
                                        <label for="inputDescription">Order Price</label>
                                        {{-- <input type="text" id="" name="" class="form-control" value="3000" required> --}}
                                        <input type="text" id="" name="price" class="form-control" value="{{$order->price}}" required>
                                    </div>
                                    <input type="submit" value="Update Order" class="btn btn-success float-right">
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </form>
                
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save Changes" class="btn btn-success float-right">
                </div>
            </div> --}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


{{-- No Need this *****js couse of it is use in table  --}}
{{-- @push('script')
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush --}}
