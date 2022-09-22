$(function () {
    $('input[name="B-1"]').on('change',()=>{
        cancel('B-1')
    })
    $('input[name="B-2"]').on('change',()=>{
        cancel('B-2')
    })
    $('input[name="B-2-1"]').on('change',()=>{
        $('input[type="radio"][name="B-2-2"]').prop("checked",false)
    })
})
function checkForm() {
    // if($('#B-1-1').is(':checked')){
    //     if(!$('select[name="B-1-1"]').val()){
    //       $('#2-1-1err').toggleClass("d-none");
    //       var target_top = $('#2-1-1err').offset().top-20;
    //       $("html,body").scrollTop(target_top);
    //       return false;
    //     }
    // }
    // if($('#B-1-2').is(':checked')){
    //     if(!$('input[name="B-1-2"]:checked').val()){
    //       $('#2-1-2err').toggleClass("d-none");
    //       var target_top = $('#2-1-2err').offset().top-20;
    //       $("html,body").scrollTop(target_top);
    //       return false;
    //     }
    // }
    // if($('#B-2-1').is(':checked')){
    //   if(!$('input[name="B-2-1"]:checked').val()){
    //       $('#2-2-1err').toggleClass("d-none");
    //       var target_top = $('#2-2-1err').offset().top-20;
    //       $("html,body").scrollTop(target_top);
    //       return false;
    //     }
    //   if(!$('input[name="2-2-1err2"]').val()){
    //     $('#2-2-1err2').toggleClass("d-none");
    //     var target_top = $('#2-2-1err2').offset().top-20;
    //     $("html,body").scrollTop(target_top);
    //     return false;
    //   }
    // }
    // alert('ok')
    // return false;
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


