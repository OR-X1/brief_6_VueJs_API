<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body class="">

    <div class="container">
        <div class="row align-items-center  h-100">
            <div class="col-md-10  border mx-auto my-2 align-middle px-5 py-5 shadow rounded">
                <h2 class="mx-auto mb-5">les créneaux disponibles.</h2>
                <div class="d-flex">
                    <p class="w-100">Reference : <?php echo $_SESSION['user'][0]['reference']?></p>
                    <a href="http://localhost/www/brief_6_VueJs_API/user/deConnect" class="btn btn-outline-danger mx-3">deConnect</a>
                <a href="http://localhost/www/brief_6_VueJs_API/rendez_vous/page_add" class="btn btn-success">Ajouter</a>
                </div>
                
                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Horaire</th>
                        <th scope="col">TypeConsultation</th>
                        <th scope="col">Reference</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <hr>
                    <tbody>
                      <?php foreach($groupes as $row){ ?>
                        <tr>
                          <th scope="row"><?php echo $row['date'] ?></th>
                          <td><?php echo $row['horaire'] ?></td>
                          <td><?php echo $row['typeConsultation'] ?></td>
                          <td><?php echo $row['reference'] ?></td>
                          <td class="d-flex">
                              <form action="http://localhost/www/brief_6_VueJs_API/rendez_vous/update/<?php echo $row['id']?>" method="post">
                                <input type="hidden" name="DeleteID" value="<?php echo $row['id']?>">
                                <button name="submit" class="btn btn-warning">Update</button>
                              </form>
                              <form action="http://localhost/www/brief_6_VueJs_API/rendez_vous/delete/<?php echo $row['id']?>" method="post">
                                <input type="hidden" name="DeleteID" value="<?php echo $row['id']?>">
                                <button name="submit" class="btn btn-danger mx-1">Delete</button>
                              </form>
                          </td>
                        </tr>
                        <?php  } ?>

                    </tbody>
                  </table>

            </div>
        </div>
    </div>
    
</body>
</html>