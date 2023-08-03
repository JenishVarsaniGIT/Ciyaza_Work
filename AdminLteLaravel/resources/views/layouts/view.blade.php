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
                <p class="card-title"><b>A list of all the State.</b></p><br><br>
                <div class="form-group">
                  
                  <input type="search" name="search" id="" style="float: left;width: 400px" class="form-control btn-sm" placeholder="Search by statename or statecode" value=""/>
                  
                  <button class="btn btn-primary" style="float: left">Search</button>

                  <a href="{{ url('/stateList') }}"><button class="btn btn-primary" style="float: left" type="button">Clear</button></a>

                    <a href="/stateadd"><button class="btn btn-success" type="submit" style="float: right">Add State</button></a><br><br>
                  </div>

              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>StateName</th>
                  <th>StateCode</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($states as $st )
                    <tr>
                      <td>{{$st->id}}</td>
                      <td>{{$st->statename}}</td>
                      <td>{{$st->statecode}}</td>
                      <td>{{$st->created_at}}</td>
                      <td>{{$st->updated_at}}</td>
                      <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="{{ url('editstate/'.$st->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a>
                        <a class="btn btn-danger btn-sm show_confirm" href="{{ url('delete/'.$st->id) }}"><i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table><br>
              <div class="row" style="float: right">
                {{ $states->links() }}
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 </div>
 
  @endsection

  @section('scripts')
    <script src="{{ asset('plugins/datatable/jquery.datatable.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js') }}"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
  </script>
  @endsection 