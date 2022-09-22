$(function(){
    $('input[name="D-1"]').on('change',()=>{
      cancel('D-1')
    })
    //skip 4-2 4-3
    $('input[name="D-4"]').on('change',()=>{
      cancel('D-4')
    })
    $('input[name="D-5"]').on('change',()=>{
      cancel('D-5')
    })
  })
  var app = new Vue({
    el: '#app',
    data: {
      q4_1:'',
      q4_1_A:'',
      q4_1_C:'',
      q4_1_D:[],
      q4_3:[],
      q4_4:'',
      q4_4_A:'',
      q4_4_B:[],
      q4_5:'',
      q4_5_A:'',
      q4_5_B:'',
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
        q4_1(value){
          if(!this.watch_flag) { 
            return false
          }
          if (value==2) {
            $('input[name="D-2"]').prop("checked",false)
            $('input[name="D-2-A"]').val('')
            $('input[name="D-3[]"]').prop("checked",false)
            $('input[name="D-3-A"]').val('')
          }
        },
        q4_1_C(value){
          if(!this.watch_flag) { 
            return false
          }
            this.q4_1_D=[]
            $('input[name="D-1-E"]').val('')
            if(value==1){
                $('input[name="D-1-E"]').prop('disabled',false)
                $('input[name="D-1-D[]"]').prop('disabled',false)
            }else{
                $('input[name="D-1-E"]').prop('disabled',true)
                $('input[name="D-1-D[]"]').prop('disabled',true)
            }
        },
        q4_4_A(value){
          if(!this.watch_flag) { 
            return false
          }
            this.q4_4_B=[]
            $('input[name="D-4-C"]').val('')
            if(value==1){
                $('input[name="D-4-C"]').prop('disabled',false)
                $('input[name="D-4-B[]"]').prop('disabled',false)
            }else{
                $('input[name="D-4-C"]').prop('disabled',true)
                $('input[name="D-4-B[]"]').prop('disabled',true)
            }
        }
    }
  })
  function checkForm() {
    if(app.q4_3.length>3){
      $('#4-3-err').removeClass("d-none");
      alert('第三題超過三項')
      var target_top = $('#4-3-err').offset().top-20;
      $("html,body").scrollTop(target_top);
      return false;
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
