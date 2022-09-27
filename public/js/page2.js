$(function () {
    $('input[name="B_1"]').on('change',()=>{
        cancel('B_1')
    })
    $('input[name="B_3"]').on('change',()=>{
      cancel('B_3')
    })
    $('input[name="B_5"]').on('change',()=>{
      cancel('B_5')
    })
    $('input[name="B_7"]').on('change',()=>{
      cancel('B_7')
    })
})

var app = new Vue({
  el: '#app',
  data: {
    B_1:'',
    B_1_1:[],
    B_2:[],
    B_3:'',
    B_3_1:[],
    B_5:'',
    B_5_2:[],
    B_6:[],
    B_7:'',
    B_9:'',
    B_11:[],
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


