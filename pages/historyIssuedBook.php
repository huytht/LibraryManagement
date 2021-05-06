<?php
    $histories = getHistoryIssuedBook($conn, $_SESSION["idAccount"]);
?>
<div id="mainPersonal">
    <div class="main">
        <div class="left">
            <div class="root">
                <p><b><i class="fas fa-history"> </i>&nbsp;LỊCH SỬ MƯỢN - TRẢ</b></p>
                <ul class="submenu">
                    <li><a href="index.php?p=personal-info"><i class="fas fa-user-circle"> </i>&nbsp;Thông tin cá nhân</a></li>
                </ul>
                </li>
            </div>
        </div>
        <div class="right">
            <div class="table_content">
                <div class="headermain">
                    <h3>Lịch sử mượn - trả</h3>
                </div>
                <!-- <div class="combobox">
                    <div class="topmain">
                        <h5>Danh sách xem:</h5>
                        <div class="select-box">
                            <div class="options-container ">
                                <div class="option">
                                    <input type="radio" class="radio" id="all" name="category" />
                                    <label for="all">Tất cả lịch sử mượn - trả sách</label>
                                </div>
                                <div class="option">
                                    <input type="radio" class="radio" id="borrow" name="category" />
                                    <label for="borrow">Lịch sử mượn sách</label>
                                </div>
                                <div class="option">
                                    <input type="radio" class="radio" id="pay" name="category" />
                                    <label for="pay">Lịch sử trả sách</label>

                                </div>
                            </div>
                            <div class="selected">
                                Lựa chọn...
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="bottommain">
                    <div class="table-container">
                        <div class="sort">
                            <table>
                                <tr>
                                    <th><a>STT</a></th>
                                    <th><a>Mã sách</a></th>
                                    <th><a>Ngày mượn</a></th>
                                    <th><a>Hạn trả</a></th>
                                    <th><a>Trạng thái</a></th>
                                    <th><a>Tiền phạt</a></th>
                                </tr>
                                <div class="roll">
                                    <?php
                                    $stt = 0;
                                    foreach($histories as $history) {
                                        $stt++;
                                    ?>
                                    <tr>
                                        <td><?php echo $stt?></td>
                                        <td><?php echo $history["isbn"]?></td>
                                        <td><?php echo date("d/m/Y", $history["issues_date"])?></td>
                                        <td><?php echo date("d/m/Y", $history["return_date"])?></td>
                                        <td><?php if ($history["return_status"] == 0) echo "Còn mượn"; else echo "Đã trả";?></td>
                                        <td><?php echo $history["fine"]?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="notification">
                        <a>tìm được "N " kết quả ....</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>