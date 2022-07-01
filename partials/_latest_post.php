<div class="my-5">
    <div class="row g-5 justify-content-between">
        <div class="col-md-6">
            <h5 class="text-muted">Latest Article</h5>
            <?php
            $db = new DB();
            $sql = "SELECT * FROM `blog` WHERE `status`='approved'  ORDER BY `timestand` DESC LIMIT 2";
            $rows = $db->execute($sql);
            include 'blog/partials/_load_post.php';
            $db->close();



            ?>
        </div>
        <div class="col-md-6">
            <h5 class="text-muted">Top Article</h5>
            <?php
            $db = new DB();
            $sql = "SELECT * FROM `blog` WHERE `status`='approved' LIMIT 2";
            $rows = $db->execute($sql);
            include 'blog/partials/_load_post.php';
            $db->close();
            ?>
        </div>
    </div>

</div>