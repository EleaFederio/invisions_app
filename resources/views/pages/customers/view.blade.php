@extends('layouts.main')

@section('content')

    <h1 style="margin-left: 10%">Product Information</h1>

    <div class="container" style="margin-top: 5%; margin-left: 30px">
        <div class="row">
            <div class="col-md-6">
                <h2 class="details-info" style=""> <strong>{{$customer->first_name}} {{$customer->last_name}}</strong> </h2>
                <p class="detail-title">Address</p>
                <h6 class="details-info">{{$customer->barangay}}, {{$customer->town}}, {{$customer->province}}</h6>
                <p class="detail-title">Phone Number</p>
                <h6 class="details-info">{{$customer->phone_number}}</h6>
            </div>
            <div class="col-md-6">
                <h2 class="details-info"></h2>
                <p class="detail-title">Company</p>
                <h6 class="details-info">{{$customer->company_name}}</h6>
                <p class="detail-title">Location Details</p>
                <h6 class="details-info">{{$customer->location_details}}</h6>
                <p class="detail-title">FB Name</p>
                <h6 class="details-info">{{$customer->fb_name}}</h6>
            </div>
        </div>

        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
            Create Order
        </button>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                                </div>
                                <div class="col-3">
                                    <input type="text" name="price" class="form-control" placeholder="Price">
                                </div>
                                <div class="col-6">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Printed</a>
                                            <a class="dropdown-item" href="#">Plain</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="details" class="form-control" placeholder="Details">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{url('images/image_not_available.png')}}"  style="border: 3px solid #ddd;" width="350">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('.dropdown-toggle').dropdown();
    </script>

@endsection