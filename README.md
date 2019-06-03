# my-shop

Set Up

Create a database. Import data into the database using the myshop.sql files present in the root directory.
Ensure that all the variables are correct in the connection setup in /inc/DBConn.php.

Using The Shop

Navigate to the root directory in a browser.
Click on startup.php.
From here, there are two paths - "Shop" and "Admin Login".
If you click on "Admin Login", use the details below to log in as an admin. This is the only admin account.

	Admin Page Login Details:

	Email: mp@whu.com
	Password: P@55w0rd!

If you click on "Shop", you will be presented with the list of products of which you can add to your cart.

Once you've added at least one product, you will be able to Checkout. You will then be asked to sign in or register.

Use the following details to sign in as a regular customer.

	Customer Login Details:

	Email: vb@mercedes.com
	Password: P@55w0rd!

After loggin in, you will be shown you're cart with items in it, with a string of the session_id(). To proceed with your order, click "Buy". You will be redirected showing that your order has been placed, along with your order number.

You can continue shopping with a fresh cart if you click on "Continue shopping."

Thank you.