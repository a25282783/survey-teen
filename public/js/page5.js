$(function(){
  $('input[name="E_6[]"]').on('change', function(){
    var id = $(this).attr('id')
    $('label[for="'+id+'"] > input').val('')
  })
  $('input[name="E_7"]').on('change', function(){
    cancel('E_7')
    app.E_7_1=[]
  })
})
  var app = new Vue({
    el: '#app',
    data: {
      E_4:'',
      E_6:[],
      E_7:'',
      E_7_1:[],
      watch_flag:true
    },
    methods:{
      updateData(){
          for (const key in this.$data) {
              if (key === 'watch_flag') {
                  continue
              }
              var element = this.$refs[key];
              if (element == undefined) {
                continue
              }
              var tagName = element.tagName.toLowerCase()
              if (tagName == 'select') {
                  this[key] =$('select[name="'+element.name+'"]').val()
              }
              if (tagName == 'input') {
                  var type = element.type.toLowerCase()
                  if (type == 'text' || type == 'number') {
                      this[key] =$('input[name="'+element.name+'"]').val()
                  } else if (type == 'radio') {
                      this[key] = $('input[name="'+this.$refs[key].name+'"]:checked').val()
                  } else if (type == 'checkbox') {
                      this[key] = $('input[name="'+this.$refs[key].name+'"]:checked').map(function(){
                          return $(this).val();
                      }).get()
                  }

              }
          }
      }
  },
    mounted(){
      this.watch_flag = false
      renderAnswer();
      this.updateData();
    },
    watch:{
       
    }
  })
  function checkForm() {
    var count=0
    $('.count').each(function(){
      var val = parseInt($(this).val())
      if(val){
        count += val
      }
    })
    if (count!==100) {
      alert('第六題合計需等於100%')
      document.getElementById('q6').scrollIntoView()
      return false
    }
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

  setTimeout(function(){
    app.watch_flag = true
  }, 1500)
