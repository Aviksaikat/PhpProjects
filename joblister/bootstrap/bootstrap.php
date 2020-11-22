<!--title-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!--nav bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ABC Ltd.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>

      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!--table-->
<div class = "container mt-2">
  <div class = "row">
    <div class = "col-lg-12">
      <div class = "jumbotron">
      <a href="add.php" class="float-right btn btn-success">Create Employee</a>
        <h4 class = "mb-1">All Employees</h4>
        <br>
        <table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">Designation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $emp = new employee();//instantiating the class
      $rows = $emp->select();//accessign the select fn.
      foreach ($rows as $row )
      {
        ?>
        <tr>
          <th scope="row"><?php echo $row["id"];?></th>
          <td><?php echo $row["name"];?></td>
          <td><?php echo $row["city"];?></td>
          <td><?php echo $row["designation"];?></td>
          <td><a class = "btn btn-sm btn-primary"href = "edit.php?id=<?php echo $row["id"]?>">Edit</a> &nbsp; <a class = "btn btn-sm btn-danger" href="index.php?del=<?php echo $row["id"]?>">Delete</a></td>
        </tr><!--&nbsp; for space-->
<?php
      }
?>
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>
