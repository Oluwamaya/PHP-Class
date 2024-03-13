<?php 
// Get the ID from the query string
$id = $_GET['id'];
echo "Editing ID: $id <br>";

include("database/connectdb.php");
  
if (isset($_POST['saveEdit'])) {
    // Get the new input values from the form
    $newName = $_POST['drone'];
    $newEmail = $_POST['newEmail'];
    
    // Prepare the SQL statement with a parameterized query
    $stmt = mysqli_prepare($conn, "UPDATE phpclass SET name = ?, email = ? WHERE id = ?");
    
    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssi", $newName, $newEmail, $id);
    
    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Values updated successfully.";
        header("Location: index.php");
        exit; // Redirect and exit
    } else {
        echo "Error updating values: " . mysqli_error($conn);
    }
    
    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
<form action="processEdit.php?id=<?php echo $id ?>" method="POST">
    <label for="drone">Name:</label>
    <input type="text" name="drone"><br>
    <label for="newEmail">Email:</label>
    <input type="text" name="newEmail"><br>
    <button type="submit" name="saveEdit">Save</button>
</form>
