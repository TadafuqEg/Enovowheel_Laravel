@extends('layouts.app')
@section('title', 'Help Requests')
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
              <h3 class="card-title font-weight-bold">Help Requests</h3>
              <div class="d-flex align-items-center">
                <form class=" mx-2 my-0" id="search_categories" method="post" action="{{ route('help_requests') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="input-group">
                    <input type="search" style="height: 40px; font-size: 15px;" name="search" class="form-control form-control-lg"
                      placeholder="Type your keywords here">
                    <div class="input-group-append">
                      <button type="submit" style="height: 40px; font-size: 15px;" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
                
                
                
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                  <table class="jsgrid-table">
                    <tr class="jsgrid-header-row">
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 15%;">First Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 15%;">Last Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 30%;">Description</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 15%;">Phone</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 15%;">Type</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 10%;">Action</th>

                    </tr>
                  </table>
                </div>
  
                <div class="jsgrid-grid-body" style="max-height: 816.8px;">
                  <table class="jsgrid-table">
                    <tbody>
                      @if(!empty($help_requests) && $help_requests->count())
                        @foreach($help_requests as $request)
                          <tr class="jsgrid-row">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 15%;">{{$request->first_name}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 15%;">{{$request->last_name}}</td>
                            <td class="jsgrid-cell jsgrid-align-left" style="width: 30%;">
                                @if(strlen($request->description)>212)
                                 {{substr($request->description,0,212)}}...
                                @else
                                {{$request->description}}
                                @endif
                              </td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 15%;">{{$request->phone}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 15%;">{{$request->type}}</td>

                            
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 10%;">
                              
                              
                             
                              <a href="{{url('/admin-dashboard/help_request/show/'.$request->id)}}" style="margin-right: 1rem;">
                                <span  class="bi bi-eye" style="font-size: 1rem; color: rgb(0,0,255);"></span>
                              </a>

                            </td>
                          </tr>
                        @endforeach
                      @else
                          <tr>
                            <td colspan="10" class="text-center py-3">There are no Help Requests.</td>
                          </tr>
                      @endif
                    </tbody>
                  </table>
                  {!! $help_requests->links("pagination::bootstrap-4") !!}
                </div>
              </div>
  
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
