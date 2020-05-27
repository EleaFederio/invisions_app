@extends('layouts.main')

@section('content')

    <h1>Product List</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
        Add Product
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="fb_name" class="form-control" placeholder="FB Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" name="province" class="form-control" placeholder="Province">
                                </div>
                                <div class="col-4">
                                    <input type="text" name="town" class="form-control" placeholder="Town">
                                </div>
                                <div class="col-4">
                                    <input type="text" name="barangay" class="form-control" placeholder="Barangay">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="location_details" class="form-control" placeholder="Near Barangay Hall etc...">
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
    <br><br>




    {{--    <a href="{{route('products.create')}}">ADD PRODUCT</a>--}}
    <table class="display" id="table_id">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Customer Details</th>
            <th scope="col"><Orders></Orders></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>
                    <h4 style="margin-bottom: 0px">{{ $customer->first_name }} {{$customer->last_name}}</h4>
                    <p style="margin-bottom: 0px">Contact Number: {{$customer->phone_number}}</p>
                    <p style="margin-bottom: 0px">Location: {{$customer->barangay}}, {{$customer->town}}, {{$customer->province}}</p>
                    <p style="margin-bottom: 0px">Company: {{$customer->company_name}}</p>
                </td>
                <td>

                </td>
                <td><a href="{{ route('customers.show' , $customer->id) }}" class="btn btn-primary btn-sm">View</a></td>
                <td><a href="{{ route('customers.edit' , $customer->id) }}" class="btn btn-secondary btn-sm">Edit</a></td>
                <td><form action="{{ route('customers.destroy' , $customer->id) }}" method="POST"> @csrf @method('DELETE') <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm" id=""> </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        function imagePreview(){
            var reader = new FileReader();
            var imageField = document.getElementById("productPic");
            reader.onload = function(){
                if(reader.readyState == 2){
                    imageField.src = reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        $('.dropdown-toggle').dropdown()
    </script>

@endsection