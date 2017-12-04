<?php
function getRecentTopics($connect) {
$query = "SELECT r.*, m.category, m.title FROM reply r JOIN message m ON r.attached = m.messageId 
WHERE NOT EXISTS ( 
	SELECT * FROM reply r2 JOIN message m2 ON r2.attached = m2.messageId 
	WHERE m.category = m2.Category AND r.DatePosted < r2.DatePosted )
ORDER BY Category;";

$result = mysqli_query($connect, $query);
	return $result;
}
?>
