@extends('layouts.app')
@section('title', 'Create FAQ')
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
              <h3 class="card-title">Create New FAQ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" method="post" action="{{route('create.FAQ')}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Question</label>
                  <input type="text" name="question" class="form-control"  placeholder="Enter Question"value="{{ old('question') }}">
                  @if ($errors->has('question'))
                      <p class="text-error more-info-err" style="color: red;">
                          {{ $errors->first('question') }}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Answer</label>
                  <textarea name="answer" class="form-control"  placeholder="Enter Answer" style=" height: 200px;">{{ old('answer') }}</textarea>
                  
                  @if ($errors->has('answer'))
                      <p class="text-error more-info-err" style="color: red;">
                          {{ $errors->first('answer') }}</p>
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