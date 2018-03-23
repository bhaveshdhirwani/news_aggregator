<!--<table>
			<tr id="row1">
					<?php
							$sql="SELECT * FROM tickernews where id=1";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}
							}
					?>
				<td id="r1c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r1c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
	
			<tr id="row2">
					<?php
							$sql="SELECT * FROM tickernews where id=2";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}	
							}
					?>
				<td id="r2c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r2c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
	
			<tr id="row3">
					<?php
							$sql="SELECT * FROM tickernews where id=3";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}	
							}
					?>
				<td id="r3c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r3c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
	
			<tr id="row4">
					<?php
							$sql="SELECT * FROM tickernews where id=4";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}	
							}
					?>
				<td id="r4c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r4c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
			
			<tr id="row5" style="display:none">
					<?php
							$sql="SELECT * FROM tickernews where id=5";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}	
							}
					?>
				<td id="r5c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r5c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
			
			<tr id="row6" style="display:none">
					<?php
							$sql="SELECT * FROM tickernews where id=6";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}
							}
					?>
				<td id="r6c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r6c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
			
			<tr id="row7" style="display:none">
					<?php
							$sql="SELECT * FROM tickernews where id=7";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}
							}
					?>
				<td id="r7c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r7c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
			
			<tr id="row8" style="display:none">
					<?php
							$sql="SELECT * FROM tickernews where id=8";

							$result=mysqli_query($conn,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									$newsHeadline = $row["headlines"];
									$bgPicture = $row["image"];
								}	
							}
					?>
				<td id="r8c1"><a href="#"><img src="<?php echo "$bgPicture"; ?>" style="width:100px;height:70px;padding:10px" alt=""></a></td>
				<td id="r8c2"><a href="#" style="text-decoration:none;color:white"><?php echo "$newsHeadline"; ?></a></td>
			</tr>
			</table>-->
			
			
			
<!-- OLD MAIN SLIDER -->
<!--<div id="one">
				<div id="innerOne">
					<p id="paraInOne">
						<?php
							$sql="SELECT interests FROM user where username='$username'";
							$resultInter=mysqli_query($con,$sql);
							$currentInter=mysqli_fetch_assoc($resultInter);														
							$currentInterest=explode(',',$currentInter["interests"]);
							$n=sizeof($currentInterest);
							--$n;
							
						    $sql="SELECT * FROM news where category='$currentInterest[0]'";
							--$n;
							
							$result=mysqli_query($con,$sql);

							if(mysqli_num_rows($result)>0)	{
								while($row=mysqli_fetch_assoc($result)) {
									echo $row["headlines"]."<br><br>";
									$bgPicture=$row["image"];
								}
							}
							else {
								echo "No records found.";
							}			
						?>						
					</p>
				</div>
				<img src="<?php echo "$bgPicture"; ?>">
			</div>-->