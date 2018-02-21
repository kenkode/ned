@extends('layouts.main')
@section('content')

<div class="row">
	<div class="col-lg-12">
  <h3>Compliances</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-12">

     @if (Session::has('flash_message'))

      <div class="alert alert-success">
      {{ Session::get('flash_message') }}
     </div>
    @endif

     @if (Session::has('delete_message'))

      <div class="alert alert-danger">
      {{ Session::get('delete_message') }}
     </div>
    @endif

    <div class="panel panel-default">
      <div class="panel-heading">
          <a class="btn btn-info btn-sm" href="{{ URL::to('compliance/create')}}">new compliance</a>
        </div>
        <div class="panel-body">


    <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th>Employee</th>
        <th>Reason</th>
        <th>Action Taken</th>
        <th>Days</th>
        <th>Date</th>
        <th>Action</th>

      </thead>

      <tfoot>

        <th>#</th>
        <th>Employee</th>
        <th>Reason</th>
        <th>Action Taken</th>
        <th>Days</th>
        <th>Date</th>

      </tfoot>

      <tbody>

        <?php $i = 1; ?>
        @foreach($disciplines as $discipline)

        <tr>

          <td> {{ $i }}</td>
          <td>{{ Discipline::getEmployee($discipline->employee_id) }}</td>
          <td>{{ $discipline->reason }}</td>
          <td>{{ $discipline->action }}</td>
          <td>{{ $discipline->days }}</td>
          <td>{{ $discipline->discipline_date }}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('compliance/show/'.$discipline->id)}}">View</a></li>
                   
                    <li><a href="{{URL::to('compliance/edit/'.$discipline->id)}}">Update</a></li>
                   
                    <li><a href="{{URL::to('compliance/delete/'.$discipline->id)}}" onclick="return (confirm('Are you sure you want to delete this compliance?'))">Delete</a></li>
                    
                  </ul>
              </div>

                    </td>



        </tr>

        <?php $i++; ?>
        @endforeach


      </tbody>


    </table>
  </div>


  </div>

</div>

@stop