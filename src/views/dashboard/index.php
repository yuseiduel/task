<?php include VIEW_DIR . 'header.php'; ?>
<h3>Dashboard</h3>
<form>
    <a id="data-url" href='?page=dashboard-data&from=from-date&to=to-date' hidden></a>
    <label for="from">From date:</label>
    <input name="from" type="text" value="<?php echo $response['data']['firstDay']; ?>">
    <label for="to">To date:</label>
    <input name="to" type="text" value="<?php echo $response['data']['lastDay']; ?>">
    <button id="change-date">Change date</button>
</form>
<p>Total number of orders: <i id="orders"></i></p>
<p>Total number of revenue <i id="revenue"></i></p>
<p>Total number of customers <i id="customers"></i></p>

<script src="js/dashboard.js"></script>
