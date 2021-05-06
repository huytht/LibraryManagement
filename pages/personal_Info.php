<?php
    if (isset($_SESSION['idAccount'])) {
        $user = getDataStudentById($conn, $_SESSION['idAccount']);
    }
?>
<div id="mainPersonal">
    <div class="main">
        <div class="left">
            <div class="root">
                <p><b><i class="fas fa-user-circle"> </i>&nbsp; THÔNG TIN CÁ NHÂN</b></p>
                <ul class="submenu">
                    <li><a href="index.php?p=history-issuedbook"><i class="fas fa-history"> </i>&nbsp;Lịch sử mượn - trả</a></li>
                </ul>
                </li>
            </div>
        </div>
        <div class="right">
            <div class="table_content">
                <div class="headermain">
                    <h3>Thông tin cá nhân</h3>
                </div>
                <div class="bottommain">
                    <div class="table-container">
                        <div class="sort">
                            <table>
                                <tr>
                                    <td>Mã số sinh viên:</td>
                                    <td class="pk">
                                        <?php
                                    if (isset($user['id'])){
                                        echo $user['id'];
                                    } else {
                                        echo "";
                                    }
                                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Họ và tên:</td>
                                    <td class="pk">
                                        <?php
                                    if (isset($user['fullname'])){
                                        echo $user['fullname'];
                                    } else {
                                        echo "";
                                    }
                                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Đối tượng:</td>
                                    <td class="pk">
                                        <?php
                                    if (isset($user['id'])){
                                        echo "Sinh viên";
                                    } else {
                                        echo "";
                                    }
                                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại:</td>
                                    <td class="pk">
                                        <?php
                                    if (isset($user['phone'])){
                                        echo $user['phone'];
                                    } else {
                                        echo "";
                                    }
                                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td class="pk">
                                        <?php
                                    if (isset($user['email'])){
                                        echo $user['email'];
                                    } else {
                                        echo "";
                                    }
                                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tình trạng:</td>
                                    <td class="pk">
                                        <?php
                                    if (isset($user['id'])){
                                        echo "Còn học";
                                    } else {
                                        echo "";
                                    }
                                ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>