<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="my2.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="center">
    <!-- <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1> -->
    <?php
    if (isset($error)) {
      foreach ($error as $error) {
        echo '<span class="error-msg">' . $error . '</span>';
      };
    };
    ?>
    <form method="post">
      <div class="m-4">
        <!-- <nav class="nav nav-tabs">
              <a style="color: blue;" href="#" class="nav-item nav-link active">Open</a>
              <a style="color: blue;" href="my1.html" class="nav-item nav-link">Closed</a>
            </nav> -->
      </div><br>
      <div>
        
     

        <table>
          <tr>
            <th>name</th>
            <th>email</th>
            <th>Phone_number</th>
            <th>roll_number</th>

          </tr>
          <?php

          require_once('config.php');
         
          if (isset($_GET['page'])) {
            $page = $_GET['page'];
          } else {
            $page = 1;
          }

          $num_per_page = 10;
          $start_from = ($page - 1) * 10;

          $query = "SELECT * FROM user_form limit $start_from,$num_per_page";
          $result = mysqli_query($conn, $query);



          ?>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <td> <?php echo $row['name'] ?> </td>
            <td> <?php echo $row['email'] ?> </td>
            <td> <?php echo $row['phone_number'] ?> </td>
            <td> <?php echo $row['roll_number'] ?> </td>



            </tr>
          <?php
          }
          ?>



        </table>
      </div> <br> <br>
      <?php
      $pr_query = "SELECT * FROM user_form ";
      $pr_result = mysqli_query($conn, $pr_query);
      $total_record = mysqli_num_rows($pr_result);

      $total_page = ceil($total_record / $num_per_page);
      if ($page > 1) {
        echo "<a href='user_page.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous</a>";
      }


      for ($i = 1; $i < $total_page; $i++) {
        echo "<a href='user_page.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
      }

      if ($i > $page) {
        echo "<a href='user_page.php?page=" . ($page + 1) . "' class='btn btn-danger'>Next</a>";
      }


      ?>
    </form>
  </div>
  <link rel="stylesheet" href="widget.css">
  <div id="corewidgetbox" class="wid" data-v-1dad4796="">
    <div id="wbox" class="widgetrow text-center" data-v-1dad4796="">
      <span data-v-33523013="" data-v-1dad4796="">
        <!-- <a data-v-33523013="" href="register_form.php" class="register" style="background-image: url(&quot;p.png&quot;); color: #2f40e9; "> Register </a> -->
      </span>
      <!---->
      <!-- <span data-v-33523013="" data-v-1dad4796=""><a data-v-33523013="" href="login_form.php" class="Login" style="background-image: url(&quot;p1.png&quot;); color: #2f40e9;">Login</a> -->
      </span>
      <span data-v-33523013="" data-v-1dad4796=""><a data-v-33523013="" href="logout.php" class="Logout" style="background-image: url(&quot;p2.png&quot;); color:rgba(47, 64, 233, 1);"> Logout </a>
      </span>
      <!-- <span data-v-33523013="" data-v-1dad4796=""><a data-v-33523013="" href="contact.html" class="knowledgebase" style="background-image: url(&quot;p3.png&quot;); color: rgba(47, 64, 233, 1);">Contact Us</a> -->
      </span>
    </div>
  </div>

</body>

</html>