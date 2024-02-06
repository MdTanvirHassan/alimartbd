@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h2 class="mb-0">Store Information</h2>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="{{ route('pathao.saveStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="storeName">Store Name:</label>
                        <input type="text" class="form-control" id="storeName" name="storeName" placeholder="Enter store name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactName">Contact Person:</label>
                        <input type="text" class="form-control" id="contactName" name="contactName" placeholder="Enter contact person's name" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter contact number" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="secondaryContact">Secondary Contact:</label>
                        <input type="text" class="form-control" id="secondaryContact" name="secondaryContact" placeholder="Enter secondary contact" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cityId">City:</label>
                        <select class="form-control" id="cityId" name="city_id" required>
                            <option value="">Select City</option>
                            @foreach (\App\Models\Pathao_city::orderBy('city_name', 'asc')->get() as $city)
                                <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="zoneId">Zone:</label>
                        <select class="form-control" id="zoneId" name="zone_id" required>
                            <option value="">Select Zone</option>
                            {{-- Zones will be dynamically loaded here --}}
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="areaId">Area:</label>
                        <select class="form-control" id="areaId" name="area_id" required>
                            <option value="">Select Area</option>
                            {{-- Area will be dynamically loaded here --}}
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea type="text" row="3" class="form-control" name="address" id="address" placeholder="Enter store address" required></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            <a href="{{ route('pathao.store_list') }}" class="btn btn-danger btn-sm">Back</a>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

<script>
$(document).ready(function() {
    $('#cityId').on('change', function () {

        var selectedCityId = $(this).val();
        $('#zoneId').empty();
        $('#areaId').empty();
        $.ajax({
            url: '{{ route("pathao.zone2") }}', 
            type: 'POST', 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            data: {
                cityId: selectedCityId 
            },
            success: function(response) {
                $('#zoneId').append('<option value="">Select Zone</option>');
                response.forEach(function (zone) {
                    $('#zoneId').append('<option value="' + zone.zone_id + '">' + zone.zone_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error calling route:', error);
            }
        });
    });

    $('#zoneId').on('change', function () {
        var selectedZoneId = $(this).val();
        $('#areaId').empty();
        $.ajax({
            url: '{{ route("pathao.area2") }}', 
            type: 'POST', 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            data: {
                zoneId: selectedZoneId 
            },
            success: function(response) {
                $('#areaId').append('<option value="">Select Area</option>');
                response.forEach(function (areas) {
                    $('#areaId').append('<option value="' + areas.area_id + '">' + areas.area_name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error calling route:', error);
            }
        });
    });
});
</script>
@endsection
