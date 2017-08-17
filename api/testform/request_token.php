Type 1 = Token VPN<br />
Type 2 = Token Login<br />
Type 3 = Token Register<br />
<br />
<br />
<form action="http://localhost:2929/?api=culck&act=auth&det=request_token" method="post">
ckey: <input type="text" name="ckey" value="testingdoang"><br />
key: <input type="text" name="key" value="123"><br />
skey: <input type="text" name="skey" value="321"><br />
type: <input type="text" name="type" value="3"><br />
<input type="submit" name="submit" value="Submit">
</form>
