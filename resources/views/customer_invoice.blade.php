
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>iCOM SRS | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="container ">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
        <img src="/dist/img/icom.jpg" alt="" width="180" height="100"> icom Computer Sales & Services
          <h5>No:C48, Myit Tar St; KanThar Quarter; Magway.</h5>
          <h5><p>lwinkohtay.icom@gmail.com , ph - 09401659114</p></h5>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      
      <!-- /.col -->
      <div class="col-sm-8 invoice-col">
        To
        <address>
          <strong> Customer Name : </strong>{{ $customer->name }}<br>
          Phone : {{ $customer->ph }}<br>

        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <b>Recepit No : {{ $customer->id}}</b><br>
      
        <b>Receving Date : </b> {{ $customer->created_at->format('Y-m-d') }}<br>
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 ">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Brand & Model</th>
            <td  colspan="7" class="text-center">{{ $customer->brand}}</td>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th>Hard Disk</th>
            <th>Ram</th>
            <th>VGA</th>
            <th>Drive</th>
            <th>Battery</th>
            <th>Adaptor</th>
            <th>Bag</th>
            
            <th>Note</th>
            <!-- <th>Servicer</th> -->
            
          </tr>
          
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $customer->adaptor}}</td>
            <td>{{ $customer->bag}}</td>
            
            <td>{{ $customer->note}}</td>
    
        
          </tbody>
          <tfoot>
            <tr>
            <th>Error</th>
            <td colspan="7" class="text-center">{{ $customer->error}}</td>
            </tr>
            
          </tfoot>
        </table>
        <b>Servicer : </b> {{ $customer->technicians->name }}<br>
      </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-12">
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        ???????????????????????????  ??? ?????????????????????????????????????????????????????? (???)????????? ?????????????????? ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ????????????????????????????????????????????????????????????(Phyisical error) ????????????????????? ?????????????????????????????????
    ?????????????????????????????????????????????????????????????????????????????????????????? ???????????????????????????????????????????????????????????????
        </p>
       <p>?????????????????? ???????????????????????????????????????????????????(??????)??????????????????????????? ??????????????????????????????????????? ????????????????????????????????? Data(???????????????) ?????????????????????????????????( ?????????????????????????????????????????????????????? ?????????????????????????????????????????????)</p> 
      </div>
      
    </div>
    <div class="row no-print pl-3">
        <div class="col-md-12">
          
          <a href="/customers" class="btn btn-success mr-3 float-right">back</a>
          <form action="/customers/{{$customer->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" ><i class="fas fa-trash-alt"></i>Delete Customer</button>
          </form>
        </div>
      </div><br>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>

