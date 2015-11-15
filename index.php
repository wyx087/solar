<html>
<head>
<title>File read demo</title>
</head>
<body>

<a href="long.php">Longer version</a>

<?php
function read_last_lines($fp, $num){
    $idx   = 0;
    $lines = array();
    while(($line = fgets($fp)))
    {
        $lines[$idx] = $line;
        $idx = ($idx + 1) % $num;
    }
    $p1 = array_slice($lines,    $idx);
    $p2 = array_slice($lines, 0, $idx);
    $ordered_lines = array_merge($p1, $p2);
    return $ordered_lines;
}

$file = "/var/tmp/solar.log";  // Edit file name 
$f = fopen($file, "r");
$lines = read_last_lines($f, 300);  // Edit line number 
fclose($f);

$lines = array_reverse($lines);
foreach($lines as $child) {
    echo("<pre>");
    print($child);
    echo("</pregt;");
}

?>
</body>
</html>
