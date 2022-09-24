var cancel;
setTimeout(function () {
    cancel = function (tag) {
        $('input[type="text"][name^="'+tag+'_"]').val("");
        $('input[type="number"][name^="'+tag+'_"]').val("");
        $('select[name^="'+tag+'_"]').val("");
        $('input[type="checkbox"][name^="'+tag+'_"]').prop("checked",false)
        $('input[type="radio"][name^="'+tag+'_"]').prop("checked",false)
    }
}, 1000);

// 須說明文字監聽父元素變化，父元素未勾選則不顯示＋清空值
function makeTextRequired(text) {
    text.forEach(element=>{
        let parent_element = $('input[type="text"][name="'+element+'"],input[type="number"][name="'+element+'"]').prev().prev()
        let parent_name = parent_element.attr('name');
        let parent_type = parent_element.attr('type');
        let target_value = parent_element.attr('value');
        if(parent_type=='radio'){
            let value = $('input[name="'+parent_name+'"]:checked').val();
                if(value==target_value){
                    $('input[name="'+element+'"]').prop('required',true);
                    $('input[name="'+element+'"]').prop('disabled',false);
                }else{
                    $('input[name="'+element+'"]').prop('required',false);
                    $('input[name="'+element+'"]').prop('disabled',true);
                    $('input[name="'+element+'"]').val('');
                }
            }else{
            let map_value = $('input[name="'+parent_name+'"]:checked').map(function() { return $(this).val(); }).get()
                if($.inArray(target_value,map_value)>=0){
                    $('input[name="'+element+'"]').prop('required',true);
                    $('input[name="'+element+'"]').prop('disabled',false);
                }else{
                    $('input[name="'+element+'"]').prop('required',false);
                    $('input[name="'+element+'"]').prop('disabled',true);
                    $('input[name="'+element+'"]').val('');
                }
            }
        $('input[name="'+parent_name+'"]').on('change',()=>{
            if(parent_type=='radio'){
            let value = $('input[name="'+parent_name+'"]:checked').val();
                if(value==target_value){
                    $('input[name="'+element+'"]').prop('required',true);
                    $('input[name="'+element+'"]').prop('disabled',false);
                }else{
                    $('input[name="'+element+'"]').prop('required',false);
                    $('input[name="'+element+'"]').prop('disabled',true);
                    $('input[name="'+element+'"]').val('');
                }
            }else{
            let map_value = $('input[name="'+parent_name+'"]:checked').map(function() { return $(this).val(); }).get()
                if($.inArray(target_value,map_value)>=0){
                    $('input[name="'+element+'"]').prop('required',true);
                    $('input[name="'+element+'"]').prop('disabled',false);
                }else{
                    $('input[name="'+element+'"]').prop('required',false);
                    $('input[name="'+element+'"]').prop('disabled',true);
                    $('input[name="'+element+'"]').val('');
                }
            }

        })
    });
}

// 渲染已填答案
function renderAnswer() {
    for (const name in data) {
        if (['公司名稱', '填表人', '密碼', '帳號', '樣本編號', '部門', '電話', '職稱', '傳真', 'email'].indexOf(name) >= 0) {
            let value = data[name];
            if (value != null) {
                if (name == '填表人') {
                    $('input[name="name"][type="text"]').val(value);
                } else if (name == '部門') {
                    $('input[name="depart"][type="text"]').val(value);
                } else if (name == '電話') {
                    $('input[name="phone"][type="number"]').val(value);
                } else if (name == '職稱') {
                    $('input[name="job"][type="text"]').val(value);
                } else if (name == '傳真') {
                    $('input[name="tax"][type="number"]').val(value);
                } else if (name == 'email') {
                    $('input[name="email"][type="email"]').val(value);
                }
            }
        } else {
            let value = data[name]['answer'];
            if (value != null) {
                if (typeof(value) === 'object') {
                    insertCheckBox(name, value);
                } else {
                    insertAnswer(name, value);
                }
            }
        }
    }
}

function insertAnswer(name, value) {
    $('input[name="'+name+'"][type="text"]').val(value);
    $('input[name="'+name+'"][type="number"]').val(value);
    $('select[name="'+name+'"]').val(value);
    $('input[name="'+name+'"][type="radio"][value="'+value+'"]').prop('checked', true);
}

function insertCheckBox(name, value){
    var counter = 1;
    for (const subName in value) {
        if (value[subName] == "1") {
            $('input[name="'+name+'[]"][type="checkbox"][value="'+counter+'"]').prop('checked', true);
        }
        counter++;
    }
}

