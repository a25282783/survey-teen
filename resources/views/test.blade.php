<script src="/js/jquery-3.6.0.min.js"></script>
<form action="/test" method="post">
@csrf
<input type="checkbox" name="a[]" value="1">1
<input type="checkbox" name="a[]" value="2">2
<input type="checkbox" name="a[]" value="3">3
<input type="radio" name="b" id="" >b
<input type="radio" name="b" id="">c
<select name="d" id="d">
  <option value="">none</option>
  <option value="a">a</option>
  <option value="b">b</option>
</select>
<select name="e" id="e" required>
  <option value="">none</option>
  <option value="a">a</option>
  <option value="b">b</option>
</select>
<input type="button" id="test1">clear checkbox
<input type="button" id="test2">clear radio
<input type="button" id="test3">clear select
<input type="submit" value="submit">
</form>
<script>
  $(function(){
    $('#test1').click(function(){
      test1()
    });
    $('#test2').click(function(){
      test2()
    });
    $('#test3').click(function(){
      test3()
    });
    function test1(){
      $('input[type="checkbox"]').prop("checked",false)
    }
    function test2(){
      console.log($('select[type="select"]').attr('name'))
      $('input[type="radio"]').prop("checked",false)
    }
    function test3(){
      $('select[id="e"]').val("")
    }
  })

</script>
