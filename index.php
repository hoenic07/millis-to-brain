<textarea id="input" style="width: 100%; height: 80%;" placeholder="Insert JSON Response here">
</textarea>
<button onclick="toHumanReadableDate()" style="width: 100%; height: 40px; font-size: 15pt;">Let me understand those millis!</button>

<script>
function toHumanReadableDate(){
  var value = document.getElementById("input").value

  var expression = / ([0-9]{13})/g;
  var s = value
  var m;
  var res = []

  do {
      m = expression.exec(value);
      if (m) res.push(m[0])
  } while (m);

  res.forEach(v=>{
    dateStr = new Date(parseInt(v));
    value = value.replace(v," "+dateStr)
  });

  document.getElementById("input").value = value;
}
</script>