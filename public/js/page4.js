$(function(){
    $('input[name="D_1"]').on('change',()=>{
      cancel('D_1')
      app.D_1_1=''
    })
    $('input[name="D_2"]').on('change',()=>{
      cancel('D_2')
      app.D_2_1=''
    })
    $('input[name="D_3"]').on('change',()=>{
      cancel('D_3')
      app.D_3_1=''
    })
  })
  var app = new Vue({
    el: '#app',
    data: {
      D_1:'',
      D_1_1:'',
      D_2:'',
      D_2_1:'',
      D_3:'',
      D_3_1:'',
      D_5:[],
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
      D_1_1(value){
        if(value==1){
          $('input[name="D_1_2"]').prop('checked', false)
        }
      },
      D_2_1(value){
        if(value==1){
          $('input[name="D_2_2"]').prop('checked', false)
        }
      },
      D_3_1(value){
        if(value==1){
          $('input[name="D_3_2"]').prop('checked', false)
        }
      }
    }
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

  setTimeout(function(){
    app.watch_flag = true
  }, 1500)
