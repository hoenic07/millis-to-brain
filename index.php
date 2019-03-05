<textarea id="input" style="width: 100%; height: 80%;" placeholder="Insert JSON Response here">
</textarea>
<button onclick="toHumanReadableDate()" style="width: 100%; height: 40px; font-size: 15pt;">Let me understand those millis!</button>
<input id="formatJSON" type="checkbox">Format JSON

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script>
function toHumanReadableDate(){
  var value = document.getElementById("input").value

  var expression = /[^0-9](1[0-9]{12})[^0-9]/g;
  var s = value
  var m;
  var res = []

  do {
      m = expression.exec(value);
      if (m) res.push(m[1])
  } while (m);

  res.forEach(v=>{
    dateStr = moment(new Date(parseInt(v))).format("YYYY-MM-DD HH:mm:ss");   
    value = value.replace(v,`\"${dateStr} UTC\"`)
  });

  var doFormat = document.getElementById("formatJSON").checked

  if(doFormat){
    value = JSON.stringify(JSON.parse(value),null,2);
  }

  document.getElementById("input").value = value;
}
</script>