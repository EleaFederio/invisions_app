@extends('layouts.app')

@section('content')
    {{$process}}

    {!! $chart->container() !!}

@endsection