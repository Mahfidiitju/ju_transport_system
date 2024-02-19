<select id="yrank" class="btn btn-primary" style="margin-right: 10px;" onchange="Func()">
  <option selected="selected">Select</option>
  <option value="iron">Iron</option>
  <option value="bronze">Bronze</option>
  <option value="silver">Silver</option>
  <option value="gold">Gold</option>
  <option value="platinum">Platinum</option>
  <option value="diamond">Diamond</option>
</select>
<script>
  var yrank = document.getElementById("yrank");

function Func() {
  if (yrank.value === 'bronze') {
    console.log('do something');
  } else {
    console.log(yrank.value);
  }
}
</script>