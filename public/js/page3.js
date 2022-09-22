$(function(){
    $('input[name="C-1"]').on('change',()=>{
      cancel('C-1')
    })
    $('input[name="C-2"]').on('change',()=>{
      cancel('C-2')
    })
    $('input[name="C-3"]').on('change',()=>{
      cancel('C-3')
    })
    $('input[name="C-4_1"]').on('change',()=>{
      cancel('C-4_1')
    })
    $('input[name="C-4_2"]').on('change',()=>{
      cancel('C-4_2')
    })
    $('input[name="C-5"]').on('change',()=>{
      cancel('C-5')
    })
    $('input[name="C-6"]').on('change',()=>{
      cancel('C-6')
    })
    $('input[name="C-7"]').on('change',()=>{
      cancel('C-7')
    })
    $('input[name="C-8"]').on('change',()=>{
      cancel('C-8')
    })
    $('input[name="C-6-C"]').on('change',()=>{
      $('input[type="checkbox"][name="C-6-H[]"]').prop("checked",false)
    })
    $('input[name="C-7-F"]').on('change',()=>{
      $('input[type="checkbox"][name="C-7-H[]"]').prop("checked",false)
    })

  })

  var app = new Vue({
    el: '#app',
    data: {
      q3_1:'',
      q3_1_A:'',
      q3_1_F:'',
      q3_1_G:[],
      q3_2:'',
      q3_2_A:[],
      q3_3:'',
      q3_3_B:'',
      q3_3_C:[],
      q3_41:'',
      q3_41_B:'',
      q3_41_F:'',
      q3_41_H:[],
      q3_42:'',
      q3_42_B:'',
      q3_42_C:[],
      q3_5:'',
      q3_5_B:'',
      q3_5_C:[],
      q3_6:'',
      q3_6_B:'',
      q3_6_c:'',
      q3_6_D:[],
      q3_7:'',
      q3_7_B:'',
      q3_7_F:'',
      q3_8:'',
      q3_8_A:'',
      q3_8_B:'',
      text1:'',
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
        q3_1_A(value) {
            if(!this.watch_flag) { 
              return false
            }
            $('input[name="C-1-C"]').val('')
            $('input[name="C-1-D"]').val('')
        },
        q3_1_F(value) {
            if(!this.watch_flag) { 
              return false
            }
            $('input[name="C-1-G[]"]').prop('checked',false)
            this.q3_1_G=[]
            $('input[name="C-1-H"]').val('')
            if(value==1){
                $('input[name="C-1-G[]"]').prop('disabled',false)
                $('input[name="C-1-H"]').prop('disabled',false)
            }else{
                $('input[name="C-1-G[]"]').prop('disabled',true)
                $('input[name="C-1-H"]').prop('disabled',true)
            }
        },
        q3_3_B(value) {
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-3-C[]"]').prop('checked',false)
            this.q3_3_C=[]
            $('input[name="C-3-D"]').val('')
            if(value==1){
                $('input[name="C-3-C[]"]').prop('disabled',false)
                $('input[name="C-3-D"]').prop('disabled',false)
            }else{
                $('input[name="C-3-C[]"]').prop('disabled',true)
                $('input[name="C-3-D"]').prop('disabled',true)
            }
        },
        q3_41_F(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-4_1-H[]"]').prop('checked',false)
            this.q3_41_H=[]
            $('input[name="C-4_1-I"]').val('')
            if(value==1){
                $('input[name="C-4_1-H[]"]').prop('disabled',false)
                $('input[name="C-4_1-I"]').prop('disabled',false)
            }else{
                $('input[name="C-4_1-H[]"]').prop('disabled',true)
                $('input[name="C-4_1-I"]').prop('disabled',true)
            }
        },
        q3_42_B(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-4_2-C[]"]').prop('checked',false)
            this.q3_42_C=[]
            $('input[name="C-4_2-D"]').val('')
            if(value==2){
                $('input[name="C-4_2-C[]"]').prop('disabled',false)
                $('input[name="C-4_2-D"]').prop('disabled',false)
            }else{
                $('input[name="C-4_2-C[]"]').prop('disabled',true)
                $('input[name="C-4_2-D"]').prop('disabled',true)
            }
        },
        q3_5_B(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-5-C[]"]').prop('checked',false)
            this.q3_5_C=[]
            $('input[name="C-5-D"]').val('')
            if(value==2){
                $('input[name="C-5-C[]"]').prop('disabled',false)
                $('input[name="C-5-D"]').prop('disabled',false)
            }else{
                $('input[name="C-5-C[]"]').prop('disabled',true)
                $('input[name="C-5-D"]').prop('disabled',true)
            }
        },
        q3_6_B(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-6-G"]').val('')
            if(value==1){
                $('input[name="C-6-G"]').prop('disabled',false)
            }else{
                $('input[name="C-6-G"]').prop('disabled',true)
            }
        },
        q3_7_B(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-7-D"]').val('')
            if(value==1){
                $('input[name="C-7-D"]').prop('disabled',false)
            }else{
                $('input[name="C-7-D"]').prop('disabled',true)
            }
        },
        q3_8_A(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-8-C"]').val('')
            $('input[name="C-8-D"]').val('')
            if(value==1){
                $('input[name="C-8-C"]').prop('disabled',false)
                $('input[name="C-8-D"]').prop('disabled',false)
            }else{
                $('input[name="C-8-C"]').prop('disabled',true)
                $('input[name="C-8-D"]').prop('disabled',true)
            }
        },
        q3_8_B(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-8-E"]').val('')
            if(value==1){
                $('input[name="C-8-E"]').prop('disabled',false)
            }else{
                $('input[name="C-8-E"]').prop('disabled',true)
            }
        }

    }
  })

  function checkForm() {
    if(app.q3_6_D.length>3){
      $('#3-6-D-err').removeClass("d-none");
      alert('超過三項')
      var target_top = $('#3-6-D-err').offset().top-20;
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
