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
<table class="table table-striped table-hover">
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
                //decode station object
                $station = json_decode($station);
                echo '
                <tr>
                <th scope="row">'.$station->id.'</th>
                <td>
                    <div style="cursor: pointer;" onclick="getMainContent(\'index.php?controller=manager&action=station_detail&stationID='.$station->id.'\')" class="link-dark" style="text-decoration: none;">'.$station->name.'</div>
                </td>
                <td>'.$station->address.'</td>
                <td>'.$station->revenue.'</td>
                <td>
                    <a href="index.php?controller=manager&action=station_environment&stationID='.$station->id.'"><button type="button" class="btn btn-sm btn-info">Môi trường</button></a>
                    <a href="index.php?controller=manager&action=station_change&stationID='.$station->id.'"><button type="button" class="btn btn-sm btn-primary">Sửa</button></a>
                    <a href="index.php?controller=manager&action=station_delete&stationID='.$station->id.'"><button type="button" class="btn btn-sm btn-danger">Xóa</button>
                </td>
                </tr>';
            }
        ?>
     
    </tbody>
</table>
<button type="button" class="btn btn-sm btn-primary">Thêm trạm mới</button>
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