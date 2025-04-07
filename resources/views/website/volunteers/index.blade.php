@extends('layouts.app')
@section('title', 'Volunteers')
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
              <h3 class="card-title font-weight-bold">Volunteers</h3>
              <div class="d-flex align-items-center">
                <form class=" mx-2 my-0" id="search_categories" method="post" action="{{ route('volunteers') }}" enctype="multipart/form-data">
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
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 22.5%;">First Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 22.5%;">Last Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 22.5%;">Email</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 22.5%;">Phone</th>
                      
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 10%;">Action</th>

                    </tr>
                  </table>
                </div>
  
                <div class="jsgrid-grid-body" style="max-height: 816.8px;">
                  <table class="jsgrid-table">
                    <tbody>
                      @if(!empty($volunteers) && $volunteers->count())
                        @foreach($volunteers as $volunteer)
                          <tr class="jsgrid-row">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 22.5%;">{{$volunteer->first_name}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 22.5%;">{{$volunteer->last_name}}</td>
                           
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 22.5%;">{{$volunteer->phone}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 22.5%;">{{$volunteer->email}}</td>

                            
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 10%;">
                              
                              
                             
                              <a href="{{url('/admin-dashboard/volunteer/show/'.$volunteer->id)}}" style="margin-right: 1rem;">
                                <span  class="bi bi-eye" style="font-size: 1rem; color: rgb(0,0,255);"></span>
                              </a>

                            </td>
                          </tr>
                        @endforeach
                      @else
                          <tr>
                            <td colspan="10" class="text-center py-3">There are no Volunteers.</td>
                          </tr>
                      @endif
                    </tbody>
                  </table>
                  {!! $volunteers->links("pagination::bootstrap-4") !!}
                </div>
              </div>
  
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
