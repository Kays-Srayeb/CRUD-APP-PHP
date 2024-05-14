<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAIN PAGE</title>
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
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '
      <div class="alert alert-warning d-flex justify-content-between align-items-center" role="alert">
      <div class="d-flex align-items-center ">
      <i style="margin-right:10px; font-size:1.5rem;" class="fa-solid fa-circle-exclamation"></i>
        '.$msg.'
      </div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
      ';
    }
    ?>

    <a href="add_new.php" class="btn btn-dark mb-3 ">Add New User</a>
  </div>

  <table class="table text-center table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require("connection.php");
      $req = "select * from users";
      $res = mysqli_query($con, $req);
      while ($row = mysqli_fetch_assoc($res)) {
      ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['f_name']; ?></td>
          <td><?php echo $row['l_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['gender']; ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 "></i></a>
          </td>
        </tr>
      <?php
      };
      ?>
    </tbody>
  </table>




  <!-- Bootstrap Scripts Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>