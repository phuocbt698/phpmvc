<?php require_once _DIR_ . '/app/Views/Admin/Layout/header.php' ?>
<?php
    if(isset($data)){
      $role = $data;
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách role</h1>
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
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                    <?php foreach($role as $key=>$item): ?>
                                    <tr>
                                        <td>
                                            <?=$key+1?>
                                        </td>
                                        <td>
                                            <?=$item['name']?>
                                        </td>
                                        <td>
                                            <a href="<?=_URL_ . '/admin/role/update/' . $item['id']?>"
                                                style="margin-right: 25px;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                                onclick="deleteItem(<?=$item['id']?>)">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
function deleteItem(id) {
    var check = confirm('Bạn có thực sự muốn xóa dòng dữ liệu này? Nó sẽ không thể khôi phục lại được?');
    if (check) {
        $.ajax({
            url: "<?=_URL_ . '/admin/role/delete/'?>" + id,
            method: 'POST',
            success: function(data) {
                var data = JSON.parse(data);
                var table = $('#data');
                table.empty();
                $.each(data, function(key, item) {
                    table.append(
                        "<tr>" +
                        "<td>" + (key+1) + "</td>" +
                        "<td>" + item['name'] + "</td>" +
                        "<td>" + 
                        "<a href='<?=_URL_ . '/admin/role/update/'?>" + item['id'] + "' style='margin-right: 25px;'>" +
                         "<i class='fas fa-edit'></i>"+
                        "</a>"+
                        "<a href='javascript:void(0)' style='margin-right: 25px;' onclick='deleteItem(" + item['id'] +")'>" +
                         "<i class='fas fa-trash'></i>"+
                        "</a>"+
                        "</td>" +
                        "</tr"
                        );
                });
            }
        });
    }
};
</script>
<?php require_once _DIR_ . '/app/Views/Admin/Layout/footer.php' ?>