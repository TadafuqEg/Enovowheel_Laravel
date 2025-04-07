@extends('layouts.app')
@section('title', 'Contact Us')
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
              <h3 class="card-title font-weight-bold">Contact us</h3>
              <div class="d-flex align-items-center">

                
                <a href="{{url('/admin-dashboard/contact_us?export=excel')}}" class="btn btn-primary">Export  <i class="bi bi-download"></i> </a>
                
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
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 17.5%;">Email</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 17.5%;">Phone Number</th>
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 30%;">Message</th>
                     
                      <th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 5%;">Action</th>

                    </tr>
                  </table>
                </div>
  
                <div class="jsgrid-grid-body" style="max-height: 816.8px;">
                  <table class="jsgrid-table">
                    <tbody>
                      @if(!empty($contact_us) && $contact_us->count())
                        @foreach($contact_us as $contact_us1)
                          <tr class="jsgrid-row">
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 15%;">{{$contact_us1->first_name}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 15%;">{{$contact_us1->last_name}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 17.5%;">{{$contact_us1->email}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 17.5%;">{{$contact_us1->phone}}</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 30%;">@if(strlen($contact_us1->message)>50)
                                {{substr($contact_us1->message,0,50)}}...
                               @else
                               {{$contact_us1->message}}
                               @endif</td>
                            <td class="jsgrid-cell jsgrid-align-center" style="width: 5%;">
                          
                          
                          
                              <a href="{{url('/admin-dashboard/contact_us/show/'.$contact_us1->id)}}" style="margin-right: 1rem;">
                                <span  class="bi bi-eye" style="font-size: 1rem; color: rgb(0,0,255);"></span>
                              </a>
                              
                             
                            
                            
                          </td>
                          </tr>
                        @endforeach
                      @else
                          <tr>
                            <td colspan="10" class="text-center py-3">There are no thing.</td>
                          </tr>
                      @endif
                    </tbody>
                  </table>
                  {!! $contact_us->links("pagination::bootstrap-4") !!}
                </div>
              </div>
  
           
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
  @endsection
  @push('scripts')
  @endpush