<?php
function getRecentTopic($categoryId, $connect) {
$query = "SELECT
		DatePosted,
		Title,
		MessageId,
		MAX(DatePosted) AS 'MostRecentPost'
	FROM message
	WHERE Category = ".$categoryId."
	GROUP BY Title, datePosted";
$result = mysqli_query($connect, $query);
echo mysqli_error($connect);
if ($result) {
	$row = mysqli_fetch_assoc($result);
	return outputMostRecentTopicOrDefault($row);
}
}

function outputMostRecentTopicOrDefault($row){
	$output = "";
	if(isset($row["Title"])) {
		$output = "<a href='topic.php?id=".$row["MessageId"]."'>".$row["Title"]."<br>".$row["DatePosted"]."</a>";
	}
	else {
		$output = "no posts yet!";
	}
	return $output;
}
?>
