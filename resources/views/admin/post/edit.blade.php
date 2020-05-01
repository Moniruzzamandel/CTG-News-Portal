@extends('admin.layout.master')

@section('content')

<div class="content mt-3">
        <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Create Post</strong>
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
    {{ Form::model($post,['route' => ['post.update',$post->id],'method'=>'put','enctype'=>'multipart/form-data']) }}
                                 
                                      
                              <div class="form-group">
                {{ Form::label('title', 'Title', array('class' => 'control-label mb-1')) }}
                                          
                {{ Form::text('title',null,['class'=>'form-control','id'=>'title'] )  }}
                                    </div>
    
                                     <div class="form-group">
                {{ Form::label('category', 'Category', array('class' => 'control-label mb-1')) }}
                                          
                {{ Form::select('category_id',$categories,$post->category_id,['class'=>'form-control myselect','data-placeholder'=>'Select Category'] )  }}
                                    </div>
    
                                     <div class="form-group">
         {{ Form::label('short_description', 'Short Description', array('class' => 'control-label mb-1')) }}
                                          
        {{ Form::textarea('short_description',null,['class'=>'form-control my-editor','id'=>'short_description'] )  }}
                                    </div>
    
    
    
                                     <div class="form-group">
         {{ Form::label('description', 'Description', array('class' => 'control-label mb-1')) }}
                                          
        {{ Form::textarea('description',null,['class'=>'form-control my-editor','id'=>'description'] )  }}
                                    </div>
    
               <div class="form-group">
     {{ Form::label('image', 'Image', array('class' => 'control-label mb-1')) }}
                                          
     {{ Form::file('img',['class'=>'form-control'] )  }}
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

              </div><!--/.col-->
            </div>
        </div>  
</div>

@endsection

@section('pagespecificscripts')
    @include('admin.layout.bottom')
@endsection