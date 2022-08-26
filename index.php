<?php
include("includes/header.php");
$link = mysqli_connect("localhost", "root", "", "university_db");
if (mysqli_connect_errno())
  exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM Studen_Schema";

$result = mysqli_query($link, $query);
?>

<div class="container">
  <div class="row">
    <div class="row">
      برای وارد شدن به سامانه نام کاربری و رمز عبور را وارد کنید
    </div>
    <form action="actions/login.php" method="post" name="login">
      <div class="col">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">یوزر نیم</label>
          <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="نام کاربری خود را وارد کنید">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">پسورد</label>
          <input type="text" class="form-control" name="password" id="exampleFormControlInput1" placeholder="رمز عبور خود را وارد کنید">
        </div>
      </div>
      <button type="submit"  class="btn btn-primary">وارد شدن</button>
    </form>
  </div>
</div>
<?php
include("includes/footer.php");
?>