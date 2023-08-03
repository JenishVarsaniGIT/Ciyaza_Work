@extends('layouts.app')
@section('content')

 <div class="content-wrapper">
 <div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <p class="card-title"><b>A list of all the City.</b></p><br><br>
                <div class="form-group">

                  <input type="search" name="search" id="" class="form-control" style="float:left;width: 400px" placeholder="Search by Cityname or Citycode"  value=""/>
                  
                  <button class="btn btn-primary" style="float: left">Search</button>
                  
                  <a href="{{ url('/cityList') }}"><button class="btn btn-primary" style="float: left" type="button">Clear</button></a>

                  <a href="/cityadd"><button class="btn btn-success" type="submit" style="float: right">Add City</button></a><br><br>
                </div>
              
              <table id="example2" class="table table-bordered table-hover">
                <thead>

                <tr>
                  <th>Id
                    {{-- <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer;">
                      <i class="fa fa-arrow-up"></i>
                      <i class="fa fa-arrow-down text-muted"></i>
                    </span> --}}
                  </th>
                  <th>State_Name</th>
                  <th>CityName
                    {{-- <span class="float-right text-sm">
                      <i class="fa fa-arrow-up"></i>
                      <i class="fa fa-arrow-down"></i>
                    </span> --}}
                  </th>
                  <th>CityCode
                    {{-- <span class="float-right text-sm">
                      <i class="fa fa-arrow-up"></i>
                      <i class="fa fa-arrow-down"></i>
                    </span> --}}
                  </th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($citys as $ct)
                    <tr>
                      <td>{{$ct->id}}</td>
                      <td>{{$ct->state_id}}</td>
                      <td>{{$ct->cityname}}</td>
                      <td>{{$ct->citycode}}</td>
                      <td>{{$ct->created_at}}</td>
                      <td>{{$ct->updated_at}}</td>
                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ url('editcity/'.$ct->id)}}"><i class="fas fa-pencil-alt"></i>Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{ url('Delete/'.$ct->id)}}"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table><br>
              <div class="row" style="float: right">
                  {{ $citys->links() }}
              </div>
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