<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Chi tiết sách
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
        <link href="./css/detail.css" rel="stylesheet">

    </head>
    <body>
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
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card" id="detail">
                        <div class="container-fliud">
                            <div class="wrapper row">
                                <div class="preview col-md-6">

                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-1"><img
                                            class="card-img-top"
                                            src="./images/eca11ab822e5240c61b3d04bfd722a5d.jpg"
                                            alt="Card image cap"></div>
                                    </div>

                                </div>
                                <div class="details col-md-6 ">
                                    <h3 class="product-title ">Lập trình quỹ đạo cuộc đời</h3>
                                    <h3 class="nameAuthor mt-3">Tác giả: Kiên Trần</h3>
                                    <h3 class="status mt-3">Tình trạng: Đã mượn</h3>
                                    <h3 class="category mt-3">Thể loại: Kĩ năng sống</h3>
                                    <h4 class="price mt-3">Giá:
                                        <span>80.000VND</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card" id="test">
                        <img 
                                        class="card-img-top" 
                                        src="./images/eca11ab822e5240c61b3d04bfd722a5d.jpg"
                                        alt="Card image cap">
                                    <div class="card-body" id="card-body-update">
                                        <h5 class="card-title book-title" id="booktitle-test">Lập trình quỹ đạo cuộc đời</h5>
                                        <a
                                            class="btn btn-outline-info btn-detail"
                                            id="btn-detail-update"
                                            href="./detail.php">
                                            Xem chi tiết</a>
                                    </div>
                    </div>
                </div>
            </div>

            <div class="detail-content">
                <h3 class="list-title">
                    <i class="fa fa-file-text-o"></i>
                    <h3>Nội dung</h3>
                </h3>
                <p class="">Lập trình Quỹ Đạo Cuộc Đời đem đến cho bạn những hệ tư duy khiến bạn
                    hiểu vấn đề một cách tường tận qua những ví dụ và lập luận logic. Bạn có cơ hội
                    được đi sâu khám phá bản chất của mọi hành vi. Mình muốn bạn trước khi phát
                    triển bản thân, có thể nhận thức được mọi thứ rõ như ban ngày. Đọc vị được chính
                    bạn, sau đó đến người khác và các chiến thuật tồn tại ở cái thế kỷ XXI hỗn loạn
                    này.
                </p>
            </div>
            <h3>
                Sách mới cập nhật</h3>
            <div class="container">
                <div class="row mt-5">
                    <div class="book-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="card card-book mb-3" id="card-update">
                                    <img
                                        class="card-img-top"
                                        src="./images/eca11ab822e5240c61b3d04bfd722a5d.jpg"
                                        alt="Card image cap">
                                    <div class="card-body" id="card-body-update">
                                        <h5 class="card-title book-title" id="booktitle-update">Lập trình quỹ đạo cuộc đời</h5>
                                        <a
                                            class="btn btn-outline-info btn-detail"
                                            id="btn-detail-update"
                                            href="./detail.php">
                                            Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="card card-book mb-3" id="card-update">
                                    <img
                                        class="card-img-top"
                                        src="./images/eca11ab822e5240c61b3d04bfd722a5d.jpg"
                                        alt="Card image cap">
                                    <div class="card-body" id="card-body-update">
                                        <h5 class="card-title book-title" id="booktitle-update">Lập trình quỹ đạo cuộc đời</h5>
                                        <a
                                            class="btn btn-outline-info btn-detail"
                                            id="btn-detail-update"
                                            href="./detail.php">
                                            Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="card card-book mb-3" id="card-update">
                                    <img
                                        class="card-img-top"
                                        src="./images/eca11ab822e5240c61b3d04bfd722a5d.jpg"
                                        alt="Card image cap">
                                    <div class="card-body" id="card-body-update">
                                        <h5 class="card-title book-title" id="booktitle-update">Lập trình quỹ đạo cuộc đời</h5>
                                        <a
                                            class="btn btn-outline-info btn-detail"
                                            id="btn-detail-update"
                                            href="./detail.php">
                                            Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="card card-book mb-3" id="card-update">
                                    <img
                                        class="card-img-top"
                                        src="./images/eca11ab822e5240c61b3d04bfd722a5d.jpg"
                                        alt="Card image cap">
                                    <div class="card-body" id="card-body-update">
                                        <h5 class="card-title book-title" id="booktitle-update">Lập trình quỹ đạo cuộc đời</h5>
                                        <a
                                            class="btn btn-outline-info btn-detail"
                                            id="btn-detail-update"
                                            href="./detail.php">
                                            Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
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

        </body>
    </html>