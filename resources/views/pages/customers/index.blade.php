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
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="fb_name" class="form-control" placeholder="FB Name" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" name="province" class="form-control" placeholder="Province" required>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="town" class="form-control" placeholder="Town" required>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="barangay" class="form-control" placeholder="Barangay" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="location_details" class="form-control" placeholder="Near Barangay Hall etc..." required>
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
            <th scope="col">Customer Details</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>
                    <div class="row">
                        <div class="col-3"?>
                            <h4 style="margin-bottom: 0px">{{ $customer->first_name }} {{$customer->last_name}}</h4>
                        </div>
                        <div class="col-3"?>
                            <p style="margin-bottom: 0px">Contact Number: {{$customer->phone_number}}</p>
                        </div>
                        <div class="col-3"?>
                            <p style="margin-bottom: 0px">Location: {{$customer->barangay}}, {{$customer->town}}, {{$customer->province}}</p>
                        </div>
                        <div class="col-2"?>
                            <p style="margin-bottom: 0px">Company: {{$customer->company_name}}</p>
                        </div>
                        <div class="col-1">
                            <button type="button" id="{{$customer->id}}" class="btn btn-primary btn-sm newOrder" data-toggle="modal" data-target="#newOrderModal">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <table class="table table-striped mockUptable" id="{{$customer->id}}">
                        <tbody id="data{{$customer->id}}">

                        </tbody>
                    </table>
                    <script>
                        fetch('{{route('products.index', $customer->id)}}').then(
                            res=>{
                                res.json().then(
                                    data=>{
                                        console.log(data);
                                        if (data.length > 0){
                                            var temp = "";
                                            data.forEach((u)=>{
                                                temp += '<tr>';
                                                var image_url = u.picture == null ? 'image_not_available.png': u.picture;
                                                temp += '<td style="margin-bottom: 0px"><img src="http://127.0.0.1:8000/images/'+image_url+'" width="200"></td>';
                                                temp += '<td><center><p style="margin-bottom: 0px">Quantity</p><p>'+u.quantity+'</p></center></td>';
                                                temp += '<td><center><p style="margin-bottom: 0px">Price</p><p>'+u.price+'</p></center></td>';
                                                temp += '<td><center><p style="margin-bottom: 0px">Total</p><p>'+u.quantity*u.price+'</p></center></td>';
                                                temp += '<td><p style="margin-bottom: 0px">Details</p><p>'+u.details+'</p></td>';
                                                temp += '<td><button type="button" class="btn btn-info btn-sm editCustomerModalShow{{$customer->id}}" id="'+u.id+'" data-toggle="modal"  data-target="#editOrderModal"><i class="fas fa-edit"></i></button> ' +
                                                    {{--'<form  action="{{ route('products.destroy' , $customer->id, 1) }}" method="POST"> @csrf @method('DELETE') <button type="submit" name="submit" class="btn btn-danger btn-sm"  id=""><i class="fas fa-trash-alt"></i></button></form></td></tr>';--}}
                                                    '<form onSubmit="getUrl({{$customer->id}}, ' + u.id + ')" id="changeDeleteUrl'+u.id+'" method="POST"> @csrf @method('DELETE') <button type="submit" name="submit" class="btn btn-danger btn-sm"  id=""><i class="fas fa-trash-alt"></i></button></form></td></tr>';
                                            })
                                            document.getElementById("data{{$customer->id}}").innerHTML = temp;
                                        }
                                    }
                                )
                            }
                        )

                        $(document).on('click', '.editCustomerModalShow{{$customer->id}}', function () {
                            var customer = "{{$customer->id}}";
                            var id = $(this).attr('id');
                            var route = "http://127.0.0.1:8000/api/customers/"+customer+"/products/"+id;
                            var updateRoute = "http://127.0.0.1:8000/customers/"+customer+"/products/"+id;
                            $('#editOrderForm').attr('action', updateRoute);

                            $.ajax({
                                url: route,
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(data) {
                                    console.log(data);
                                    $('#quantity').val(data.product.quantity);
                                    $('#details').val(data.product.details);
                                    $('#price').val(data.product.price);
                                    $('#category').val(data.product.category);
                                    var preview_image_url = data.product.picture  == null ? 'image_not_available.png' : data.product.picture;
                                    $('#productPic2').attr('src', 'http://127.0.0.1:8000/images/'+preview_image_url);
                                },
                            });
                        });
                    </script>
                </td>
                <td style="vertical-align: top">
                    <a href="{{ route('customers.show' , $customer->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                    <br>
                    <br><button href="#" data-toggle="modal" id="{{$customer->id}}" data-target="#editModal" class="btn btn-secondary btn-sm editModalShow"><i class="fas fa-edit"></i></button>
                    <br>
                    <br><form  action="{{ route('customers.destroy' , $customer->id) }}" method="POST"> @csrf @method('DELETE') <button type="submit" name="submit" class="btn btn-danger btn-sm"  id=""><i class="fas fa-trash-alt"></i></button></form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="fb_name" id="fb_name" class="form-control" placeholder="FB Name" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <div class="row">
                                <div class="col-9">
                                    <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" name="province" id="province" class="form-control" placeholder="Province" required>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="town" id="town" class="form-control" placeholder="Town" required>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="barangay" id="barangay" class="form-control" placeholder="Barangay" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="location_details" id="location_details" class="form-control" placeholder="Near Barangay Hall etc..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    Add new Order  --}}
    <div class="modal fade" id="newOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--                {{dd($customer)}}--}}
                <form id="addOrderForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="price" class="form-control" placeholder="Price" required>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" name="category" id="exampleFormControlSelect1" required>
                                            <option value="" disabled selected>Select Type</option>
                                            <option value="Printed">Printed</option>
                                            <option value="Plain">Plain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="details" class="form-control" placeholder="Details" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mock-Up Picture</label>
                            <img src="{{ url('images/image_not_available.png') }}" id="productPic" alt="" width="465" style="border: 3px solid #ddd;">
                            <input type="file" onchange="imagePreview.call(this)" id="file" name="product_picture"  value="upload picture">
                            <label for="file" class="file-button" ><i class="fas fa-camera-retro" style="paddin-right:10px"></i> Choose a photo</label>
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

{{--    Edit Order Modal --}}
    <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--                {{dd($customer)}}--}}
                <form id="editOrderForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity" required>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Price" required>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="form-control" name="category" id="category" required>
                                            <option value="" disabled selected>Select Type</option>
                                            <option value="Printed">Printed</option>
                                            <option value="Plain">Plain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="details" id="details" class="form-control" placeholder="Details" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mock-Up Picture</label>
                            <img src="{{ url('images/image_not_available.png') }}" id="productPic2" alt="" width="465" style="border: 3px solid #ddd;">
                            <input type="file" onchange="imagePreview2.call(this)" id="file2" name="product_picture"  value="upload picture">
                            <label for="file2" class="file-button" ><i class="fas fa-camera-retro" style="padding-right:10px"></i> Choose a photo</label>
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

        $(document).on('click', '.newOrder', function () {
            var custometId = $(this).attr("id");
            var url = "customers/"+custometId+"/products";
            $('#addOrderForm').attr('action', "{{url('/')}}/"+url);
        })

        $(document).on('click', '.editModalShow', function () {
            var id = $(this).attr('id');
            var route = "http://127.0.0.1:8000/api/customers/"+id;
            var updateRoute = "http://127.0.0.1:8000/customers/"+id;
            $('#editForm').attr('action', updateRoute);

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

        function getUrl(aaa, bbb) {
            alert("before");
            var xxx = '#changeDeleteUrl'+bbb;
            alert(xxx);
            $(xxx).attr('action', "{{url('')}}"+"/customers/"+aaa+"/products/"+bbb+"");
            // document.changeDeleteUrl.action();
            alert("after");
            alert("{{url('')}}"+"/customers/"+aaa+"/products/"+bbb+"");
        }

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

        function imagePreview2(){
            var reader = new FileReader();
            var imageField = document.getElementById("productPic2");
            reader.onload = function(){
                if(reader.readyState == 2){
                    imageField.src = reader.result;
                }
            }
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>

@endsection