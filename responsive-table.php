<?php
                $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG");
                $db = mysqli_select_db($connection, 'id18794570_kdb');

                
                $query = "SELECT * FROM userbills";
                $query_run = mysqli_query($connection, $query);
?>
<html>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <title>Table</title>
        <head>
                <link rel="stylesheet" href="css/mytable.css"/>
        </head>
        
        <body>
             <table>
  <thead>
                            <tr>
                        <th>ID</th>
                        <th >Full Name</th>
                        <th>Email</th>
                        <th >Date Issued</th>
                        <th>Due Date</th>
                        <th >Monthly Bill</th>
                        <th >Other Fees</th>
                        <th>Charges</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                            </tr>
  </thead>
  <tbody>
  <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['fname']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>
                                <td> <?php echo $row['tdate']; ?> </td>
                                <td> <?php echo $row['ddate']; ?> </td>
                                <td> <?php echo $row['bill']; ?> </td>
                                <td> <?php echo $row['fees']; ?> </td>
                                <td> <?php echo $row['charges']; ?> </td>
                                <td> <?php echo $row['total']; ?> </td>
                                <td> <?php echo $row['pmethod']; ?> </td>
                                <td> <?php echo $row['status']; ?> </td>
                                <?php
                                if($row['pmethod']!='GCASH' AND $row['pmethod']!='MANUAL COLLECTION' AND $row['pmethod']!='BANK TRANSFER' ){
                                echo "<td><button type='button' class='btn btn-success genbtn'> Payment</button></td>";
                                    }
                                ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
  </tbody>
 </table>
            
        </body>
</html>