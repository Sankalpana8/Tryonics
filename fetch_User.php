<?php
//connect to db
$connect = new PDO("mysql:host=localhost;dbname=tryonicsdb", "root", "");

$column = array('UserID','FullName', 'About', 'Birthday', 'Mobile', 'Email', 'Country');

$query = '
SELECT * FROM `Users` WHERE CONCAT(`UserID`,`FullName`, `About`, `Birthday`, `Mobile`, `Email`, `Country`)LIKE "%'.$_POST["search"]["value"].'%" 
';
//make data into order (filter)
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY UserID DESC ';
}

$query1 = '';
//set data limit to pages (pagination)
if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$total_order = 0;

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["UserID"];
 $sub_array[] = $row["FullName"];
 $sub_array[] = $row["About"];
 $sub_array[] = $row["Birthday"];
 $sub_array[] = $row["Mobile"];
 $sub_array[] = $row["Email"];
 $sub_array[] = $row["Country"];

 $data[] = $sub_array;
}
//count num of records in user tbl
function count_all_data($connect)
{
 $query = "SELECT * FROM Users";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST["draw"]),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data,
 'total'    => number_format($total_order, 2)
);

echo json_encode($output);


?>
