<?php 

      include "config.php";
      include "_nav.php";

      $sql = "SELECT * FROM states";

      $result = $conn->query($sql);

?>

<html>
      <head>

          <title>View Page</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

          <style>
              body{
                  background: #e6f3f8;
              }
              th{
                  border: 1px solid black;
                  background-color: #f1f1f1;
              }
              td{
                  border: 1px solid black;
              }
              a:hover {
                  background: linear-gradient(to bottom, #33ccff 0%, #006600 100%);
                  color: gray;
              }
              nav{
                  float: left;
                  width:100%;
              }
              p{
                  float: right;
              }
              h6{
                margin-left:3050%;
              }
              h3{
                  text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
              }
              input{
                  background-color:#f1f1f1;
                  border-radius: 25px;
              }
              .topnav {
                overflow: hidden;
                background-color: #333;
              }

              .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
              }

              .topnav a:hover {
                background-color: #ddd;
                color: black;
              }

              .topnav a.active {
                color: white;
              }
              h1{
                float: right;
              }
              h2{
                float: left;
              }
              h4{
                float:left;
                width: 100%;
              }
          </style>
      </head>

<body>
    
    <div class="container">

        <h3>State<sup>*</sup></h3>
        <h5>A list of all state</h5>
        <input type="text" id="myInput" onkeyup="searchTableColumns()" placeholder="search here state....."/><br>
        <!-- <h1><a class="btn btn-info" href="create.php">Add State</a></h1> -->
        <!-- <h2><a class="btn btn-info" href="city_view.php">View City</a></h2><br><br> -->
        <!-- <h4><a class="btn btn-info" href="/php/signup/task/logout.php">Logout</a></h4><br><br> -->

        <?php

              if (isset($_GET['pageno'])) {
                  $pageno = $_GET['pageno'];
              } else {
                  $pageno = 1;
              }
              $no_of_records_per_page = 10;
              $offset = ($pageno-1) * $no_of_records_per_page;

              $total_pages_sql = "SELECT COUNT(*) FROM states";
              $result = mysqli_query($conn,$total_pages_sql);
              $total_rows = mysqli_fetch_array($result)[0];
              $total_pages = ceil($total_rows / $no_of_records_per_page);

              ?>
              <ul class="pagination">
              <li><a href="?pageno=1">First</a></li>
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                  <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
              </li>
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                  <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
              </li>
              <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
              </ul>

        <?php
            $columns = array('id','state','code','created_at','updated_at');
            $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
            $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
            if ($result = $conn->query('SELECT * FROM states ORDER BY ' .  $column . ' ' . $sort_order)) 
                $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order);
                $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
                $add_class = ' class="highlight"';
                ?>
        <div>
          
<table style="width:100%" id="myTable">
    <thead>
        <tr>
            <th><a href="view.php?column=id&order=<?php echo $asc_or_desc; ?>">ID<i class="fas fa-sort<?php echo $column == 'id' ? '-' . $up_or_down : ''; ?>"></i></a></th>
            
            <th><a href="view.php?column=state_id&order=<?php echo $asc_or_desc; ?>">State<i class="fas fa-sort<?php echo $column == 'state_id' ? '-' . $up_or_down : ''; ?>"></i></a></th>

            <th><a href="view.php?column=code&order=<?php echo $asc_or_desc; ?>">Code<i class="fas fa-sort<?php echo $column == 'code' ? '-' . $up_or_down : ''; ?>"></i></a></th>

            <th>Updated_at</th>

            <th>Created_at</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody> 
        <?php
              $sql1 = "SELECT * FROM states LIMIT $offset, $no_of_records_per_page";
              $res_data = mysqli_query($conn,$sql1);
              while($row = mysqli_fetch_array($res_data)){
                
                  // echo $row['state'];
                // if ($result->num_rows > 0) {
                //     while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <td<?php echo $column == 'id' ? $add_class : ''; ?>><?php echo $row['id']; ?></td>

                <td<?php echo $column == 'state_id' ? $add_class : ''; ?>><?php echo $row['state']; ?></td>

                <td<?php echo $column == 'name' ? $add_class : ''; ?>><?php echo $row['code']; ?></td>

                <td><?php echo $row['created_at'];?></td>

                <td><?php echo $row['updated_at'];?></td>

                <td><a class="btn btn-info" href="update.php? id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                    <a class="btn btn-danger" onclick=" return myFunction()"
                    href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
              </tr>                   
        <?php       
          }
      //   }
      //  }
        ?>                
    </tbody>
</table>
        </div>
    </div> 

<script>
function myFunction() {
 return confirm("Record deleted!");
}

function searchTableColumns() {
            // Declare variables
            var input, filter, table, tr, i, j, column_length, count_td;
            column_length = document.getElementById('myTable').rows[0].cells.length;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) { // except first(heading) row
                count_td = 0;
                for (j = 1; j < column_length-1; j++) { // except first column
                    td = tr[i].getElementsByTagName("td")[j];
                    /* ADD columns here that you want you to filter to be used on */
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            count_td++;
                        }
                    }
                }
                if (count_td > 0) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
</script>
</body>

</html>