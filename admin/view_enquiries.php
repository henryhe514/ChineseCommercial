<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Enquiries</title>
<link href="admincss.css" rel="stylesheet" type="text/css">
</head>

<body>

<div align="center">

<div><a href="/index.php">HOME</a> | <a href="/admin/index.php">ADMIN</a> | <a href="/admin/index.php?action=log_out">LOGOUT</a></div>
<p></p>
    <?php

        try {
            include "JotForm.php";
            $jotformAPI = new JotForm("c9e8ae4b227d12360d9611e5eebfb1de");
            $submissions = $jotformAPI->getFormSubmissions(51760713131951);
			
			if(sizeof($submissions)<1){
				echo "No Enquiries Found";
			}else{
				?>                
                <table border=1 cellpadding="5"><tr><th>Enquiry Date</th><th>Enquirer</th><th>Email</th><th>Phone</th><th>Interest</th><th>Message</th>
	            <?						
				foreach($submissions as $submission){
					$submissionID = $submission["id"];
					$submissionDate = date_create($submission["created_at"]);
					$submissionDatePrint = date_format($submissionDate,"d M Y");
					$answers = $submission["answers"];
					$submitterName = $answers[4]["answer"]["first"] . " " . $answers[4]["answer"]["last"];
					$submitterEmail = $answers[5]["answer"];
					$submitterPhone = $answers[6]["answer"];
					$submitterMessage = $answers[7]["answer"];
					$submitterInterest = $answers[8]["answer"];
					$listingID = $answers[9]["answer"];
					$listingEmail = $answers[10]["answer"];
					?>
                    <tr>
                    	<td><a href="/index.php?action=listingview&listingID=<?=$listingID?>"><?=$submissionDatePrint?></a></td>
                        <td><?=$submitterName?></td>
                        <td><?=$submitterEmail?></td>
                        <td><?=$submitterPhone?></td>
                        <td><?=$submitterInterest?></td>
                        <td><?=$submitterMessage?></td>
                    </tr>
					<?
				}
				?>
				</table>
				<?
			}
        }
        catch (Exception $e) {
			echo '<h3>An error occurred while retrieving the enquiries:</h3>';
            var_dump($e->getMessage());
			echo '<p><a href="/admin">Return to the menu</a></p>';
        }
    ?>
        
</div>
</body>
</html>