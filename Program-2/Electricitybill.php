<html>
    <head>
        <title>Second Page</title>
    </head>
    <body>
      <h2>Electricity bill calculator</h2>
      
      <form method="post">
          <label for="units">Units Consumed:</label>
          <input type="number" id="units" name="units" required>
          <br><br>
          <input type="submit" name="calculate" value="Calculate Bill">
      </form>

        <?php
        if(isset($_POST['calculate'])) {
            $units = $_POST['units'];
            $bill = 0;

            if($units <= 100) {
                $bill = $units * 1.50; 
                } elseif($units <= 200) {
                $bill = (100 * 1.50) + (($units - 100) * 2.50); 


            }elseif($units <=300){
                $bill = (100 * 1.50) + (100 * 2.50) + (($units - 200) * 4.00);
            } 
            else {
                $bill = (100 * 1.50) + (100 * 2.50) + (100 * 4.00) + (($units - 300) * 6.00);  
            }

            echo "<h3>Total Bill Amount: ₹ " . number_format($bill,2) . "</h3>";
}
?>
</body>
</html>