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
            <div class="col-md-6 border mx-auto my-2 align-middle px-5 py-5 shadow rounded">
                <h2 class="mb-5">New user</h2>
                <form action="http://localhost/www/brief_6_VueJs_API/rendez_vous/save" method="post">
                    Date :
                    <input type="date" name="date" class="form-control"><br>
                    Horaire :
                    <select name="horaire" class="form-select" aria-label="Default select example">
                        <option selected> -- Horaire --</option>
                        <option value="8 - 9" <?php //if(in_array("8 - 10",$Horaires)){echo "disabled";} ?>>8 - 9</option>
                        <option value="9 - 10">9 - 10</option>
                        <option value="10 - 11">10 - 11</option>
                        <option value="11 - 12">11 - 12</option>

                        <option value="2 - 3">2 - 3</option>
                        <option value="3 - 4">3 - 4</option>
                        <option value="4 - 5">4 - 5</option>
                        <option value="5 - 6">5 - 6</option>
                      </select><br>
                    text :
                    <textarea class="form-control" name="typeConsultation" id="" cols="10" rows="5"></textarea><br>
                <button name="submit" class="btn btn-primary col-md-4">Login</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>