<?php
    include 'connection.php';
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $title= $_POST['worktitle'];
    $desc= $_POST['description'];

    $sql= "INSERT INTO `notes` (  `title`, `notes`) VALUES ( '$title', '$desc');" ;
    $result= mysqli_query($conn, $sql);

    if (!$result){
      echo '<div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Well done!</h4>
      <p>We Are facing some issue in submitting your entry.</p>
      <hr>
    </div>';
    }
     
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     
     
  </head>
  <style>
    .body{
      text-decoration: line-through;
    }
  </style>
  <body>
    <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">     
        Crud Application
        </a> 
    </div>
    </nav>
    <div class="container mt-3">
    <form action="/yash/crudapp/cruddesign.php" method="post" >
        <div class="mb-3">
            <label for="worktitle" class="form-label">Work title</label>
            <input type="text" class="form-control" name="worktitle" id="worktitle" placeholder="Enter your work type">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Add item</button>
    </form>

     
    <table class="table my=3" id="myTable">
        <thead>
        
            <tr>
            <th scope="col">sl.no</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
            <tbody>
            <?php
                $sql= " SELECT * FROM `notes`";
                $result = mysqli_query($conn,$sql);
                if($result->num_rows > 0)
                {
                $i=1;
                                                                                  
                while($row = mysqli_fetch_assoc($result))
                {                                        
                      $id= $row['sl. no'];
                      $title = $row['title'];
                      $work= $row['notes'];
                      if(!$title)
                      {
                        break;
                      }
                      echo '<tr>

                          <th scope="row">'.$i.'</th>
                          <td>'.$title.'</td>
                          <td>'.$work.'</td>
                          <td>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                          <button class="btn btn-danger"><a href="deletework.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                          </td>
                          </tr>';
                      $i++;
                }
              }
               
            ?>
            
            </tbody>
    </table>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit you list</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="worktitle" class="form-label">Work title</label>
                        <input type="text" class="form-control" name="worktitle" id="worktitle" placeholder="Enter your work type">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>
                 
                </div> 
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
                 
            </div>
            </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

     
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>