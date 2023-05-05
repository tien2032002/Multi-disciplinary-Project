<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view\style\base.css">
    <link rel="stylesheet" href="view\style\style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>bike detail</title>
    <!-- important! google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <!-- data table link boostrap -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>    
        $(document).ready(function () {
            $('#example').DataTable({
                search: {
                    return: true,
                },
            });
        });
    </script>
    
</head>

<?php
    if (isset($errResultAdd)) $errResultAdd = json_decode($errResultAdd);
    if (isset($errResultUpd)) $errResultUpd = json_decode($errResultUpd);
?>

<body>
    <div class="container-fluid">
        <div class="row mw-100">
            <!--begin: vertical navbar -->
            <div class="col-md-auto background-primary-color vh-100 nopadding">
                <!-- project name -->
                <div class="project d-flex align-items-center">
                    <img src="assets\img\project-logo.png" alt="prjLogo" class="project-logo">
                    <div class="project-name margin-left-10 ">
                        <h4 class="text-white">TRẠM XE <br> THÔNG MINH</h4>
                    </div>
                </div>
                <!-- logined user -->
                <div class="logined-user d-flex align-items-center">
                    <img src="assets\img\294488601_3134523420097821_7397663236363416758_n.jpg" alt="admin-avatar" class="user-img">
                    <div class="user-name margin-left-20">
                        <h6 class="text-white">ADMIN</h6>
                    </div>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person text-white" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="/user_webpage">Quản lý nhân viên</a>
                    </li>
                    <li class="nav-item d-flex  align-items-center selected" id='stationList'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                        </svg>
                        
                        <a class="nav-link active text-white nopadding " href="/station_list"> 
                            Danh sách trạm
                        </a>
                        <i class="ms-2" style="" id='warning' class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                            </svg>
                        </i>
                        <script src="view\script\warning.js"></script>
                    </li>
                    <li class="nav-item pt-0">
                        <ul class=" nav flex-column">
                                <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-list-task" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
                                        <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
                                        <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
                                    </svg>
                                    <a class="nav-link active text-white nopadding ">Quản lí trạm</a>
                                </li>
                                <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-thermometer-sun text-white" viewBox="0 0 16 16">
                                        <path d="M5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585A1.5 1.5 0 0 1 5 12.5z"/>
                                        <path d="M1 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM3.5 1A1.5 1.5 0 0 0 2 2.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0L5 10.486V2.5A1.5 1.5 0 0 0 3.5 1zm5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5zm4.243 1.757a.5.5 0 0 1 0 .707l-.707.708a.5.5 0 1 1-.708-.708l.708-.707a.5.5 0 0 1 .707 0zM8 5.5a.5.5 0 0 1 .5-.5 3 3 0 1 1 0 6 .5.5 0 0 1 0-1 2 2 0 0 0 0-4 .5.5 0 0 1-.5-.5zM12.5 8a.5.5 0 0 1 .5-.5h1a.5.5 0 1 1 0 1h-1a.5.5 0 0 1-.5-.5zm-1.172 2.828a.5.5 0 0 1 .708 0l.707.708a.5.5 0 0 1-.707.707l-.708-.707a.5.5 0 0 1 0-.708zM8.5 12a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                    <a class="nav-link active text-white nopadding">Tình trạng môi trường</a>
                                </li>
                                <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                    <a class="nav-link active text-white nopadding">Theo dõi</a>
                                </li>
                        </ul>
                    </li>
                    
                    
                    <li class="nav-item d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt text-white" viewBox="0 0 16 16">
                            <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                            <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="/revenue">Doanh thu</a>
                    </li>
                    
                    <li class="nav-item d-flex align-items-center" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right text-white" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        <a class="nav-link active text-white nopadding" href="/logout">Đăng xuất</a>
                    </li>
                    
                </ul>
            </div>
            <!--end: vertical navbar -->

            <!-- content -->
            <div class="content col vh-100" id="mainContent">
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
                <table id="example" class="table mt-5" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Tên trạm</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Ngày đưa vào hoạt động</th>
                            <th scope="col">Sức chứa</th>
                            <th scope="col">Số xe</th>
                            <th scope="col">Tổng doanh thu</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($stationList as $station) {
                            $station = json_decode($station);
                            echo '
                            <tr id="stationTable" class="">
                                <th scope="row">'.$station->id.'</th>
                                <td  data-bs-toggle="modal" data-bs-target="#operationModal'.$station->id.'" style="cursor:pointer;">'.$station->name.'
                                
                                
                                </td>
                                <td>'.$station->address.'</td>
                                <td>'.$station->started_date.'</td>
                                <td>'.$station->capacity.'</td>
                                <td>'.$station->num_of_bikes.'</td>
                                <td>'.number_format($station->revenue, 0).'</td>
                                <td>'.$station->status.'</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal"  data-bs-target="#editModal'.$station->id.'" class=" btn btn-sm btn-primary text-center" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear m-0" viewBox="0 0 16 16">
                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                    </svg>
                                    
                                    </button>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal'.$station->id.'"  class=" btn btn-sm btn-danger" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3 m-0" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    
                                    </button>   
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
                                            <a href="index.php?controller=manager&action=delete_station&stationID='.$station->id.'"><button type="button" class="btn btn-danger">Xác nhận</button></a>
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
                                            <form action="index.php?controller=manager&action=updateStation&curStationID='.$station->id.'" method="post" id="editModalForm'.$station->id.'">
                                                <!-- station ID -->
                                                <div class="form-group">
                                                    <label for="stationID">ID</label>
                                                    <input type="text" class="form-control" id="stationID" name="stationID" placeholder="Nhập ID" value="'.$station->id.'">
                                                    <p class="text-danger">';
                                                    if (isset($errResultUpd))
                                                        switch ($errResultUpd->idErrUpd) {
                                                            case 'duplicate':
                                                                echo "ID đã được đăng ký";
                                                                break;
                                                            case 'missing':
                                                                echo "Xin hãy nhập ID trạm!";
                                                                break;
                                                            default: break;
                                                    }
                                                echo '
                                                    </p>
                                                </div>
                                                <!-- station name -->
                                                <div class="form-group">
                                                    <label for="stationName">Tên trạm</label>
                                                    <input type="text" class="form-control" id="stationName" name="stationName" placeholder="Nhập tên trạm" value="'.$station->name.'">
                                                    <p class="text-danger">';
                                                    if (isset($errResultUpd))
                                                        switch ($errResultUpd->nameErrUpd) {
                                                            case 'invalid':
                                                                echo "Tên trạm không hợp lệ!";
                                                                break;
                                                            default: break;
                                                    }
                                                echo '
                                                    </p>
                                                </div>
                                                <!-- station address -->
                                                <div class="form-group">
                                                    <label for="stationAddress">Địa chỉ</label>
                                                    <input type="text" class="form-control" id="stationAddress" name="stationAddress" placeholder="Nhập địa chỉ trạm" value="'.$station->address.'">
                                                    <p class="text-danger">';
                                                    if (isset($errResultUpd))
                                                        switch ($errResultUpd->addressErrUpd) {
                                                            case 'invalid':
                                                                echo "Địa chỉ trạm không hợp lệ!";
                                                                break;
                                                            default: break;
                                                    }
                                                echo '
                                                    </p>
                                                </div>
                                                <!-- station capacity -->
                                                <div class="form-group">
                                                    <label for="stationCapacity">Sức chứa</label>
                                                    <input type="number" class="form-control" id="stationCapacity" name="stationCapacity" placeholder="Nhập sức chứa trạm" value="'.$station->capacity.'">
                                                    <p class="text-danger">';
                                                    if (isset($errResultUpd))
                                                        switch ($errResultUpd->capacityErrUpd) {
                                                            case 'invalid':
                                                                echo "Sức chứa trạm không hợp lệ!";
                                                                break;
                                                            default: break;
                                                    }
                                                echo '
                                                    </p>
                                                    
                                                </div>
                                                <!-- station num of bikes -->
                                                <div class="form-group">
                                                    <label for="stationNumOfBikes">Số xe trong trạm</label>
                                                    <input type="number" class="form-control" id="stationNumOfBikes" name="stationNumOfBikes" placeholder="Nhập số xe trong trạm" value="'.$station->num_of_bikes.'">
                                                    <p class="text-danger">';
                                                    if (isset($errResultUpd))
                                                        switch ($errResultUpd->num_of_bikesErrUpd) {
                                                            case 'invalid':
                                                                echo "Số xe trong trạm không hợp lệ!";
                                                                break;
                                                            default: break;
                                                    }
                                                echo '
                                                    </p>
                                                </div>
                                                <!-- station status -->
                                                <div class="form-group">
                                                    <label for="stationStatus">Trạng thái</label>
                                                    <input type="text" class="form-control" id="stationStatus" name="stationStatus" placeholder="Nhập tình trạng trạm" value="'.$station->status.'">
                                                    <p class="text-danger">';
                                                    if (isset($errResultUpd))
                                                        switch ($errResultUpd->statusErrUpd) {
                                                            case 'invalid':
                                                                echo "Tình trạng trạm không hợp lệ!";
                                                                break;
                                                            default: break;
                                                    }
                                                echo '
                                                    </p>
                                                </div> 

                                                <!-- station started day -->
                                                <div class="form-group">
                                                    <label for="stationStartedDay">Ngày đi vào hoạt động</label>
                                                    <input type="date" class="form-control" id="stationStartedDay" name="stationStartedDay" placeholder="Nhập ngày đi vào hoạt động của trạm" value="'.$station->started_date.'">
                                                </div>                      
                                                
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                            <button type="button" class="btn btn-primary" onclick="document.getElementById(\'editModalForm'.$station->id.'\').submit();">Xác nhận</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: edit modal -->
                            ';

                            //operation modal

                            echo '
                            <!-- begin: operation modal -->
                            <div class="modal fade" id="operationModal'.$station->id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <!-- header -->
                                        <div class="modal-header">
                                            <h2>Tác vụ</h2>
                                        </div>
                                        <!-- body -->
                                        <div class="modal-body d-flex flex-column align-items-center">
                                            <button type="button" href="index.php?controller=manager&action=station_detail&stationID='.$station->id.'" class="btn btn-sm ps-3 pe-3" style="background-color: #79bc53; width: 60%;">
                                                <a href="station-detail/'.UrlNormal($station->name).'/'.$station->id.'" style="all: unset;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-list-task" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"/>
                                                        <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"/>
                                                        <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"/>
                                                    </svg>
                                                    <bold class="text-white text-left"> Danh sách xe </bold>
                                                </a>
                                            </button>
                                            <button type="button" href="index.php?controller=manager&action=environment&stationID='.$station->id.'" class="mt-2 btn btn-sm text-center ps-3 pe-3" style="background-color: #84cd65 ;width: 60%;">
                                                <a href="station-environment/'.UrlNormal($station->name).'/'.$station->id.'" style="all: unset;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-thermometer-sun m-0" viewBox="0 0 16 16">
                                                        <path d="M5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585A1.5 1.5 0 0 1 5 12.5z"/>
                                                        <path d="M1 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM3.5 1A1.5 1.5 0 0 0 2 2.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0L5 10.486V2.5A1.5 1.5 0 0 0 3.5 1zm5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5zm4.243 1.757a.5.5 0 0 1 0 .707l-.707.708a.5.5 0 1 1-.708-.708l.708-.707a.5.5 0 0 1 .707 0zM8 5.5a.5.5 0 0 1 .5-.5 3 3 0 1 1 0 6 .5.5 0 0 1 0-1 2 2 0 0 0 0-4 .5.5 0 0 1-.5-.5zM12.5 8a.5.5 0 0 1 .5-.5h1a.5.5 0 1 1 0 1h-1a.5.5 0 0 1-.5-.5zm-1.172 2.828a.5.5 0 0 1 .708 0l.707.708a.5.5 0 0 1-.707.707l-.708-.707a.5.5 0 0 1 0-.708zM8.5 12a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1a.5.5 0 0 1 .5-.5z"/>
                                                    </svg>
                                                    <bold class="text-white">Nhiệt độ & độ ẩm </bold>
                                                </a>
                                            </button>
                                            <button data-bs-dismiss="modal"  class="mt-2 btn btn-sm " style="background-color:#90d176; width: 60%;" >
                                                <a href="station-camera/'.UrlNormal($station->name).'/'.$station->id.'" style="all: unset;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-webcam-fill" viewBox="0 0 16 16"> 
                                                        <path d="M6.644 11.094a.5.5 0 0 1 .356-.15h2a.5.5 0 0 1 .356.15c.175.177.39.347.603.496a7.166 7.166 0 0 0 .752.456l.01.006h.003A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.224-.947l.002-.001.01-.006a3.517 3.517 0 0 0 .214-.116 7.5 7.5 0 0 0 .539-.34c.214-.15.428-.319.603-.496ZM7 6.5a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                                                        <path d="M2 3a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H2Zm6 1.5a2 2 0 1 1 0 4 2 2 0 0 1 0-4ZM12.5 7a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Z"/>
                                                    </svg>
                                                    <bold class="text-white">Theo dõi </bold>
                                                </a>
                                            </button>
                                                                        
                                        </div>
                                        <!-- footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: operation modal -->
                            ';
                        } 
                        ?>
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
                                <form action="index.php?controller=manager&action=addStation" method='post' id="addStation">
                                    <!-- station ID -->
                                    <div class="form-group">
                                        <label for="stationID">ID</label>
                                        <input type="text" class="form-control" id="stationID" name="stationID" placeholder="Nhập ID" value="<?php if(isset($_POST['stationID'])) echo $_POST['stationID']; ?>">
                                        <p class="text-danger">
                                            <?php
                                                if (isset($errResultAdd))
                                                    switch ($errResultAdd->idErrAdd) {
                                                        case 'duplicate':
                                                            echo "ID đã được đăng ký";
                                                            break;
                                                        case 'missing':
                                                            echo "Xin hãy nhập ID trạm!";
                                                            break;
                                                        default: break;
                                                    }
                                            ?>
                                        </p>
                                    </div>
                                    <!-- station name -->
                                    <div class="form-group">
                                        <label for="stationName">Tên trạm</label>
                                        <input type="text" class="form-control" id="stationName" name="stationName" placeholder="Nhập tên trạm" value="<?php if(isset($_POST['stationName'])) echo $_POST['stationName']; ?>">
                                        <p class="text-danger">
                                            <?php
                                                if (isset($errResultAdd))
                                                    switch ($errResultAdd->nameErrAdd) {
                                                        case 'invalid':
                                                            echo "Tên trạm không hợp lệ";
                                                            break;
                                                        default: break;
                                                    }
                                            ?>
                                        </p>
                                    </div>
                                    <!-- station address -->
                                    <div class="form-group">
                                        <label for="stationAddress">Địa chỉ</label>
                                        <input type="text" class="form-control" id="stationAddress" name="stationAddress" placeholder="Nhập địa chỉ trạm" value="<?php if(isset($_POST['stationAddress'])) echo $_POST['stationAddress']; ?>">
                                        <p class="text-danger">
                                            <?php
                                                if (isset($errResultAdd))
                                                    switch ($errResultAdd->addressErrAdd) {
                                                        case 'invalid':
                                                            echo "Địa chỉ trạm không hợp lệ";
                                                            break;
                                                        default: break;
                                                    }
                                            ?>
                                        </p>
                                    </div>
                                    <!-- station capacity -->
                                    <div class="form-group">
                                        <label for="stationCapacity">Sức chứa</label>
                                        <input type="number" class="form-control" id="stationCapacity" name="stationCapacity" placeholder="Nhập sức chứa trạm" value="<?php if(isset($_POST['stationCapacity'])) echo $_POST['stationCapacity']; ?>">
                                        <p class="text-danger">
                                            <?php
                                                if (isset($errResultAdd))
                                                    switch ($errResultAdd->capacityErrAdd) {
                                                        case 'invalid':
                                                            echo "Sức chứa trạm không hợp lệ";
                                                            break;
                                                        default: break;
                                                    }
                                            ?>
                                        </p>
                                    </div>
                                    <!-- station num of bikes -->
                                    <div class="form-group">
                                        <label for="stationNumOfBikes">Số xe trong trạm</label>
                                        <input type="number" class="form-control" id="stationNumOfBikes" name="stationNumOfBikes" placeholder="Nhập số xe trong trạm">
                                        <p class="text-danger">
                                            <?php
                                                if (isset($errResultAdd))
                                                    switch ($errResultAdd->num_of_bikesErrAdd) {
                                                        case 'invalid':
                                                            echo "Số xe trong trạm không hợp lệ";
                                                            break;
                                                        default: break;
                                                    }
                                            ?>
                                        </p>
                                    </div>
                                    <!-- station status -->
                                    <div class="form-group">
                                        <label for="stationStatus">Trạng thái</label>
                                        <input type="text" class="form-control" id="stationStatus" name="stationStatus" placeholder="Nhập số xe trong trạm">
                                        <p class="text-danger">
                                            <?php
                                                if (isset($errResultAdd))
                                                    switch ($errResultAdd->statusErrAdd) {
                                                        case 'invalid':
                                                            echo "Tình trạng trạm không hợp lệ";
                                                            break;
                                                        default: break;
                                                    }
                                            ?>
                                        </p>
                                    </div> 

                                    <!-- station started day -->
                                    <div class="form-group">
                                        <label for="stationStartedDay">Ngày đi vào hoạt động</label>
                                        <input type="date" class="form-control" id="stationStartedDay" name="stationStartedDay" placeholder="Nhập ngày đi vào hoạt động của trạm">
                                    </div>                      
                                    
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-primary" onclick='document.getElementById("addStation").submit();'>Xác nhận thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end: add modal -->

                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-sm btn-primary mb-3">Thêm trạm mới</button> 
            </div>
            
            <!-- end: content -->

            
        </div>
    </div>

    <?php
      if (isset($errResultAdd)) echo '
      <script>
      var myModal = new bootstrap.Modal(document.getElementById("addModal"), {
        keyboard: false
      })
      myModal.show();
    </script>
      ';

      if (isset($errResultUpd)) echo '
      <script>
      var myModal = new bootstrap.Modal(document.getElementById("editModal'.$curStationID.'"), {
        keyboard: false
      })
      myModal.show();
    </script>
      ';
    ?> 
    <script src="view\script\warning.js"></script>
</body>
</html>