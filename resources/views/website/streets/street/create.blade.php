@extends('layouts.app')
@section('title', 'Create Street')
@section('content')
<!-- Main content -->
<style>
  .text-error{
    font-size: 0.9rem;
  }

</style>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create New Street</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" method="post" action="{{route('create.street')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control"  placeholder="Enter Name"value="{{ old('name') }}">
                  @if ($errors->has('name'))
                      <p class="text-error more-info-err" style="color: red;">
                          {{ $errors->first('name') }}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">State</label>
                  
                  <select id="select_state" name="state"class="form-control" placeholder="Select State">
                    <option value="">Select State</option>
                    @foreach($states as $state)
                    <option value="{{$state->id}}" @if(old('state')==$state->id) selected @endif>{{$state->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('state'))
                      <p class="text-error more-info-err" style="color: red;">
                          {{ $errors->first('state') }}</p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dependency</label>
                    
                    <select id="select_dependency" name="dependency"class="form-control" placeholder="Select Dependency">
                        <option value="">Select Dependency</option>
                    </select>
                    @if ($errors->has('dependency'))
                        <p class="text-error more-info-err" style="color: red;">
                            {{ $errors->first('dependency') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <div id="map" style="height: 400px;"></div>
                    @if ($errors->has('lat') || $errors->has('lng'))
                        <p class="text-error more-info-err" style="color: red;">
                            Please choose location</p>
                    @endif
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_active"> Is Active
                    </label>
                </div>
               
              </div>
              <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
              
              <!-- /.card-body -->
              <div class="card-footer">
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
  
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

  <!-- /.content -->
  @endsection
  @push('scripts')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxwYHPlOB_Vx-td-034pb2wKkVk-W5gN4&libraries=places"></script>
  <script>
    var map;
    var marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 33.8869444, lng: 9.5375434}, // Initial center of the map
            zoom: 7 // Initial zoom level
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: {lat: 33.8869444, lng: 9.5375434} // Make the marker draggable
        });

        // Update marker position when dragged
        google.maps.event.addListener(marker, 'dragend', function(event) {
            updateLatLng(event.latLng);
        });

        // Update marker position on click
        google.maps.event.addListener(map, 'click', function(event) {
            marker.setPosition(event.latLng);
            updateLatLng(event.latLng);
        });
    }

    function updateLatLng(latLng) {
        // Update hidden inputs with latitude and longitude values
        $('#lat').val(latLng.lat());
        $('#lng').val(latLng.lng());
    }
</script>
    <script>
        $(document).ready(function() {
            initMap();
        $('#select_state').change(function() {
            var stateId = $(this).val();
            if (stateId) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('get.dependencies') }}',
                    data: { state_id: stateId },
                    success: function(response) {
                        $('#select_dependency').empty();
                        
                        
                        $.each(response.data, function(index, value) {
                            $('#select_dependency').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#select_dependency').empty();
            }
        });
    });
    </script>
    <!-- Add your Google Maps API key in the URL -->


  @endpush
