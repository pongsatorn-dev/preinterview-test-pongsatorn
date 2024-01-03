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
    <title>Preinterview-Test 4</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <form method="POST" action="test4.php">
        <div class="input">
            <p><label>Date x : </label><input id="x" name="x" type="date"></p>
            <p><label>Date y : </label><input id="y" name="y" type="date"></p>
            <p><label>Date m : </label><input id="m" name="m" type="date"></p>
            <button id="btn-submit">Submit</button>
        </div>
        <div class="result" style="margin-top: 5px;">
            <?php echo $str; ?>
        </div>
    </form>
</body>
</html>