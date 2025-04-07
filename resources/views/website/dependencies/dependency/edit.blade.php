@extends('layouts.app')
@section('title', 'Edit Dependency')
@section('content')
    <style>
        .text-error {
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
                            <h3 class="card-title">Edit Dependency</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post" action="{{ route('update.dependency', ['id' => $dependency->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control"  placeholder="Enter Name"value="{{ old(' name',$dependency->name) }}">
                  @if ($errors->has('name'))
                      <p class="text-error more-info-err" style="color: red;">
                          {{ $errors->first('name') }}</p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">State</label>
                    
                    <select name="state"class="form-control" placeholder="Select State">
                      <option value="">Select State</option>
                      @foreach($states as $state)
                      <option value="{{$state->id}}" @if(old('state',$dependency->country_id)==$state->id) selected @endif>{{$state->name}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('state'))
                        <p class="text-error more-info-err" style="color: red;">
                            {{ $errors->first('state') }}</p>
                    @endif
                  </div>
                
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_active" @if($dependency->is_active==1) checked @endif> Is Active
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
