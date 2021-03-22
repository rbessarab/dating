<?php
//admin.php - admin page for database overview

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="styles/styles.css">

    <title>Admin</title>
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a href="{{ @BASE }}" class="navbar-brand">My Dating Website</a>
    </div>
</nav>

<div class="container tabling">
    <div class="container main">
        <h1>Admin Page</h1>
    </div>
    <h2>Members</h2>
    <table id="myTable" class="display" style="width:100%">
        <thead>
        <tr>
            <td>Full Name</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Phone</td>
            <td>Email</td>
            <td>State</td>
            <td>Seeking</td>
            <td>Bio</td>
            <td>Premium</td>
            <td>Interests</td>
        </tr>
        </thead>

        <tbody>

        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    //$('#myTable').DataTable({
      //  "order": [[ 5, "desc" ]]
    //});
</script>
</body>
</html>