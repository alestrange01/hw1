<!DOCTYPE HTML>
<html>
<head>
<?php
header('Content-Type: text/html; charset=UTF-8');
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjRjMjM5YTE4LWNlNWEtNGMzZC05OTY4LTFlN2Y3NzA3NGRlYiIsImlhdCI6MTY4Mzk2NDkwOSwic3ViIjoiZGV2ZWxvcGVyLzkwNWExNWI2LWQ2MmItZTA4MC00MTk5LWZlMDBiZmQ4N2ZmYyIsInNjb3BlcyI6WyJyb3lhbGUiXSwibGltaXRzIjpbeyJ0aWVyIjoiZGV2ZWxvcGVyL3NpbHZlciIsInR5cGUiOiJ0aHJvdHRsaW5nIn0seyJjaWRycyI6WyIyLjQ0LjEzNy4xMDEiXSwidHlwZSI6ImNsaWVudCJ9XX0.6X79YTt03Ev3V1QKqRDk2M98w1OdN87i7qyAsiqFN4P6b6MzlqEsbp-LL9m-D_8fjYFaqEQ0hSYm2QVhjomtHw";

$url = "https://api.clashroyale.com/v1/players/QL9GVP9";

$ch = curl_init($url);

$headr = array();
$headr[] = "Accept: application/json";
$headr[] = "Authorization: Bearer ".$token;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res = curl_exec($ch);
$data = json_decode($res, true);
curl_close($ch);
if (isset($data["reason"])) {
echo "<p>", "Failed: ", $data["reason"], " : ", isset($data["message"]) ? $data["message"] : "", "</p></body></html>";
exit;
}
?>
<title>
Cards
</title>
</head>
<body>
<pre>
<?php var_dump($data); ?>
</pre>
</body>
</html>