<?php require_once _DIR_ . '/app/Views/Admin/Layout/header.php' ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÊM MỚI ROLE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=_URL_ . '/admin/dashboard'?>">Home</a></li>
              <li class="breadcrumb-item active">Role</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form-data" action="<?=_URL_ . '/admin/role/store'?>" method="POST" onsubmit="return false;">
             
                <div class="card-body">
                  <div class="form-group" id="role_Name">
                    <label for="name">Quyền hạn</label>
                    <input name="name" type="text" class="form-control " id="name" placeholder="Nhập tên danh mục">
                    <span id="name_Error" class="error invalid-feedback"></span>
                  </div>
                </div>
                <!-- /.card-body -->    
                <span id="name_Success" class="error " style="display: flex; justify-content: flex-end; margin-right: 20px; color:darkgreen"></span>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once _DIR_ . '/app/Views/Admin/Layout/footer.php' ?>
  <script>
    $(document).ready(function(){
        var nameInput = $('#name');
        var roleName = $('#category_Name');
        var nameError = $('#name_Error');
        var nameSuccess = $('#name_Success');
        $('form').submit(function(){
            var name = nameInput.val();
            var dataForm = new FormData();
            dataForm.append('name', name);
            $.ajax({
              url: "<?= _URL_ . '/admin/role/store'?>",
              type: 'POST',
              data: dataForm,
              processData: false,
              contentType: false,
              dataType:'json',
              success: function(response){
                if(typeof(response['success']) != 'undefined'){
                  nameSuccess.text(response['success']);
                  nameInput.addClass('is-valid');
                  nameInput.remove('is-invalid');
                  nameError.text('');
                }else{
                  nameInput.addClass('is-invalid');
                  nameInput.remove('is-valid');
                  nameError.text(response['name']);
                  nameSuccess.text('');
                }
            }
            });
        });
    });
  </script>