<?php
session_start();
include_once "../db/_db.php";
if (!isset($_SESSION[''])) {
  // header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body class="">
  <div class="wrapper mx-auto">
    <section class="chat-area">
      <header>
        <?php
        $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
        $sql = mysqli_query($con, "SELECT * FROM users WHERE UserID = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          // header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
        <i class="fa fa-user-circle fa-3x mx-2" aria-hidden="true"></i>
        <div class="details">
          <span><?php echo $row['username'] ?></span>
          <p class="small"><?php echo $row['active_status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button class="btn btn-primary">
          <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>

</html>