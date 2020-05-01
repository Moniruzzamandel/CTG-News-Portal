@extends('admin.layout.master')
@section('content')


  <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css ') }}">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
  




<div class="breadcrumbs">
          <div class="col-sm-4">
              <div class="page-header float-left">
                  <div class="page-title">
                      <h1>{{ $page_name }}</h1>
                  </div>
              </div>
          </div>
          <div class="col-sm-8">
              <div class="page-header float-right">
                  <div class="page-title">
                      <ol class="breadcrumb text-right">
                          <li><a href="#">Dashboard</a></li>
                          <li><a href="#">Table</a></li>
                          <li class="active">Data table</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content mt-3">
          <div class="animated fadeIn">
              <div class="row">

              <div class="col-md-12">
                  <div class="card">

                      <div class="card-header">
                          <strong class="card-title">{{ $page_name }}</strong>
    @permission(['Category Add','All'])              
        <a href="{{ url('/back/category/create') }}" type="button" class="btn btn-outline-success btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Create Category</a>           
    @endpermission
                      </div>
                      <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>                      
                        <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($data as $i=>$row)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $row->name }}</td>
                      <td> 
    {{ Form::open(['method'=>'PUT','url'=>['/back/category/status/'.$row->id],'style'=>'display:inline' ]) }}
        @if($row->status === 1)
            {{ Form::submit('Unpublish',['class'=>'btn btn-outline-danger btn-sm']) }}
            @else
            {{ Form::submit('Publish',['class'=>'btn btn-outline-success btn-sm']) }}
        @endif
    {{ Form::close() }}
                       </td>
                      
                      <td>
    @permission(['Category Add','All','Category Update']) 
    <a href="{{ url('/back/category/edit/'.$row->id) }} " class="btn btn-outline-primary btn-sm">Edit</a>
    @endpermission
    @permission(['Category Delete','All']) 
    {{ Form::open(['method'=>'DELETE','url'=>['/back/category/delete/'.$row->id],'style'=>'display:inline' ]) }}
    {{ Form::submit('Delete',['class'=>'btn btn-outline-danger btn-sm']) }}
    {{ Form::close() }}
    @endpermission
                       </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
                      </div>
                  </div>
              </div>


              </div>
          </div><!-- .animated -->
      </div><!-- .content -->

      <script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js ') }}"></script>
      <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>    
      <script src="{{ asset('admin/assets/js/plugins.js ') }}"></script>
      <script src="{{ asset('admin/assets/js/main.js ') }}"></script>
      <script src="{{ asset('admin/assets/js/toaster.min.js') }}"></script>

<script src="{{ asset('admin/assets/js/lib/data-table/datatables.min.js') }}  "></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/jszip.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/pdfmake.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/vfs_fonts.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/buttons.html5.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/buttons.print.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/buttons.colVis.min.js ') }}"></script>
  <script src="{{ asset('admin/assets/js/lib/data-table/datatables-init.js ') }}"></script>


  <script type="text/javascript">
      $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
      } );
      @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
  </script>







@endsection