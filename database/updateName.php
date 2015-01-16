<?php
include_once('../database/connection.php');
// Top domains with positions.
if(!isset($_GET['name']))
	$top = 5;
else
	$top = (int)$_GET['name'];
$q4="SELECT TOP(".$top.")Domain,Position, COUNT(*) AS domain_count FROM VwOutputRankingResult175k GROUP BY Domain,Position ORDER BY domain_count DESC";
$topDomains=sqlsrv_query($conn,$q4);
// Execute query 
if (!$topDomains) {
	echo "Error running query: " . mysql_error($conn);
}
while ($row=sqlsrv_fetch_array($topDomains)) {
      echo "<tr>";
      echo "<td>".$row['Domain']."</td>";
      echo "<td>".$row['Position']."</td>";
      echo "<td>".$row['domain_count']."</td>";
      echo "</tr>";
    }
?>