<?php require_once _DIR_ . '/app/Views/Admin/Layout/header.php' ?>
<?php
    if(isset($role)){
        $roles = $role;
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm user mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=_URL_ . '/admin/dashboard'?>">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
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
                        <form onsubmit="return false;">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="role">Quyền</label>
                                    <select class="form-control" name="role" id="role">
                                        <option value="0">Lựa chọn</option>
                                        <?php foreach($roles as $item) : ?>
                                        <option value="<?=$item['id']?>"><?=strtoupper($item['name'])?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span id="roleError" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name"
                                        name="name">
                                    <span id="nameError" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email">
                                    <span id="emailError" style="color:red"></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                    <span id="passwordError" style="color:red"></span>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="phone">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div>
                                    <span id="phoneError" style="color:red"></span>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image" id="labelImage">Choose
                                                file</label>
                                        </div>
                                    </div>
                                    <span id="fileError" style="color:red"></span>
                                    <div class="preview" style="margin-top: 2%;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <textarea id="address" name="address" class="form-control" rows="3"
                                        placeholder="Enter ..."></textarea>
                                    <span id="addressError" style="color:red"></span>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <span id="success"
                                style="display: flex; justify-content: flex-end; margin-right: 20px; color:darkgreen"></span>
                            <span id="error"
                                style="display: flex; justify-content: flex-end; margin-right: 20px; color:red"></span>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
$(document).ready(function() {
    const preview = document.querySelector('.preview');
    $('#image').change(function(e) {
        var file = e.target.files;
        const img_preview_old = document.querySelector('.img-preview');
        file = file[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function() {
            const url = reader.result;
            if (img_preview_old) {
                img_preview_old.remove();
            }
            if (!file['type'].search('image')) {
                preview.insertAdjacentHTML(
                    'beforeend',
                    `<img src="${url}" alt="${file.name}" class="img-preview" style="width: 100%"/> `
                )
            }
        }
    })

    $('form').submit(function() {
        var roleError = $('#roleError');
        var nameError = $('#nameError');
        var emailError = $('#emailError');
        var passwordError = $('#passwordError');
        var phoneError = $('#phoneError');
        var fileError = $('#fileError');
        var addressError = $('#addressError');
        var success = $('#success');
        var error = $('#error');
        var role = $('#role').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var file = $('#image').prop('files')[0];
        var dataForm = new FormData();

        dataForm.append('role_id', role);
        dataForm.append('name', name);
        dataForm.append('email', email);
        dataForm.append('password', password);
        dataForm.append('phone', phone);
        dataForm.append('address', address);
        dataForm.append('file', file);
        $.ajax({
            url: "<?=_URL_ . '/admin/user/store'?>",
            type: 'POST',
            data: dataForm,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (typeof(response['success']) != 'undefined') {
                    success.text(response['success']);
                    error.text('');
                } else {
                    roleError.text((response['role_id']) ? response['role_id'] : '');
                    nameError.text((response['name']) ? response['name'] : '');
                    emailError.text((response['email']) ? response['email'] : '');
                    passwordError.text((response['password']) ? response['password'] : '');
                    phoneError.text((response['phone']) ? response['phone'] : '');
                    fileError.text((response['image']) ? response['image'] : '');
                    addressError.text((response['address']) ? response['address'] : '');
                    success.text('');
                    error.text(response['errorSave']);
                }
            }
        })
    })
});
</script>
<?php require_once _DIR_ . '/app/Views/Admin/Layout/footer.php' ?>