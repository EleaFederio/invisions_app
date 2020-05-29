@extends('layouts.main')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <h1>Customers List</h1>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
        Add Customer
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
                <form action="{{route('customers.store', 1)}}" method="post" enctype="multipart/form-data">
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
                <td><button href="#" data-toggle="modal" id="{{$customer->id}}" data-target="#editModal" class="btn btn-secondary btn-sm editModalShow">Edit</button></td>
                <td><form action="{{ route('customers.destroy' , $customer->id) }}" method="POST"> @csrf @method('DELETE') <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm" id=""> </form></td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('customers.update', 1)}}" id="editAction" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="fb_name" id="fb_name" class="form-control" placeholder="FB Name">
                                </div>
                                <div class="col-6">
                                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" name="province" id="province" class="form-control" placeholder="Province">
                                </div>
                                <div class="col-4">
                                    <input type="text" name="town" id="town" class="form-control" placeholder="Town">
                                </div>
                                <div class="col-4">
                                    <input type="text" name="barangay" id="barangay" class="form-control" placeholder="Barangay">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="location_details" id="location_details" class="form-control" placeholder="Near Barangay Hall etc...">
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

        $(document).on('click', '.editModalShow', function () {
            var id = $(this).attr('id');
            var route = "http://127.0.0.1:8000/api/customers/"+id;
            console.log(route);

            $.ajax({
                url: route,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    // console.log(data);
                    $('#first_name').val(data.customer.first_name);
                    $('#last_name').val(data.customer.last_name);
                    $('#fb_name').val(data.customer.fb_name);
                    $('#phone_number').val(data.customer.phone_number);
                    $('#company_name').val(data.customer.company_name);
                    $('#province').val(data.customer.province);
                    $('#town').val(data.customer.town);
                    $('#barangay').val(data.customer.barangay);
                    $('#location_details').val(data.customer.location_details);
                    $('#editAction').action('haaaaaaaaaaa');
                    console.log(data.customer.first_name);
                },
            });
        });

    </script>

@endsection