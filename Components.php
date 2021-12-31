<?php
function getTodoDisplay()
{
?>
    <?php if (isset($_SESSION['todo'])) : ?>
        <?php if (count($_SESSION['todo']) > 0) : ?>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['todo'] as $key => $task) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $task ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="text" name="item" value="<?= $key ?>" hidden>
                                    <!-- <input type="text" name="item" value="test" > -->
                                    <button class="btn btn-danger" name='del' type="submit">X</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    <?php endif ?>
<?php
}


function getPosts()
{
?>
    <?php
    require_once('utilities.php');
    $conn = getConnection();
    // $posts = $conn->query("SELECT * FROM " . TABLE . " ORDER BY id DESC");
    $posts = $conn->query("SELECT * FROM " . TABLE);
    foreach ($posts as $key => $post) :
    ?>
        <div class="jumbotron jumbotron-fluid bg-light border border-warning m-2">
            <div class="container">
                <h1 class="display-4">#<?= $key + 1 ?>. <?= $post['title'] ?></h1>
                <div class="small float-right">Posted By: <?= $post['user'] ?></div>
                <div class="small float-right">Posted At: <?= $post['createdAt'] ?></div>
                <hr>
                <p class="lead"><?= $post['body'] ?></p>
            </div>
        </div>
    <?php
    endforeach
    ?>
<?php

}
