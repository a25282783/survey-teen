$(function(){
    var q={
      q5_1_1:'',
      q5_1_2:'',
      q5_1_3:'',
      q5_1_4:'',
      q5_1_5:''
    }

    function checkShow(){
      let flag1=false
      let flag2=false
      for(var prop in q){
        if(q[prop]==1){
          flag1=true
          continue
        }
        if(q[prop]==2){
          flag2=true
          continue
        }
      }
      app.onlyfemale =flag1
      app.onlymale =flag2
    }

    $('input[name="E-1-1"]').each(function(){
      $(this).on('change',()=>{
        q.q5_1_1=$(this).val();
        checkShow()
      })
    })
    $('input[name="E-1-2"]').each(function(){
      $(this).on('change',()=>{
        q.q5_1_2=$(this).val();
        checkShow()
      })
    })
    $('input[name="E-1-3"]').each(function(){
      $(this).on('change',()=>{
        q.q5_1_3=$(this).val();
        checkShow()
      })
    })
    $('input[name="E-1-4"]').each(function(){
      $(this).on('change',()=>{
        q.q5_1_4=$(this).val();
        checkShow()
      })
    })
    $('input[name="E-1-5"]').each(function(){
      $(this).on('change',()=>{
        q.q5_1_5=$(this).val();
        checkShow()
      })
    })

  })
  var app = new Vue({
    el: '#app',
    mounted(){
      renderAnswer()
    },
    data: {
      onlymale:false,
      onlyfemale:false
    },
  })

  function checkForm() {
    // final
    if ($('#form').find('input[name=save-return]').length > 0) {
      if (confirm('儲存本頁')){
        return true
      } else {
        $('input[name=save-return]').remove()
        return false
      }
    } else {
      return confirm('確認前往下一頁嗎？');
    }
  }
