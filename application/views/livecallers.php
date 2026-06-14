
			<tr><?php foreach($callers as $current){ ?>
				<td><a href="javascript:;" class="primary-link"><?php echo $current['name'] ; ?></a> </td>
				<td class="fit"> <span class="badge badge-info"><?php echo $current['student_id'] ; ?> </span></td>
				<td> <?php echo $current['phone_number'] ; ?> </td>
				<td> <?php echo $current['status'] ; ?> </td>
				<td> <div id="pulsate-regular" style="padding:5px;"> <?php echo $current['dur'] ; ?> </div> </td>
			</tr><?php }?>