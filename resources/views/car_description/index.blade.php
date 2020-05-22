@extends('layouts.admin')

@section('content')
    <h2 class="text-center"> Available Cars</h2>
    <div class="row m-0 p-5">
        @foreach($vehicles as $vehicle)
            <div class="col-xl-6">
                <div class="card mb-2" style="width: 38rem;">
                    <img class="card-img-top" src="{{ asset('storage/'.$vehicle->image) }}" alt="Card image cap" style="object-fit: cover;" height="300px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $vehicle->make }} {{ $vehicle->model }}</h5>
                        <p class="card-text">{{ $vehicle->number_plate }}</p>
                        <p class="card-text">Price per Day: {{ $vehicle->base_price_per_day }}</p>
                        @if($vehicle->availability == 1)
                            <p class="card-text">Status: Available</p>
                        @else
                            <p class="card-text">Status: Not Available</p>
                        @endif
                        <div class="card-footer align-content-center">
                            <a href="/admin/cardescriptions/{{ $vehicle->id }}/edit" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection