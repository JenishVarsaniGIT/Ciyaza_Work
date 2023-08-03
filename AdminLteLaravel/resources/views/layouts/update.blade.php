@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div>
     <section class="content">
       <div class="container-fluid">
        <div class="row">
           <div class="col-12">
             <div class="card">
               
               <div class="card-header">
                     <h4>Edit State</h4>
               </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
<body>    
    @if ($mess = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $mess }}</strong>
        </div>
    @endif

    <form action="{{ url('update-data/'.$state->id)}}" method="post">
    {{-- <form action="{{ url('/addstate')}}" method="post"> --}}
          {{ @csrf_field() }}
          @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputState">State:</label>
                    <input type="text" class="form-control" value="{{ $state->statename}}" autocomplete="off" name="statename" placeholder="Enter Your State name">
                    @if($errors->has('statename'))
                        <span class="text-danger">{{ $errors->first('statename') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputCode">Code:</label><br>
                    <input type="text"  class="form-control" value="{{$state->statecode}}" autocomplete="off" name="statecode" placeholder="Enter Your State Code">
                    @if($errors->has('statecode'))
                        <span class="text-danger">{{ $errors->first('statecode') }}</span>
                    @endif
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    <a class="btn btn-warning" href="/stateList">Back</a>
                  </div>
            </div>
    </form>
</body>
                </div>
             </div>
           </div>
        </div>
       </div>
     </section>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('plugins/datatable/jquery.datatable.min.js') }}"></script>
@endsection