<h1>Login</h1>

<form action="http://localhost:2929/?api=culck&act=login&det=logging" method="post">
Token: <input type="text" name="token"><br />
Email: <input type="text" name="email"><br />
Password: <input type="text" name="passwd"><br />
<input type="submit" name="submit" value="Submit">
</form>


<h1>Register</h1>

<form action="http://localhost:2929/?api=culck&act=register" method="post">
Token: <input type="text" name="token"><br />
Name: <input type="text" name="name"><br />
Email: <input type="text" name="email"><br />
Phone: <input type="text" name="phone"><br />
Password: <input type="text" name="pass"><br />
Confirm Password: <input type="text" name="cpass"><br />
<input type="submit" name="submit" value="Submit">
</form>
