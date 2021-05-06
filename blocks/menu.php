<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="admin/public/images/images/logo.PNG"></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Trang chủ
                        <span class="sr-only">(current)</span></a>
                </li>
                <li style="z-index: 999999" class="nav-item dropdown">
                    <a class="nav-link" href="#" id="dropdownId">Thể loại</a>
                    <div class="dropdown-content" aria-labelledby="dropdownId">
                        <?php
                            $categories = getDataCategoryList($conn);
                            foreach ($categories as $category) {
                        ?>
                        <a class="dropdown-item text-danger"><b><?php echo $category["name"] ?></b></a>
                        <?php
                                $subcategories = getSubCategoryListById($conn, $category["id"]);
                                foreach ($subcategories as $subcategory) {
                                ?>
                        <a class="dropdown-item" href="index.php?p=category&id=<?php echo $subcategory["id"] ?>">
                            <?php echo $subcategory["name"] ?>
                        </a>
                        <?php
                            }
                        ?>
                        </optgroup>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php
                if (isset($_SESSION['idAccount'])){
            ?>
            <div style="padding-left: 20px; z-index: 10;">
                <div class="dropdown">
                    <a onclick="myFunction()" class="dropbtn">
                        <?php
                            echo $_SESSION['idAccount'] . "&nbsp;<i class='fas fa-caret-down'></i>";
                        ?>
                        
                    </a>
                    <div style="background-color: white;" id="myDropdown" class="dropdown-content">
                        <a style="cursor: pointer" href="index.php?p=personal-info" class="dropdown-item">Thông tin cá nhân</a>
                        <a style="cursor: pointer" href="index.php?p=history-issuedbook" class="dropdown-item">Lịch sử mượn - trả sách</a>
                        <a style="cursor: pointer" class="dropdown-item" id="btnChangePwd">Đổi mật khẩu</a>
                        <a style="cursor: pointer" class="dropdown-item" id="btnLogout">Đăng xuất</a>
                    </div>
                </div>
            </div>
            <?php
                } else {
                    include 'formlogin.php';
                }
            ?>
        </div>
    </div>
</nav>