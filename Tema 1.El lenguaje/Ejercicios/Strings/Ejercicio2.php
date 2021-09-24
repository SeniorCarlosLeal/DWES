<html>
<head></head>
<body>
  <?php
    $ip="192.18.16.204";

    $ip2=explode('.',$ip);
    echo decbin($ip2[0]) . "." .decbin($ip2[1]) . "." . decbin($ip2[2]) . "." . decbin($ip2[3]);
  ?>
</body>
</html>
