<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row align-items-center h-100">
            <div class="col-md-6 border mx-auto my-2 align-middle px-5 py-4 shadow rounded   ">
                <h2 class="mb-4">Nouveau Utilisateur</h2>
                <form action="http://localhost/www/brief_6_VueJs_API/user/register" method="post">
                    Nom :
                    <input type="text" name="Nom" class="form-control" placeholder="Nom"><br>
                    Prenom :
                    <input type="text" name="Prenom" class="form-control" placeholder="Prenom"><br>
                    Email :
                    <input type="email" name="Email" class="form-control" placeholder="Email"><br>
                    Tele :
                    <input type="number" name="Tele" class="form-control" placeholder="Tele"><br>
                    Age :
                    <input type="number" name="Age" class="form-control" placeholder="Age"><br>
                    <input type="text" name="reference" class="form-control">
                <button name="submit" class="btn btn-primary col-md-4">Login</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>