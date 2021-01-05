<?php
	include "../connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="This is the description">
        <link rel="stylesheet" href="styles.css" />
        <script src="store.js" async></script>
    </head>
    <body>
		<?php
			$sql = "select * from product";
			$result = mysqli_query($connect,$sql);
			
			if(mysqli_num_rows($result) > 0) {
				foreach($result as $row) { 
					$Pname = $row['Product_Name'];
					$Pimg = $row['Product_Img'];
					$Pprice = $row['Product_Price'];
					$Pdesc = $row['Product_Desc'];
					echo "<section class='container content-section'>";
						echo "<div class='shop-items'>";
							echo "<div class='shop-item'>";
								echo "<span class='shop-item-title'>$Pname</span>";
								echo "<img class='shop-item-image' src=$Pimg>";
								echo "<div> <center>$Pdesc</center> </div>";
								echo "<div class='shop-item-details'>";
									echo "<div class='shop-item-price'>RM$Pprice</div>";
									echo "<div><button class='btn btn-primary shop-item-button' type='button'>ADD TO CART</button></div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					echo "</section>";
				}
			}
        ?>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">RM0</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
        </section>
    </body>
</html>

<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = '../Navbar.php';
	}
	reloadNavbar();
</script>