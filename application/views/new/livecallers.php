<?php if (!empty($callers)) { foreach ($callers as $current) { ?>
<tr>
    <td><?php echo htmlspecialchars($current['name']); ?></td>
    <td><span class="badge bg-info"><?php echo htmlspecialchars($current['student_id']); ?></span></td>
    <td><?php echo htmlspecialchars($current['phone_number']); ?></td>
    <td><?php echo htmlspecialchars($current['status']); ?></td>
    <td><span class="badge bg-success"><?php echo htmlspecialchars($current['dur']); ?></span></td>
    <td><?php echo !empty($current['answered_time']) ? htmlspecialchars($current['answered_time']) : '—'; ?></td>
</tr>
<?php } } else { ?>
<tr>
    <td colspan="6" class="text-center text-muted">No live calls at the moment.</td>
</tr>
<?php } ?>
