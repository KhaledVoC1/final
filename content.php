<?php


function isBlackListed($parameter) {

    $blackList = [
        "--", ";", "or", "and", "@@", "@", "char", "nchar", "varchar", "nvarchar",
        "table", "alter", "begin", "cast", "create", "cursor", "declare", "delete",
        "drop", "end", "exec", "union","select", "execute", "fetch", "insert", 
        "kill", "open", "sys", "sysobjects", "syscolumns", "update"
    ];

    foreach ($blackList as $pattern) {
        if (preg_match("/$pattern/i", $parameter)) {
            return true;
        }
    }
    return false;
}
$Name = $_POST['name'];
$Password = $_POST['password'];
$con = mysqli_connect('localhost', 'root', '', '123');


if(!isBlackListed($Name) and !isBlackListed($Password)){
    $result = mysqli_query($con, "SELECT * FROM `tbluser` WHERE (UserName = '$Name') AND Password = '$Password'");


    if (!$result) {
    die("Query failed: " . mysqli_error($con));  
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
            alert('Successfully logged in');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Incorrect name or password');
            window.location.href = 'login.php';
        </script>";
    }
}
else{
    die("Query failed: " . mysqli_error($con));
}

$Name = trim($_POST['name']);
$Password = trim($_POST['password']);
$con = mysqli_connect('localhost', 'root', '', '123');


$blacklist = ['--', ';', '/*', '*/', '@@', '@', 'char', 'nchar', 'varchar', 'nvarchar', 'alter', 'begin',
 'cast', 'create', 'cursor', 'declare', 'delete', 'drop', 'end', 'exec', 'execute', 'fetch', 'insert', 'kill',
  'open', 'select', 'sys', 'sysobjects', 'syscolumns', 'table', 'update', 'or'];


foreach ($blacklist as $term) {
    if (strpos(strtolower($Name), $term) !== false || strpos(strtolower($Password), $term) !== false) {
        echo "<script>
            alert('Suspicious input detected.');
            window.location.href = 'login.php';
        </script>";
        exit();
    }
}

mysqli_close($con);
?>
 