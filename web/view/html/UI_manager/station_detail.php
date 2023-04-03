<?php
    //decode bike list
    $bikeList = json_decode($bikeList);
?>
<!-- start: breadcrum -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="link-dark" onclick="getMainContent('index.php?controller=manager&action=station_list')">Danh sách trạm</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Trạm Bách Khoa</li>
    </ol>
</nav>
<!-- end: breadcrum -->

<!-- page content -->
<!-- begin: station list table -->
<table class="table table-striped table-hover">
    <thead>
        <tr>         
        <th scope="col">ID </th>
        <th scope="col">Tên xe</th>
        <th scope="col">Số giờ thuê</th>
        <th scope="col">Giá thuê</th>
        <th scope="col">Tình trạng</th>
        <th scope="col">Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($bikeList as $bike) {
                $bike = json_decode($bike);
                echo '
                <tr>
                <th scope="row">'.$bike->id.'</th>
                <td>
                    <a href="bike_detail.html" style="text-decoration: none;" class="link-dark">Xe đạp du lịch</a>
                </td>
                <td>'.$bike->hired_hours.'</td>
                <td>10.000/1h</td>
                <td>'.$bike->status.'</td>
                <td>
                    
                    <button type="button" class="btn btn-sm btn-primary">Sửa</button>
                    <button type="button" class="btn btn-sm btn-danger">Xóa</button>
                </td>
                </tr>
                ';
            }
        ?>
        
        
    </tbody>
</table>
<button type="button" class="btn btn-sm btn-primary">Thêm xe mới</button>
<!-- end: station list table -->

<!-- begin:pagination -->
<nav aria-label="Page navigation ">
    <ul class="pagination d-flex justify-content-end">
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            
        </a>
        </li>
        <li class="page-item"><a class="page-link active" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            
        </a>
        </li>
    </ul>
</nav>
<!-- end:pagination -->