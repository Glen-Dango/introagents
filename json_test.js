<!DOCTYPE html>
<html>
<body>

<p>Access a JavaScript object:</p>

<p id="demo"></p>

<script>
var myObj, x;
myObj = { name: "John", age: 30, city: "New York" };
x = myObj.name;
document.getElementById("demo").innerHTML = x;
</script>

</body>
</html>