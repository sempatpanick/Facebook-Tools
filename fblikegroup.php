<?php
function curl($CODE,$access_token,$group,$type,$sleep)
{
	while(true)
	{
		$y = curl_init();
		curl_setopt_array($y, array(
			CURLOPT_URL => "http://dadang.ooo/api/fb/group-like.php",
			CURLOPT_AUTOREFERER => false,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_ENCODING => 'gzip, deflate',
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "CODE=".$CODE."&access_token=".$access_token."&group=".$group."&type=".$type
		));
		$x = curl_exec($y);
		$z = curl_error($y);
		curl_close($y);
		if ($z)
		{
			echo "Error : " . $z . "\n";
		}
		else
		{
			echo $x . "\n";
		}
		sleep($sleep);
	}
}
echo "==================== INSTRUCTION LIKE HOME FACEBOOK ====================\n";
echo "\t\tIsi TYPE (LIKE,LOVE,HAHA,WOW,SAD,ANGRY)\n";
echo "\t\t       Isi ID Group/Username Group\n";
echo " Isi JEDA WAKTU min 30 detik agar menghindari BLOCK LIKE dari FACEBOOK\n";
echo "========================================================================\n";
echo "CODE SGB\t\t: ";
$CODE = trim(fgets(STDIN));
echo "Access Token Facebook\t: ";
$access_token = trim(fgets(STDIN));
echo "ID Group\t\t: ";
$group = trim(fgets(STDIN));
echo "Type\t\t\t: ";
$type = trim(fgets(STDIN));
echo "Jeda Waktu (detik)\t: ";
$sleep = trim(fgets(STDIN));
echo "========================================================================\n";
echo curl($CODE,$access_token,$group,$type,$sleep);