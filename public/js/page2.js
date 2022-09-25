$(function () {
    // $('input[name="B-1"]').on('change',()=>{
    //     cancel('B-1')
    // })
})

var app = new Vue({
  el: '#app',
  data: {
    // A_1:'',
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
    // A_4(value) {
    //   if (value == 1) {
    //       $('input[name="A_4_1[]"]').prop('checked',false)
    //       this.A_4_1=[];
    //       this.A_4_2='';
    //       this.A_4_3='';
    //   }
    // },

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


