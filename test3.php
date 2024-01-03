<?php
$str = "";
if(isset($_POST['a']) && isset($_POST['x'])) {
    $a = explode(',', $_POST['a']);
    $x = $_POST['x'];

    $aFound = [];
    $indexFound = [];
    $isFound = false;
    
    foreach($a as  $value) {
        $value = trim($value);
        $find = strpos(strtolower($value), strtolower($x));
        if($find !== false) {
            if(!in_array($value, $aFound)) {
                $aFound[] = $value;
                $indexFound[] = $find;
            }
            $isFound = true;
        }
    }
    
    if($isFound) {
        $str .= '['.implode(', ', $aFound).']';
        $str .= '<br>';
        $str .= implode(', ', $indexFound);
    } else {
        $str = 'No results found';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preinterview-Test 3</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <form method="POST" action="test3.php">
        <div class="input">
            <p><label>A (array) : </label><input id="a" name="a" type="text"></p>
            <p><label>X : </label><input id="x" name="x" type="text"></p>
            <button id="btn-submit">Submit</button>
        </div>
        <div class="result" style="margin-top: 5px;">
            <?php echo $str; ?>
        </div>
    </form>
</body>
</html>