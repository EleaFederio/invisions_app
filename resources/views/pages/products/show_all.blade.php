@extends('layouts.main')

@section('content')
    @foreach($products as $product)
        <div class="alert alert-primary" role="alert">
            <img src="http://127.0.0.1:8000/images/{{$product->picture}}" width="200">
            <h6>Customer: {{\App\Customer::find($product->customer_id)->first_name}} {{\App\Customer::find($product->customer_id)->last_name}}</h6>
            <h3><div data-countdown="{{$product->due_date}}"></div></h3>
        </div>
    @endforeach

    <script>
        $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%D days %H:%M:%S'));
            });
        });
    </script>

@endsection