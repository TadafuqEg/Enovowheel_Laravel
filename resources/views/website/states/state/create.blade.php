@extends('layouts.app')
@section('title', 'Create State')
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
              <h3 class="card-title">Create New State</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" method="post" action="{{route('create.state')}}" enctype="multipart/form-data">
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
                    <label>
                        <input type="checkbox" name="is_active"> Is Active
                    </label>
                </div>
               
              </div>
              
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