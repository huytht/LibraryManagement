<?php
    include '../library/config.php';
    include '../library/connect.php';
    include '../admin/models/subcategory.php';
    include '../admin/models/author.php';
    if (!empty($_REQUEST['searchterm'])) {
        $name = "%".$_REQUEST['searchterm']."%";
        $stmt = $conn->prepare("SELECT * FROM book WHERE name LIKE :name ORDER BY name LIMIT 0,4");
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        if(!empty($stmt)) {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // prepare the list for append
        ?>
                <ul style="list-style: none;" id="name-list">
                <?php
                foreach ($data as $book) 
				{
                ?>
					<li> 
                        <a href="index.php?p=detail&isbn=<?php echo $book["isbn"]; ?>">
                            <img id="imgSuggest" src="admin/public/images/books/<?php echo $book["image"]; ?>">    
                            <h3><?php echo $book["name"]; ?></h3> 
                            <i><?php echo getAuthorById($conn, $book["author_id"])["fullname"] ?></i> 
                            <i>
                                <?php
                                    foreach (json_decode($book["subcategories"]) as $key => $sub) {
                                        if ($key != count(json_decode($book["subcategories"])) - 1)
                                            echo getSubCategoryById($conn, $sub)["name"] . ", ";
                                        else
                                            echo getSubCategoryById($conn, $sub)["name"];
                                    } 
                                ?>
                            </i>
                        </a>
                    </li>
                <?php 
				} 
				?>
                </ul>
        <?php } 
    } 
?>
