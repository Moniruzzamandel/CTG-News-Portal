@extends('admin.layout.master')

@section('content')

<div class="content mt-3">
        <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Update Setting</strong>
                    </div>
                    <div class="card-body">
                      <!-- Credit Card -->
                      <div id="pay-invoice">
                          <div class="card-body">
                              <div class="card-title">
                        @if(count($errors) > 0 )
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                              </div>
       {{ Form::open(['url' => '/back/settings/update','method'=>'put','enctype'=>'multipart/form-data']) }}
                                 
                                      
                              <div class="form-group">
                {{ Form::label('name', 'System Name', array('class' => 'control-label mb-1')) }}
                                          
                {{ Form::text('name',$system_name,['class'=>'form-control','id'=>'name'] )  }}
                                    </div>
    
      <div class="form-group">
    <p>
        @if($fav)                                     
            @if(file_exists(public_path('/others/').$fav))
                <img src="{{ asset('others') }}/{{ $fav }} " class="img img-responsive">
            @endif 
        @endif 
    </p>
                 
                 
     {{ Form::label('favicon', 'Favicon', array('class' => 'control-label mb-1')) }}
                                          
     {{ Form::file('favicon',['class'=>'form-control'] )  }}
                                    </div> 
    
                                      <div class="form-group">
     <p>
        @if($front)                                     
            @if(file_exists(public_path('/others/').$front))
                <img src="{{ asset('others') }}/{{ $front }} " class="img img-responsive">
            @endif 
         @endif 
     </p>
                                         
     {{ Form::label('front_logo', 'Front Logo', array('class' => 'control-label mb-1')) }}
                                          
     {{ Form::file('front_logo',['class'=>'form-control'] )  }}
                                    </div> 
    
                                      <div class="form-group">
    <p>
        @if($admin)                                     
            @if(file_exists(public_path('/others/').$admin))
                <img src="{{ asset('others') }}/{{ $admin }} " class="img img-responsive">
            @endif 
        @endif 
    </p>                                     
     {{ Form::label('admin_logo', 'Admin Logo', array('class' => 'control-label mb-1')) }}
                                          
     {{ Form::file('admin_logo',['class'=>'form-control'] )  }}
                                    </div> 
    
    
    
                                    
     
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Update</span>
                            <span id="payment-button-sending" style="display:none;">Sendingâ€¦</span>
                        </button>
                    </div>
                                      {{ Form::close() }}
                          </div>
                      </div>

                    </div>
                  </div> <!-- .card -->

              </div><!--/.col-->
            </div>
        </div>  
</div>

@endsection

@section('pagespecificscripts')
    @include('admin.layout.bottom')
@endsection