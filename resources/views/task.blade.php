@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
                      @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                      @endif
                      @if (session('delete'))
                        <div class="alert alert-danger">
                            {{ session('delete') }}
                        </div>
                      @endif
              <div class="card-header">
                <h3 class="card-title">Tasks</h3>
                <a href="/tasks/create" class="btn btn-success" style="float:right">Create</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <table id="customers" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Received Date</th>
                        <th>Name</th>
                        <th>Brand/Model</th>
                        <th>Error</th>
                        <th>Estimated Amount</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Technician</th>
                        
                        <th>Action</th>
                      
                      </tr>
                  </thead>
                  <tbody>
                  @foreach( $tasks as $task)
                    <tr>
                        <td>{{ $task->created_at->format('Y-m-d')}}</td>
                        <td>{{ $task->customers->name}}</td>
                        <td>{{ $task->customers->brand}}</td>
                        <td>{{ $task->customers->error}}</td>
                        <td>{{ $task->estimated_amount}}</td>
                        <td>{{ $task->total_amount}}</td>
                        <td>@if($status[$task->status]==$status[2])<span class="badge bg-info">{{ $status[$task->status]}}</span>
                            @elseif($status[$task->status]==$status[3])
                            <span class="badge bg-success">{{ $status[$task->status]}}</span>
                            @else
                            <span class="badge bg-warning">{{ $status[$task->status]}}</span>
                            @endif
                        </td>
                        <td>{{ $task->technicians->name}}</td>
                        
                        
                       
                         
                         <td>
                         
                         <!-- Example single danger button -->
                         <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                    <a  href="/tasks/{{$task->id}}/edit" class="dropdown-item btn btn-success mr-2" >Edit</a>
                    <a  href="/tasks/{{$task->id}}/approve" class=" dropdown-item btn btn-success mr-2" >Process</a>
                    <a  href="/tasks/{{$task->id}}/cancel" class="dropdown-item btn btn-danger mr-2 ">Cancle</a>
                    <a  href="/tasks/{{$task->id}}/complete" class="dropdown-item btn btn-info mr-2 " >Complete</a>
                    {{-- <a  href="/tasks/{{$task->id}}/TunSend" class="dropdown-item btn btn-info mr-2 " >Sending TunService</a>
                    <a  href="/tasks/{{$task->id}}/TunArrived" class="dropdown-item btn btn-info mr-2 " >Arrived TunService</a> --}}
                    <a  href="/tasks/{{$task->id}}/completeNot" class="dropdown-item btn btn-warning my-2 " >Complete(TakeBack)</a>
                    <a  href="/tasks/{{$task->id}}/task_invoice" class="dropdown-item btn btn-warning my-2 " >Print Invoice</a>
                    </div>
                  </div></td>
                         
                        
                  </tr>
                  @endforeach
                 
                  </tbody>
                  
                </table>
              </div>
              
              <!-- /.card-body -->
              </div>
           
            
              </div>
        </div>
              
        
            
           
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
@endsection


<script src="/../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/../../dist/js/demo.js"></script>
<script>
  $(function () {
    $('div.alert').delay(3000).slideUp(300);
    $('#customers').DataTable({
      "paging": true,
      "lengthChange": false,
      "pageLength": 5,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#completed_task').DataTable({
      "paging": true,
      "lengthChange": false,
      "pageLength": 5,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
