@extends('layouts.app')
@section('title', 'States')
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
              <h3 class="card-title font-weight-bold">States</h3>
              <div class="d-flex align-items-center">
                <form class=" mx-2 my-0" id="search_categories" method="post" action="{{ route('states') }}" enctype="multipart/form-data">
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
                
                <a href="{{route('add.state')}}" class="btn btn-primary">Create State<i class="bi bi-plus"></i> </a>
                
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                  <table class="jsgrid-table">
                    <tr class="jsgrid-header-row">
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50%;">Name</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">Activation</th>
                     
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">Action</th>

                    </tr>
                  </table>
                </div>
  
                <div class="jsgrid-grid-body" style="max-height: 816.8px;">
                  <table class="jsgrid-table">
                    <tbody>
                      @if(!empty($all_states) && $all_states->count())
                        @foreach($all_states as $state)
                          <tr class="jsgrid-row">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50%;">{{$state->name}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;color:#fff;">@if($state->is_active==1) <span style="background-color: #008000;border-radius: 15px;padding:0px 10px 0px 10px;">Active</span> @else <span style="background-color: #B22222;border-radius: 15px;padding:0px 10px 0px 10px;">Inactive</span> @endif</td>

                            
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;">
                              
                              
                             
                              <a href="{{url('/admin-dashboard/state/edit/'.$state->id)}}" style="margin-right: 1rem;">
                                <span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span>
                              </a>
                             
                              <a href="{{url('/admin-dashboard/state/delete/'.$state->id)}}">
                                <span class="bi bi-trash" style="font-size: 1rem; color: rgb(255,0,0);"></span>
                              </a>
                             
                              
                            </td>
                          </tr>
                        @endforeach
                      @else
                          <tr>
                            <td colspan="10" class="text-center py-3">There are no States.</td>
                          </tr>
                      @endif
                    </tbody>
                  </table>
                  {!! $all_states->links("pagination::bootstrap-4") !!}
                </div>
              </div>
  
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
