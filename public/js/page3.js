$(function(){
    $('input[name="C_1"]').on('change',()=>{
      cancel('C_1')
    })
    $('input[name="C_2"]').on('change',()=>{
      cancel('C_2')
    })
    $('input[name="C_3"]').on('change',()=>{
      cancel('C_3')
      app.C_3_1=[]
        $('input[type="text"][name^="C_3"]').prop('disabled', true);
    })
    $('input[name="C_4"]').on('change',()=>{
      cancel('C_4')
    })
  })

  var app = new Vue({
    el: '#app',
    data: {
      C_1:'',
      C_1_1:[],
      C_2:'',
      C_2_1:[],
      C_3:'',
      C_3_1:[],
      C_4:'',
      C_4_1:[],
      C_4_3:'',
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
