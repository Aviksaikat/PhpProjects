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
<div class = "container mt-2">
  <div class = "row">
    <div class = "col-lg-12">
      <div class = "jumbotron">
        <h4 class = "mb-1">Add Employees</h4>
        <form method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name = "name" placeholder="Enter Name">
            <?php
              if(isset($_SESSION["error[nameError]"]))
                {
            ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION["error[nameError]"];?>
            </div>
            <?php
              }
            ?>
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name = "city" placeholder="Enter City Name">
            <?php
              if(isset($_SESSION["error[cityError]"]))
              {
            ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION["error[cityError]"];?>
            </div>
            <?php
              }
            ?>
          </div>
          <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" name = "designation" placeholder="Enter Your Designation">
            <?php
              if(isset($_SESSION["error[desError]"]))
              {
            ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION["error[desError]"];?>
            </div>
            <?php
              }
            ?>
            <?php
              session_unset();
            ?>
          </div>
          <input type="submit" class="btn btn-primary" name = "submit"></input>
          <input type="submit" name = "cancel" class="btn btn-danger" value="Cancel"></input>
      </form>
      </div>
    </div>
  </div>
</div>
