<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Library
        </title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link href="./css/style.css" rel="stylesheet">

    </head>
    
    <body>
    <?php 
    include_once("library/config.php");
    ?>
        <!-- smenu -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="./images/Capture.PNG"></a>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Trang chủ
                                <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="dropdownId">Thể loại</a>
                            <div class="dropdown-content" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Thể loại 1</a>
                                <a class="dropdown-item" href="#">Thể loại 2</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng nhập</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- emenu -->
        <!-- sslide -->
        <div
            id="carouselExampleIndicators"
            class="carousel slide mt-3"
            data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        class="d-block w-100"
                        src="http://via.placeholder.com/1920x530"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100"
                        src="http://via.placeholder.com/1920x530"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img
                        class="d-block w-100"
                        src="http://via.placeholder.com/1920x530"
                        alt="Third slide">
                </div>
            </div>
            <a
                class="carousel-control-prev"
                href="#carouselExampleIndicators"
                role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a
                class="carousel-control-next"
                href="#carouselExampleIndicators"
                role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- eslide -->
        <!-- Book -->
        <div class="container">
            <div class="row mt-5">
            
                <div class="book-group">
                    <div class="row">
                    
                  <?php for($i=0;$i<12;$i++){?>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="card card-book mb-3">
                                <img
                                    class="card-img-top"
                                    src="./images/eca11ab822e5240c61b3d04bfd722a5d.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title book-title">Lập trình quỹ đạo cuộc đời</h5>
                                    <a class="btn btn-outline-info btn-detail" href="./detail.php"> Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                       <?php }?>
                    </div>
                   
                </div>
            
            </div>
        </div>
        <!-- endbook -->
        <div class="card">
            <div class="container">
                <div class="card-footer text-muted">
                    <div class="content">
                        <p >
                            <span>LIÊN HỆ</span>
                        </p>
                        <ul>
                            <li>
                                <span>
                                    <span>Địa chỉ: 222 Lê Văn Sỹ, Phường 14, Quận 3, Tp.HCM</span>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <span>Điện thoại:
                                        <span>(+84) - (28) 35260834 - 35261043</span>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <span>Email: thuvien@hcmue.edu.vn</span>
                                </span>
                                &nbsp;
                            </li>
                        </ul>
                    </div >
                </div>
            </div>
        </div>
    </body>
</html>