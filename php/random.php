<?php
// ランダムジャンプ
$total_url = $db->log_count($db->db_pre.'log');
list($usec, $sec) = explode(' ', microtime());
srand((float)$sec + ((float)$usec * 100000));
$id = rand(0, $total_url - 1);
$query = 'SELECT url FROM '.$db->db_pre.'log';
$url = $db->rowset_assoc($query) or $db->error("Query failed $query".__FILE__.__LINE__);
if (isset($url[$id]['url'])) {
	location($url[$id]['url']);
} else {
	location('http://www.nkbt.net/yomi/');
        exit();
}
?>