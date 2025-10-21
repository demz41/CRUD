<?php 
@include "includes/header.php";
include "includes/dbconnection.php";
session_start();
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php @include "includes/navbar.php";?>
  <?php @include "includes/sidebar.php";?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Record</h1>
            
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Back</a></li>
              <li class="breadcrumb-item active">Course</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <?php
        if(isset($_SESSION['error'])){
          echo "
          <div class='alert alert-danger alert-dismissible fade show'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
            ".$_SESSION['error']."
          </div>";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
          <div class='alert alert-success alert-dismissible fade show'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <h4><i class='icon fa fa-check'></i> SUCCESS!</h4>
            ".$_SESSION['success']."
          </div>";
          unset($_SESSION['success']);
        }
        ?>
      </div>

      <div class="card">
              <div class="card-header">
                      <h3 class="card-title"> 
              <a href="#add" data-toggle="modal" class="btn bg-gradient-maroon btn-sm"><i class="fa fa-plus"></i> New</a>
              </h3>
			      	<div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <!-- ✅ Removed blue color, using default theme -->
            <thead>
              <tr>
                <th style="width:5%">#</th>
                <th style="width:30%">Course</th>
                <th style="width:45%">Description</th>
                <th style="width:20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM tbl_course ORDER BY COURSE_NAME ASC";
                $query = $conn->query($sql);
                $cnt = 1;
                while($row = $query->fetch_assoc()){
              ?>
              <tr>
                <td><?= $cnt++; ?></td>
                <td><?= htmlspecialchars($row['COURSE_NAME']); ?></td>
                <td><?= htmlspecialchars($row['DESCRIPTION']); ?></td>
                <td>
                  <button data-id="<?= $row['ID']; ?>" class="btn bg-success btn-sm edit">
                    <i class="fa fa-edit"></i> Edit
                  </button>
                  <button data-id="<?= $row['ID']; ?>" class="btn bg-danger btn-sm delete">
                    <i class="fa fa-trash"></i> Delete
                  </button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <?php include "includes/course_modal.php";?>
  <?php include "includes/footer.php";?>
</div>

<!-- jQuery + Bootstrap + AdminLTE -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

<!-- ✅ DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script>
$(function () {
  $("#example1").DataTable({
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "paging": true,
    "ordering": true,
    "info": true,
    "pageLength": 10
  });

  $('body').on('click','.edit',function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('body').on('click','.delete',function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'course_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.ID);
      $('#edit_title').val(response.COURSE_NAME);
      $('#edit_description').val(response.DESCRIPTION);
      $('.del_title').html(response.COURSE_NAME);
      $('.del_description').html(response.DESCRIPTION);
    }
  });
}
</script>
</body>
</html>
