@extends('layouts.app')
@section('title', 'Home')
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
    h1 {
  color: darkgrey;
  white-space: nowrap;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 80px;
  font-family: sans-serif;
  letter-spacing: 0.1em;
  transition: 0.3s;
  text-shadow: 1px 1px 0 grey, 1px 2px 0 grey, 1px 3px 0 grey, 1px 4px 0 grey,
    1px 5px 0 grey, 1px 6px 0 grey, 1px 7px 0 grey, 1px 8px 0 grey,
    5px 13px 15px black;
}

.hover-effect {
  transition: 0.4s;
  transform: scale(1.1)translate( -50%,-50%);
  text-shadow: 1px -1px 0 grey, 1px -2px 0 grey, 1px -3px 0 grey,
    1px -4px 0 grey, 1px -5px 0 grey, 1px -6px 0 grey, 1px -7px 0 grey,
    1px -8px 0 grey, 5px -13px 15px black, 5px -13px 25px #808080;
}
  </style>
  @section('content')
  
      <section class="content">
        <div class="card" style="text-align:center;">
          
          <!-- /.card-header -->
          <h1 id="hover-heading"style="font-size: 60px;margin-top:2%">Welcome To Dashboard</h1>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      
  @endsection
  @push('scripts')
  <script>
    setInterval(function() {
        var heading = document.getElementById('hover-heading');
        heading.classList.toggle('hover-effect');
    }, 1000); // 1000 milliseconds = 1 second
</script>
  @endpush
