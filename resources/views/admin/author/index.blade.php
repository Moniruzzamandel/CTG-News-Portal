@extends('admin.layout.master')

@section('content')

        
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                <li class="active">{{ $page_name }}</li>
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
                    <strong class="card-title">{{ $page_name }} List Data</strong>
                <a href="{{ url('/back/author/create') }}" type="button" class="btn btn-outline-success btn-sm pull-right"><i class="fa fa-plus"></i>&nbsp; Create Author</a>
                </div>
                
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $i=>$row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td> 
                                        @if($row->roles()->get())
                                            @foreach($row->roles()->get() as $author)  
                                                <span class="badge badge-primary">{{ $author->name }}</span> 
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{ url('/back/author/edit/'.$row->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>

           {{ Form::open(['method'=>'DELETE','url'=>['/back/author/delete/'.$row->id],'style'=>'display:inline' ]) }}
           {{ Form::submit('Delete', ['class'=>'btn btn-outline-danger btn-sm']) }}
           {{ Form::close() }}
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


    

@endsection

@section('pagespecificscripts')

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


@endsection()