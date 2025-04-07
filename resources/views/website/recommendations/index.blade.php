@extends('layouts.app')
@section('title', 'Recommendations')
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
              <h3 class="card-title font-weight-bold">Recommendations</h3>
              <div class="d-flex align-items-center">

                
                
                
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                  <table class="jsgrid-table">
                    <tr class="jsgrid-header-row">
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">First Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">Last Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">Email</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">Phone Number</th>
                      
                     
                      

                    </tr>
                  </table>
                </div>
  
                <div class="jsgrid-grid-body" style="max-height: 816.8px;">
                  <table class="jsgrid-table">
                    <tbody>
                      @if(!empty($recommendations) && $recommendations->count())
                        @foreach($recommendations as $recommendation)
                          <tr class="jsgrid-row">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;">{{$recommendation->first_name}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;">{{$recommendation->last_name}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;">{{$recommendation->email}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;">{{$recommendation->phone}}</td>
                            
                          </tr>
                        @endforeach
                      @else
                          <tr>
                            <td colspan="10" class="text-center py-3">There are no recommendations.</td>
                          </tr>
                      @endif
                    </tbody>
                  </table>
                  {!! $recommendations->links("pagination::bootstrap-4") !!}
                </div>
              </div>
  
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
