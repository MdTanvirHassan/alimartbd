@extends('backend.layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h2 class="m-0">Store Information</h2>
        <a href="{{ route('pathao.Store') }}" class="btn btn-primary bg-dark btn-sm">
            <i class="las la-plus"></i> Add a New Store
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Store ID</th>
                        <th>Name</th>
                        <th>Contact Name</th>
                        <th>Contact Number</th>
                        <th>Secondary Contact</th>
                        <th>Address</th>
                        <th>City ID</th>
                        <th>Zone ID</th>
                        <th>Area ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Pathao_store as $store)
                    <tr>
                        <td>{{ $store->store_id }}</td>
                        <td>{{ $store->name }}</td>
                        <td>{{ $store->contact_name }}</td>
                        <td>{{ $store->contact_number }}</td>
                        <td>{{ $store->secondary_contact }}</td>
                        <td>{{ $store->address }}</td>
                        <td>{{ $store->city_id }}</td>
                        <td>{{ $store->zone_id }}</td>
                        <td>{{ $store->area_id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
