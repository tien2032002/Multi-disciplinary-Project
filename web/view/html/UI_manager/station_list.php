<?php
    //decode station list
    $stationList = json_decode($stationList);
?>
<!-- page title -->
<div class="content__title">
    <div class="h1">Danh sách trạm</div>
    <br>
</div>
<!-- page content -->
<!-- begin: station list table -->
<!-- begin: data table -->



<table id="example" class="table table-striped mt-5" style="width:100%">
    <thead>
        <tr>
            <th scope="col">ID </th>
            <th scope="col">Tên trạm</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Tổng doanh thu</th>
            <th scope="col">Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($stationList as $station) {
            $station = json_decode($station);
            echo '
            <tr>
                <th scope="row">'.$station->id.'</th>
                <td>'.$station->name.'</td>
                <td>'.$station->address.'</td>
                <td>'.$station->revenue.'</td>
                <td>
                    <button type="button" href="index.php?controller=manager&action=environment&stationID='.$station->id.'" class="btn btn-sm btn-info">Môi trường</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#editModal'.$station->id.'" class="btn btn-sm btn-primary ">Sửa</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal'.$station->id.'" class="btn btn-sm btn-danger">Xóa</button>
                </td>
            </tr>
            ';

            //modal edit and delete

            echo '
                <!-- begin: delete modal -->
                <div class="modal fade" id="deleteModal'.$station->id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Xác nhận xóa?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Quay lại</button>
                            <button type="button" class="btn btn-danger">Xác nhận</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end: delete modal -->

                <!-- begin: edit modal -->
                <div class="modal fade" id="editModal'.$station->id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa thông tin trạm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="POST">
                                <!-- station ID -->
                                <div class="form-group">
                                    <label for="stationID">ID</label>
                                    <input type="text" class="form-control" id="stationID" name="stationID" placeholder="Nhập ID">
                                </div>
                                <!-- station name -->
                                <div class="form-group">
                                    <label for="stationName">Tên trạm</label>
                                    <input type="text" class="form-control" id="stationName" name="stationName" placeholder="Nhập tên trạm">
                                </div>
                                <!-- station address -->
                                <div class="form-group">
                                    <label for="stationAddress">Địa chỉ</label>
                                    <input type="text" class="form-control" id="stationAddress" name="stationAddress" placeholder="Nhập địa chỉ trạm">
                                </div>
                                <!-- station capacity -->
                                <div class="form-group">
                                    <label for="stationCapacity">Sức chứa</label>
                                    <input type="text" class="form-control" id="stationCapacity" name="stationCapacity" placeholder="Nhập sức chứa trạm">
                                </div>
                                <!-- station num of bikes -->
                                <div class="form-group">
                                    <label for="stationNumOfBikes">Số xe trong trạm</label>
                                    <input type="text" class="form-control" id="stationNumOfBikes" name="stationNumOfBikes" placeholder="Nhập số xe trong trạm">
                                </div>
                                <!-- station status -->
                                <div class="form-group">
                                    <label for="stationStatus">Trạng thái</label>
                                    <input type="text" class="form-control" id="stationStatus" name="stationStatus" placeholder="Nhập số xe trong trạm">
                                </div> 

                                <!-- station started day -->
                                <div class="form-group">
                                    <label for="stationStartedDay">Ngày đi vào hoạt động</label>
                                    <input type="text" class="form-control" id="stationStartedDay" name="stationStartedDay" placeholder="Nhập ngày đi vào hoạt động của trạm">
                                </div>                      
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                            <button type="button" class="btn btn-primary">Xác nhận</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end: edit modal -->
            ';
        } 
        ?>
        <tr>
            <th scope="row">002</th>
            <td>Khoa học tự nhiên</td>
            <td>227 Đ. Nguyễn Văn Cừ</td>
            <td>100.000</td>
            <td>
                <button type="button" onclick="location.href='enviroment.html'" class="btn btn-sm btn-info">Môi trường</button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-sm btn-primary ">Sửa</button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">Xóa</button>
            </td>
        </tr>
</table>
<!-- end: data table -->

<!--begin: add modal -->
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Thêm trạm mới</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="POST">
                <!-- station ID -->
                <div class="form-group">
                    <label for="stationID">ID</label>
                    <input type="text" class="form-control" id="stationID" name="stationID" placeholder="Nhập ID">
                </div>
                <!-- station name -->
                <div class="form-group">
                    <label for="stationName">Tên trạm</label>
                    <input type="text" class="form-control" id="stationName" name="stationName" placeholder="Nhập tên trạm">
                </div>
                <!-- station address -->
                <div class="form-group">
                    <label for="stationAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="stationAddress" name="stationAddress" placeholder="Nhập địa chỉ trạm">
                </div>
                <!-- station capacity -->
                <div class="form-group">
                    <label for="stationCapacity">Sức chứa</label>
                    <input type="text" class="form-control" id="stationCapacity" name="stationCapacity" placeholder="Nhập sức chứa trạm">
                </div>
                <!-- station num of bikes -->
                <div class="form-group">
                    <label for="stationNumOfBikes">Số xe trong trạm</label>
                    <input type="text" class="form-control" id="stationNumOfBikes" name="stationNumOfBikes" placeholder="Nhập số xe trong trạm">
                </div>
                <!-- station status -->
                <div class="form-group">
                    <label for="stationStatus">Trạng thái</label>
                    <input type="text" class="form-control" id="stationStatus" name="stationStatus" placeholder="Nhập số xe trong trạm">
                </div> 

                <!-- station started day -->
                <div class="form-group">
                    <label for="stationStartedDay">Ngày đi vào hoạt động</label>
                    <input type="text" class="form-control" id="stationStartedDay" name="stationStartedDay" placeholder="Nhập ngày đi vào hoạt động của trạm">
                </div>                      
                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn-primary">Xác nhận thêm</button>
        </div>
        </div>
    </div>
</div>
<!--end: add modal -->



<button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-sm btn-primary mb-3">Thêm trạm mới</button> 