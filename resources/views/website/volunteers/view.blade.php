@extends('layouts.app')
@section('title', 'Volunteer')
<style>
    .pagination {
      justify-content: center !important;
      margin: 20px 0 !important;
    }
    .flex {
      margin-top: 20px;
    text-align: center;
    }
    .leading-5{
       margin-top: 10px;
    }
  </style>
  @section('content')
      <!-- Main content -->
      <section class="content">
        <div class="card">
          <div class="card-header">
            <div class="justify-content-between d-flex align-items-center w-100">
              <h3 class="card-title font-weight-bold">Volunteer</h3>
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" >
              <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                <div>
                    <h4>Name: {{$volunteer->first_name}} {{$volunteer->last_name}}</h4>
                    <h4>Phone: {{$volunteer->phone}}</h4>
                    <h4>Email: {{$volunteer->email}}</h4>
                   
                    
                    @if($volunteer->street_id != null)
                        <h4>Address: {{$volunteer->street->name}}, {{$volunteer->street->city->name}}, {{$volunteer->street->city->country->name}}</h4>
                        <div class="form-group">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                        <label id="lat" style="display:none;">{{$volunteer->street->lat}}</label>
                        <label id="lng" style="display:none;">{{$volunteer->street->lng}}</label>
                    @else
                    <div class="form-group">
                        <div id="map" style="height: 400px;"></div>
                    </div>
                    <label id="lat" style="display:none;">{{$volunteer->location['lat']}}</label>
                    <label id="lng" style="display:none;">{{$volunteer->location['lng']}}</label>
                    
                    @endif
                   
                    
                </div>
              </div>
  
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
  @push('scripts')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxwYHPlOB_Vx-td-034pb2wKkVk-W5gN4&libraries=places"></script>
  <script>
      var map;
      var marker;
    
      function initMap() {
          var lat = parseFloat($('#lat').text());
          var lng = parseFloat($('#lng').text());
          
          map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: lat, lng: lng}, // Center the map on the street's location
              zoom: 7 // Set the zoom level
          });
    
          marker = new google.maps.Marker({
              map: map,
              draggable: true, // Make the marker draggable
              position: {lat: lat, lng: lng} // Set the marker's position
          });
    
          // Update marker position when dragged
          
      }
    
      
    
      // Initialize the map when the page loads
      
    </script>
    <script>
        $(document).ready(function() {
            initMap();
        });
    </script>
  @endpush