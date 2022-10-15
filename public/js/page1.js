$(function(){
    $('input[name="A_3"]').on('change',()=>{
        cancel('A_3')
        $('input[name=A_3_4]').prop('disabled',true)
        $('input[name=A_3_5]').prop('disabled',true)
        app.A_3_1=[]
        app.A_3_3=[]
    })
    $('input[name="A_6"]').on('change',()=>{
        cancel('A_6')
    })
    $('input[name="A_8"]').on('change',()=>{
        cancel('A_8')
        $('input[name=A_8_3]').prop('disabled',true)
        $('input[name=A_8_4]').prop('disabled',true)
        app.A_8_1=[]
    })
    $('input[name="A_9"]').on('change',()=>{
        cancel('A_9')
        app.A_9_1=[]
    })
    $('input[name="A_10"]').on('change',()=>{
        cancel('A_10')
    })
  })

  var app = new Vue({
    el: '#app',
    data: {
      A_1:'',
      A_2:[],
      A_2_1:[],
      A_2_1_1:[],
      A_2_1_2:[],
      A_2_2:[],
      A_2_3:[],
      A_3:'',
      A_3_1:[],
      A_3_2:'',
      A_3_4:'',
      A_3_3:[],
      A_3_5:'',
      A_4:'',
      A_4_1:[],
      A_4_2:'',
      A_4_3:'',
      A_4_4:'',
      A_6:'',
      A_7:'',
      A_8:'',
      A_8_1:[],
      A_9:'',
      A_9_1:[],
      A_10:'',
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
      A_2(value) {
        if (value.indexOf('1') == -1){
          this.A_2_1 = []
          this.A_2_1_1 = []
          this.A_2_1_2 = []
          $('input[name=A_2_1_3]').val('')
        }
        if (value.indexOf('2') == -1){
          this.A_2_2 = []
          $('input[name=A_2_2_1]').val('')
        }
        if (value.indexOf('3') == -1){
          this.A_2_3 = []
          $('input[name=A_2_3_1]').val('')
        }
      },
      A_2_1(value){
        if (value.indexOf('1') == -1){
          this.A_2_1_1 = []
        }
        if (value.indexOf('2') == -1){
          this.A_2_1_2 = []
        }
      },
      A_4(value) {
        if (value == 1) {
            $('input[name="A_4_1[]"]').prop('checked',false)
            this.A_4_1=[];
            this.A_4_2='';
            this.A_4_3='';
        }
      },
      A_8(value) {
        if(value == 2) {
            $('input[name="A_8_3"]').prop('disabled',true)
        }
      },
      A_9(value) {
        if(value == 1) {
            $('input[name="A_9_2"]').prop('disabled',true)
        }
      }

    }
  })

  function checkForm() {
    if (app.A_4==2 && !app.A_4_1.includes(app.A_4_3) ) {
      document.getElementById('A_4_3').scrollIntoView()
      document.getElementById('A_4_3').focus()
      alert('第四題的主要原因請填已勾選之選項')
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
