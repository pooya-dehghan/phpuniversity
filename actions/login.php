  <?php
    include('../includes/header.php');
  if (!(isset($_SESSION["logged"]) && $_SESSION["logged"] === true)) {
  ?>
    <script type="text/javascript">
      console.log('script')
    </script>
  <?php
  }

  $link = mysqli_connect("localhost", "root", "", "university_db");

  if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM student_schema WHERE StudentName='$username' AND password='$password'";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_array($result);

  if ($row) {
    $name = $row['Name'];
    $_SESSION["id"] = $row["id"];
    $_SESSION["logged"] = true;
    $_SESSION["full_name"] = $name;
    $_SESSION["Password"] = $row['Password'];
    header("Location: /university/student/panel.php");
    // echo ("<p style='color:green;' class='information'><b>" . $name . " " . $family . " گرامی به دندانپزشکی رجایی خوش آمدید.<b><br>برای رزرو نوبت از <a href='book_turn.php'>اینجا </a>اقدام کنید</p>");
  } else
    echo ("<p style='color:red;'><b>نام كاربري يا كلمه عبور يافت نشد</b></p>");


  mysqli_close($link);
  ?>