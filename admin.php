<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>user table</h2>
    <table class="table table-striped table-bordered" border="2">
        <thead>
            <tr>
                <th>S.No</th>
                <th>User Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Number</th>
                <th>Location</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
           require 'con.php';

            $sql = "Select * from user_table";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){

                    $id = $row["id"];
                    $name = $row["username"];
                    $email = $row["email"];
                    $password = $row["password"];
                    $DOB = $row["DOB"];
                    $number = $row["number"];
                    $location = $row["location"];

                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$email.'</td>
                    <td>'.$DOB.'</td>
                    <td>'.$number.'</td>
                    <td>'.$location.'</td>
                    
                    
                    
                    <td>
                         <a href="update.php?id='.$id.'">
                                 <button> Update</button>
                          </a>
                    <a href="delete.php?id='.$id.'">
                    <button class="btn btn-danger">Delete</button>
                    </a>
                    </td>
                    </tr>';
                }
            }else{
                echo"No data found.";
            }
            ?>
        </tbody>
        </table>
        <br><br><br><br><br>
        <h2>food table</h2>
        <table class="table table-striped table-bordered" border="2">
        <thead>
            <tr>
                <th>Id</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Price</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
        

            $sql = "Select * from food";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){

                    $id = $row["id"];
                    $Items = $row["food"];
                    $Quantity = $row["quantity"];
                    $Price = $row["price"];
                   

                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$Items.'</td>
                    <td>'.$Quantity.'</td>
                    <td>'.$Price.'</td>
                    
                    
                    
                    <td>
                      
                    <a href="delete.php?id='.$id.'">
                    <button class="btn btn-danger">Delete</button>
                    </a>
                    </td>
                    </tr>';
                }
            }else{
                echo"No data found.";
            }
            ?>
            <tbody>
    </table>
</body>
</html>