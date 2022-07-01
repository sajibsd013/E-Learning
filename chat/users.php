<?php
session_start();
include_once "../db/_db.php";
$db = new DB();
if (!isset($_SESSION['userId'])) {
  // header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper container">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($con, "SELECT * FROM users WHERE UserID = {$_SESSION['userId']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <i class="fa fa-user-circle fa-2x m-0" aria-hidden="true"></i>
          <div class="details ms-1">
            <span><?php echo $row['username'] ?></span>
            <p class="small"><?php echo $row['active_status']; ?></p>
          </div>
        </div>
      </header>
      <div class="search">
        <span class="text" class="small">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button>
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>