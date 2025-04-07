@extends('layouts.app')
@section('title', 'Settings')
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
              <h3 class="card-title font-weight-bold">Settings</h3>
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                  <table class="jsgrid-table">
                    <tr class="jsgrid-header-row">
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 50%;">Lable</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">Category</th>
                     
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 25%;">Action</th>

                    </tr>
                  </table>
                </div>
  
                <div class="jsgrid-grid-body" style="max-height: 816.8px;">
                  <table class="jsgrid-table">
                    <tbody>
                      @if(!empty($settings) && $settings->count())
                        @foreach($settings as $setting)
                          <tr class="jsgrid-row">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 50%;">{{$setting->label}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;color:">{{$setting->category}}</td>

                            
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 25%;">
                              
                              
                             
                              <a href="{{url('/admin-dashboard/setting/edit/'.$setting->id)}}" style="margin-right: 1rem;">
                                <span  class="bi bi-pen" style="font-size: 1rem; color: rgb(0,255,0);"></span>
                              </a>
                             
                              
                             
                              
                            </td>
                          </tr>
                        @endforeach
                      @else
                          <tr>
                            <td colspan="10" class="text-center py-3">There are no Settings.</td>
                          </tr>
                      @endif
                    </tbody>
                  </table>
                  {!! $settings->links("pagination::bootstrap-4") !!}
                </div>
              </div>
  
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
