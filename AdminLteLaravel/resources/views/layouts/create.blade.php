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
                     <i><h4>Create a New State</h4></i>
               </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
<body>    
    @if ($mess = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $mess }}</strong>
        </div>
    @endif

    <form action="/addstate" method="post">
          @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputState">State:</label>
                    <input type="text" class="form-control" id="statename" autocomplete="off" name="statename" placeholder="Enter Your State name" value="{{ old('statename')}}">
                    @if($errors->has('statename'))
                        <span class="text-danger">{{ $errors->first('statename') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputCode">Code:</label><br>
                    <input type="text"  class="form-control" id="statecode" autocomplete="off" name="statecode" placeholder="Enter Your State Code" value="{{ old('statecode')}}">
                    @if($errors->has('statecode'))
                        <span class="text-danger">{{ $errors->first('statecode') }}</span>
                    @endif
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="submit">
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