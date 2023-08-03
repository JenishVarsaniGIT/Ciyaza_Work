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
                     <h4>Edit City</h4>
               </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
<body>    
    @if ($mess = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $mess }}</strong>
        </div>
    @endif

    <form action="{{ url('update-city-data/'.$city->id)}}" method="post">
          {{ @csrf_field() }}
          @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputCiry">State_Name:</label><br>
                    <select class="form-control" name="state_id" id="state_id" aria-label="Default select example">
                        @foreach ($state as $st)
                        <option value={{$st->id}}>{{$st->statename}}</option>
                        @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputCity">City:</label>
                    <input type="text" class="form-control" value="{{ $city->cityname}}" autocomplete="off" name="cityname" placeholder="Enter Your City name">
                    @if($errors->has('cityname'))
                        <span class="text-danger">{{ $errors->first('cityname') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputCode">Code:</label><br>
                    <input type="text"  class="form-control" value="{{$city->citycode}}" autocomplete="off" name="citycode" placeholder="Enter Your City Code">
                    @if($errors->has('citycode'))
                        <span class="text-danger">{{ $errors->first('citycode') }}</span>
                    @endif
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    <a class="btn btn-warning" href="/cityList">Back</a>
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