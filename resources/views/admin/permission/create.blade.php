@extends('admin.layout.master')

@section('content')

<div class="content mt-3">
        <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Create Permission</strong>
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
                              {!! Form::open(['url' => 'back/permission/store', 'method' => 'post']) !!}
                                
                                  <div class="form-group">
                                     
    {{ Form::label("name", 'Name', ['class' => 'control-label mb-1']) }}
    {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Please Enter Your Name']) }} 

                                  </div>
                                  
                                  <div class="form-group has-success">

    {{ Form::label('display_name', 'Display Name', ['class'=>'control-label mb-1']) }} 
    {{ Form::text('display_name', null, ['class'=>'form-control cc-name valid textarea', 'id'=>'display_name', 'placeholder'=>'Please Enter Display Name']) }}

                                  </div>

                                  <div class="form-group">

    {{ Form::label('description', 'Discription', ['class'=>'control-label mb-1']) }}  
    {{ Form::textarea('description', null, ['class'=>'form-control valid', 'id'=>'editor description', 'placeholder'=>'Please Enter Discription Here']) }}

                                  </div>
                                  
                                  <div>
                                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                                          <span id="payment-button-amount">Submit</span>
                                      </button>
                                  </div>
                                {!! Form::close() !!}
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
    <script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js ') }}"></script>
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>    
    <script src="{{ asset('admin/assets/js/plugins.js ') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace( 'description' ); </script>
@endsection