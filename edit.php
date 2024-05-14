<?php

require("connection.php");

if (isset($_POST["submit"])) {
  $f_name = $_POST["f_name"];
  $l_name = $_POST["l_name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $id = $_GET["id"];

  $sql = "update users set f_name='$f_name', l_name='$l_name', email='$email', gender='$gender' where id=$id;";

  $res = mysqli_query($con, $sql);

  if (!$res) {
    echo "Failed : " . mysqli_error($con);
  } else {
    header("Location: index.php?msg=Data Updated Successfully !");
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EDIT USER INFO</title>
  <!-- Bootstrap Font Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <!-- Font-Awesome Cdn Link ( Icons ) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Fonts Cdn Link ( Roboto ) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
</head>

<body style="font-family: 'Roboto', sans-serif">
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
    PHP - CRUD APPLICATION
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Informations</h3>
      <p class="text-muted">Click update button below after any changes</p>
    </div>
  </div>

  <?php
  $id = $_GET["id"];
  $sql = "select * from users where id=$id limit 1";
  $res = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($res);
  ?>

  <div class="container d-flex justify-content-center">
    <form method="post" style="width: 50vw; min-width: 300px" class="needs-validation g-3 was-validated">
      <div class="row">
        <div class="col">
          <label for="f_name" class="form-label">First Name : </label>
          <input type="text" name="f_name" placeholder="Albert" class="form-control mb-2" value="<?= $row["f_name"] ?>" required />
          <div class="valid-feedback ">Look Good!</div>
          <div class="invalid-feedback ">Please Enter Your First Name</div>
        </div>
        <div class="col">
          <label for="l_name" class="form-label">Last Name : </label>
          <input type="text" name="l_name" class="form-control mb-2" value="<?= $row["l_name"] ?>" placeholder="Einstien" required />
          <div class="valid-feedback ">Look Good!</div>
          <div class="invalid-feedback ">Please Enter Your Last Name</div>
        </div>
      </div>
      <div class="mt-3 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="<?= $row["email"] ?>" class="form-control mb-2" placeholder="Albert@abc.xyz" required />
        <div class="valid-feedback ">Look Good!</div>
        <div class="invalid-feedback ">Please Enter Your Email Address</div>
      </div>
      <div class="form-group mb-3">
        <label for="gender" class="form-label">Gender : </label> &nbsp;
        <input type="radio" class="form-check-input" name="gender" id="male" value="M" required <?php echo ($row["gender"] == 'M') ? "checked" : ""; ?>>
        <label for="male" class="form-input-label">Male</label>
        &nbsp;
        <input type="radio" class="form-check-input" name="gender" id="female" value="F" required <?php echo ($row["gender"] == 'F') ? "checked" : ""; ?>>
        <label for="female" class="form-input-label">Female</label>
        <div class="valid-feedback ">Look Good!</div>
        <div class="invalid-feedback ">Please Choose Your Gender</div>
      </div>
      <div>
        <input type="submit" class="btn btn-primary" value="Save" name="submit">
        <a href="index.php" class="btn btn-danger ">Cancel</a>
      </div>
    </form>
  </div>

  <!-- Bootstrap Scripts Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>