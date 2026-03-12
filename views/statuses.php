<h1>Leads statuses</h1>

<nav>
<a href="/">Form</a> |
<a href="/statuses">Statuses</a>
</nav>

<h3>Filter by date</h3>

<form method="GET">

<input type="datetime-local" name="date_from">
<input type="datetime-local" name="date_to">

<button type="submit">Filter</button>

</form>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Email</th>
<th>Status</th>
<th>FTD</th>
</tr>

<?php foreach ($leads as $lead): ?>

<tr>
<td><?= htmlspecialchars($lead['id']) ?></td>
<td><?= htmlspecialchars($lead['email']) ?></td>
<td><?= htmlspecialchars($lead['status']) ?></td>
<td><?= htmlspecialchars($lead['ftd']) ?></td>
</tr>

<?php endforeach; ?>

</table>