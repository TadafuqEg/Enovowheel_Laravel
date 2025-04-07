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
              <h3 class="card-title font-weight-bold">Question</h3>
              
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body" >
              <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;">
                <div>
                    <h4>Name&nbsp;&nbsp;&nbsp;:<b> {{$question->first_name}} {{$question->last_name}}</b></h4>
                    <h4>Phone&nbsp;&nbsp;:<b> {{$question->phone}}</b></h4>
                    <h4>Emai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<b> {{$question->email}}</b></h4>
                    <textarea style="width: 100%;height: 200px;padding: 10px;" readonly>{{$question->message}}</textarea>
                    
                    
                   
                    
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