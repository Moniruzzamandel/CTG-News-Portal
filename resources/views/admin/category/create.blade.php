@extends('admin.layout.master')
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
   

                <div class="card">
                      <div class="card-header">
                          <strong class="card-title">{{ $page_name }}</strong>
                      </div>
                      <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
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
                                
                                <hr>

                {{ Form::open(array('url' => 'back/category/store','method'=>'post')) }}
                                
                                        
                            <div class="form-group">
                {{ Form::label('name', 'Name', array('class' => 'control-label mb-1')) }}
                                        
                {{ Form::text('name',null,['class'=>'form-control','id'=>'name'] )  }}
                            </div>                               


                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Submit</span>
                                    <span id="payment-button-sending" style="display:none;">Sendingâ€¦</span>
                                </button>
                            </div>
                {{ Form::close() }}
                            </div>
                        </div>

                      </div>
                  </div> <!-- .card -->


                </div> 
            </div>
        </div>
    </div>   

 @endsection                 