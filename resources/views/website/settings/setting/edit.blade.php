@extends('layouts.app')
@section('title', 'Edit Setting')
@section('content')
    <style>
        .text-error {
            font-size: 0.9rem;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Setting</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post" action="{{ route('update.setting', ['id' => $setting->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Label</label>
                  <input type="text" name="label" class="form-control"  placeholder="Enter Label"value="{{ old(' label',$setting->label) }}">
                  @if ($errors->has('label'))
                      <p class="text-error more-info-err" style="color: red;">
                          {{ $errors->first('label') }}</p>
                  @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input disabled type="text" name="category" class="form-control"  placeholder="Enter Category"value="{{ old(' category',$setting->category) }}">
                   
                </div>
                @if($setting->type=='textarea')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Value</label>
                        
                        <textarea name="value" class="form-control" style="height: 200px;" placeholder="Enter Your Text">{{ old(' value',$setting->value) }}</textarea>
                    </div>
                @elseif($setting->type=='file')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Value</label>
                        @if($setting->value !=null)
                        <p for="exampleInputEmail1">Existed File: <a href="{{url($setting->value)}}" target="_blank">here</a></p>
                        @endif
                        <input type="file"name="value"class="form-control">
                        @if ($errors->has('value'))
                            <p class="text-error more-info-err" style="color: red;">
                                {{ $errors->first('value') }}</p>
                        @endif
                    </div>
                @elseif($setting->type=='points')
                @endif
                
                
                
               

                
                

               
                
               
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
@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'underline',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'fontColor',  // Add fontColor option
                'fontBackgroundColor',
                'highlight',
                '|',
                'alignment',
                '|',
                'undo',
                'redo'
            ],
            language: 'en'
        })
        .then(editor => {
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
