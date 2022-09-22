$(function(){
    $('input[name="C-9"]').on('change',()=>{
      cancel('C-9')
    })
    $('input[name="C-10_1"]').on('change',()=>{
      cancel('C-10_1')
    })
    $('input[name="C-10_2"]').on('change',()=>{
      cancel('C-10_2')
    })
    $('input[name="C-10_4"]').on('change',()=>{
      cancel('C-10_4')
    })
    $('input[name="C-10_5"]').on('change',()=>{
      cancel('C-10_5')
    })
    $('input[name="C-10_6"]').on('change',()=>{
      cancel('C-10_6')
    })
    $('input[name="C-11"]').on('change',()=>{
      cancel('C-11')
    })
    $('input[name="C-12"]').on('change',()=>{
      cancel('C-12')
    })
    $('input[name="C-13"]').on('change',()=>{
      cancel('C-13')
    })
    $('input[name="C-14"]').on('change',()=>{
      cancel('C-14')
    })
    $('input[name="C-15"]').on('change',()=>{
      cancel('C-15')
    })
    $('input[name="C-16"]').on('change',()=>{
      cancel('C-16')
    })
    $('input[name="C-17"]').on('change',()=>{
      cancel('C-17')
      cancel('C-18')
      app.q3_18_A=[]
    })
    $('input[name="C-18"]').on('change',()=>{
      cancel('C-18')
    })
    $('input[name="C-19"]').on('change',()=>{
      cancel('C-19')
    })
  })
  var app = new Vue({
    el: '#app',
    data: {
      q3_9:'',
      q3_10_1:'',
      q3_10_1_B:'',
      q3_10_1_D:[],
      q3_10_1_E:'',
      q3_10_1_F:'',
      q3_10_1_H:[],
      q3_10_2:'',
      q3_10_2_A:'',
      q3_10_2_B:[],
      q3_10_2_D:'',
      q3_10_2_E:'',
      q3_10_4:'',
      q3_10_5:'',
      q3_10_6:'',
      q3_10_6_A:'',
      q3_10_6_c:[],
      q3_11:'',
      q3_12:'',
      q3_12_B:'',
      q3_12_D:'',
      q3_12_G:[],
      q3_12_H:[],
      q3_13:'',
      q3_13_C:'',
      q3_13_D:[],
      q3_14:'',
      q3_15:'',
      q3_15_A:[],
      q3_16:'',
      q3_16_A:'',
      q3_16_D:[],
      q3_16_E:[],
      q3_16_H:'',
      q3_16_I:'',
      q3_17:'',
      q3_18:'',
      q3_18_A:[],
      q3_19:'',
      q3_19_A:'',
      q3_19_B:[],
      q3_19_C:[],
      q3_19_D:'',
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
        q3_10_1_E() {
          if(!this.watch_flag) { 
            return false
          }
            this.q3_10_1_F='';
        },
        q3_10_1_B(value){
          if(!this.watch_flag) { 
            return false
          }
            this.q3_10_1_E=''
            this.q3_10_1_F=''
            if(value==1){
                $('input[name="C-10_1-E"]').prop('disabled',false)
                $('select[name="C-10_1-F"]').prop('disabled',false)
            }else{
                $('input[name="C-10_1-E"]').prop('disabled',true)
                $('select[name="C-10_1-F"]').prop('disabled',true)
            }
        },
        q3_10_1_D(value){
          if(!this.watch_flag) { 
            return false
          }
            if(value.indexOf('2')!=-1){
                $('input[name="C-10_1-H[]"]').prop('disabled',false)
                $('input[name="C-10_1-I"]').prop('disabled',false)
            }else{
                this.q3_10_1_H=[]
                $('input[name="C-10_1-I"]').val('')
                $('input[name="C-10_1-H[]"]').prop('disabled',true)
                $('input[name="C-10_1-I"]').prop('disabled',true)
            }
        },
        q3_10_2_E(value){
          if(!this.watch_flag) { 
            return false
          }
          if (value==2){
            this.q3_10_2_D=''
            this.q3_10_2_A=''
            $('input[name="C-10_2-D"]').prop('disabled',true)
            $('select[name="C-10_2-A"]').prop('disabled',true)
          }
        },
        q3_10_6_A(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-10_6-D"]').val('')
            this.q3_10_6_c=[]
            if(value==1){
                $('input[name="C-10_6-D"]').prop('disabled',false)
                $('input[name="C-10_6-C[]"]').prop('disabled',false)
            }else{
                $('input[name="C-10_6-D"]').prop('disabled',true)
                $('input[name="C-10_6-C[]"]').prop('disabled',true)
            }
        },
        q3_12_B(value){
          if(!this.watch_flag) { 
            return false
          }
            this.q3_12_D=''
            $('select[name="C-12-E"]').prop('checked',false)
            $('select[name="C-12-E"]').val('')
            if(value==1){
                $('input[name="C-12-D"]').prop('disabled',false)
                $('select[name="C-12-E"]').prop('disabled',false)
            }else{
                $('input[name="C-12-D"]').prop('disabled',true)
                $('select[name="C-12-E"]').prop('disabled',true)
            }
        },
        q3_12_G(value){
          if(!this.watch_flag) { 
            return false
          }
            if(value.indexOf('1')!=-1){
                $('input[name="C-12-H[]"]').prop('disabled',false)
                $('input[name="C-12-I"]').prop('disabled',false)
            }else{
                this.q3_12_H=[]
                $('input[name="C-12-I"]').val('')
                $('input[name="C-12-H[]"]').prop('disabled',true)
                $('input[name="C-12-I"]').prop('disabled',true)
            }
        },
        q3_13_C(value){
          if(!this.watch_flag) { 
            return false
          }
            $('input[name="C-13-E"]').val('')
            this.q3_13_D=[]
            if(value==1){
                $('input[name="C-13-E"]').prop('disabled',false)
                $('input[name="C-13-D[]"]').prop('disabled',false)
            }else{
                $('input[name="C-13-E"]').prop('disabled',true)
                $('input[name="C-13-D[]"]').prop('disabled',true)
            }
        },
        q3_16_D(value){
          if(!this.watch_flag) { 
            return false
          }
            if(value.indexOf('1')!=-1){
                $('input[name="C-16-E[]"]').prop('disabled',false)
                $('input[name="C-16-F"]').prop('disabled',false)
            }else{
                this.q3_16_E=[]
                $('input[name="C-16-F"]').val('')
                $('input[name="C-16-E[]"]').prop('disabled',true)
                $('input[name="C-16-F"]').prop('disabled',true)
            }
        },
        q3_16_H(value){
          if(!this.watch_flag) { 
            return false
          }
            $('select[name="C-16-A"]').prop('checked',false)
        },
        q3_16_I(value){
          if(!this.watch_flag) { 
            return false
          }
          if (value==2){
            this.q3_16_H=''
            this.q3_16_A=''
          }
        },
        q3_19_A(value){
          if(!this.watch_flag) { 
            return false
          }
          this.q3_19_B=[]
          this.q3_19_C=[]
          this.q3_19_D=''
        },
        q3_17(){
          q3_18=''
          $('select[name="C-18-E"]').prop('checked',false)
        }
    }
  })
  function checkForm() {
    if(app.q3_10_1_D.length>2){
      $('#3-10_1-D-err').removeClass("d-none");
      alert('該問項之選項超過2項');
      var target_top = $('#3-10_1-D-err').offset().top-20;
      $("html,body").scrollTop(target_top);
      return false;
    }
    if(app.q3_10_2_B.length>2){
      $('#3-10_2-B-err').removeClass("d-none");
      alert('該問項之選項超過2項');
      var target_top = $('#3-10_2-B-err').offset().top-20;
      $("html,body").scrollTop(target_top);
      return false;
    }
    if(app.q3_12_G.length>2){
      $('#3-12-G-err').removeClass("d-none");
      alert('該問項之選項超過2項');
      var target_top = $('#3-12-G-err').offset().top-20;
      $("html,body").scrollTop(target_top);
      return false;
    }
    if(app.q3_16_D.length>2){
      $('#3-16-D-err').removeClass("d-none");
      alert('該問項之選項超過2項');
      var target_top = $('#3-16-D-err').offset().top-20;
      $("html,body").scrollTop(target_top);
      return false;
    }
    if(app.q3_19_C.length>2){
      $('#3-19-C-err').removeClass("d-none");
      alert('該問項之選項超過2項');
      var target_top = $('#3-19-C-err').offset().top-20;
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
