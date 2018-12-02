<?php
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "webstore";

try {
if(isset($_POST['itemDescription']){
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $itemID = $_POST['itemID']
	$itemName = $_POST['itemName']
	$itemDescription = $_POST['itemDescription']
	$amount = $_POST['amount']
	$stmt = $conn->prepare("INSERT INTO items (itemID, itemName, itemPrice, itemDescription, amount) VALUES (:itemID,:itemName,:itemDescription,:amount)");
	
	$stmt->bindParam(':itemID', $itemId);
	$stmt->bindParam(':itemName', $itemName);
	$stmt->bindParam(':itemDescription', $itemDescription);
    $stmt->bindParam(':amount', $amount);
	$stmt->execute();
	$stmt = null;
	$conn = null;
	
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Item found Successfully');
    window.location.href='entry.php';
    </script>");
}else{
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//update main listing
	$stmt2 = $conn->prepare("UPDATE items SET amount = amount + :AMOUNT WHERE items.itemID = :itemID");
	$stmt2->bindParam(':itemID',$itemID);
	$stmt2->bindParam(':AMOUNT', $AMOUNT);
	$stmt2->execute();
	$stmt2 = null;
	$conn = null;
		}
		  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Not a correct item id');
    window.location.href='entry.php';
    </script>");
	catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
		}
    }
	}
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>