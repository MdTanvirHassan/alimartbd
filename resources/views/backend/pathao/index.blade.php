@extends('backend.layouts.app')

@section('content')

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Access Token</th>
                    <th>Refresh Token</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Pathao_courier as $key => $pathao_courier)
                    <tr>
                        <td>{{ $pathao_courier->access_token }}</td> 
                        <td>{{ $pathao_courier->refresh_token }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-md-3">
        <button class="btn btn-primary" id="filterButton" type="button">{{ translate('Issue a token') }}</button>

    </div>
    <div class="col-md-3">
        <button class="btn btn-success" id="filterButton2" type="button">{{ translate('Create a new Order  ') }}</button>
    </div>
    <div class="col-md-3">   
        <button class="btn btn-success" id="filterButton3" type="button">{{ translate('Create a new Store  ') }}</button>
    </div>
    <div class="col-md-3">
        <button class="btn btn-success" id="filterButton4" type="button">{{ translate('Create a new Bulk Order  ') }}</button>
    </div>
    <div class="col-md-3">
        <button class="btn btn-success" id="filterButton5" type="button">{{ translate('Create Cities ') }}</button>
    </div>
    <div class="col-md-3">
        <button class="btn btn-success" id="filterButton6" type="button">{{ translate('Get Zone ') }}</button>
    </div>
    <div class="col-md-3">
        <button class="btn btn-success" id="filterButton7" type="button">{{ translate('Get area ') }}</button>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $(document).ready(function() {
        $('#filterButton3').click(function() {
            $.ajax({
                url: '{{ route("pathao.newStore") }}', 
                type: 'POST', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response) {
                    console.log('Route called successfully');
                    
                },
                error: function(xhr, status, error) {
                    console.error('Error calling route:', error);
                    
                }
            });
        });
    });
     $(document).ready(function() {
        $('#filterButton7').click(function() {
            $.ajax({
                url: '{{ route("pathao.get_area") }}', 
                type: 'GET', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response) {
                    console.log('Route called successfully');
                    
                },
                error: function(xhr, status, error) {
                    console.error('Error calling route:', error);
                    
                }
            });
        });
    });
     $(document).ready(function() {
        $('#filterButton6').click(function() {
            $.ajax({
                url: '{{ route("pathao.zone") }}', 
                type: 'GET', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response) {
                    console.log('Route called successfully');
                    
                },
                error: function(xhr, status, error) {
                    console.error('Error calling route:', error);
                    
                }
            });
        });
    });
     $(document).ready(function() {
        $('#filterButton5').click(function() {
            $.ajax({
                url: '{{ route("pathao.get_city") }}', 
                type: 'GET', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response) {
                    console.log('Route called successfully');
                    
                },
                error: function(xhr, status, error) {
                    console.error('Error calling route:', error);
                    
                }
            });
        });
    });

     $(document).ready(function() {
        $('#filterButton').click(function() {
            $.ajax({
                url: '{{ route("pathao.issueToken") }}', 
                type: 'POST', 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response) {
                    console.log('Route called successfully');
                    
                },
                error: function(xhr, status, error) {
                    console.error('Error calling route:', error);
                    
                }
            });
        });
    });

    $(document).ready(function() {
    $('#filterButton2').click(function() {
        $.ajax({
            url: '{{ route("pathao.newOrder") }}', 
            type: 'POST', 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                console.log('Route called successfully');
                alert(response.message);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error calling route:', error);
            }
        });
    });
});

$(document).ready(function() {
    $('#filterButton4').click(function() {
        $.ajax({
            url: '{{ route("pathao.newBulkOrder") }}', 
            type: 'POST', 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(response) {
                console.log('Route called successfully');
                alert(response.message + ' ' + response.message2); 
            },
            error: function(xhr, status, error) {
                console.error('Error calling route:', error);
            }
        });
    });
});

</script>
@endsection