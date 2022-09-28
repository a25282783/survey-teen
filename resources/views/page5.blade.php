@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  <form id="form" action="{{ route('finish') }}" method="POST" onsubmit="return checkForm()">
    @csrf
    <h2>伍、基本資料</h2>
    <div class="row">
        <div class="col-12">
            <h3>一、請問您的性別？</h3>
            <div class="form-group">
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_1" id="E_1_v1" value="1" required >
                    <label class="form-check-label" for="E_1_v1">
                        1.男
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_1" id="E_1_v2" value="2">
                    <label class="form-check-label" for="E_1_v2">
                        2.女
                    </label>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12">
            <h3>二、請問您的年齡？</h3>
            <div class="form-group">
            <div class="qa-box">
                <div class="form-check">
                    <input min="15" max="29" type="number" class="input-inline" name="E_2" required >歲
                </div>
            </div>
            </div>
        </div>
        <div class="col-12">
            <h3>三、請問您的教育程度<span class="text-danger">(已取得畢業證書之最高學歷)</span>？</h3>
            <div class="form-group">
                <div class="form-check">
                    您是民國<input min="0" max="101" type="number" class="input-inline" name="E_3" required >年畢業
                </div>
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_3_1" id="E_3_1_v1" value="1" required >
                    <label class="form-check-label" for="E_3_1_v1">
                        1.國中及以下
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_3_1" id="E_3_1_v2" value="2">
                    <label class="form-check-label" for="E_3_1_v2">
                        2.高級中等(高中、高職)
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_3_1" id="E_3_1_v3" value="3">
                    <label class="form-check-label" for="E_3_1_v3">
                        3.專科
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_3_1" id="E_3_1_v4" value="4">
                    <label class="form-check-label" for="E_3_1_v4">
                        4.大學
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_3_1" id="E_3_1_v5" value="5">
                    <label class="form-check-label" for="E_3_1_v5">
                        5.碩士
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_3_1" id="E_3_1_v6" value="6">
                    <label class="form-check-label" for="E_3_1_v6">
                        6.博士
                    </label>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12">
            <h3>四、請問您目前主要身分是否為學生<span class="text-danger">(正式學籍)</span>？</h3>
            <div class="form-group">
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_4" id="E_4_v1" value="1" required 
                    v-model="E_4" ref="E_4">
                    <label class="form-check-label" for="E_4_v1">
                        1.是<span class="text-danger">(跳答第六題)</span>
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_4" id="E_4_v2" value="2"
                    v-model="E_4" ref="E_4">
                    <label class="form-check-label" for="E_4_v2">
                        2.否
                    </label>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12" v-show="E_4==2">
            <h3>五、請問您畢業後的工作歷程？<span class="text-danger">(學生時期打工不計入)</span>？</h3>
            <div class="form-group">
            <div class="qa-box">
                <div class="form-check">
                    1.畢業後第一份工作是<input min="0" type="number" class="input-inline"
                    name="E_5"
                    :required="E_4==2"
                    >歲
                </div>
                <div class="form-check">
                    2.目前工作是您第<input min="0" type="number" class="input-inline"
                    name="E_5_1"
                    :required="E_4==2"
                    >個工作
                </div>
                <div class="form-check">
                    3.在目前事業單位之年資共有<input min="0" type="number" class="input-inline"
                    name="E_5_2"
                    :required="E_4==2"
                    >年<input min="0" type="number" class="input-inline"
                    name="E_5_3"
                    :required="E_4==2"
                    >
                    個月
                </div>
                <div class="form-check">
                    4.開始工作至目前總共工作年資，共有<input min="0" type="number" class="input-inline"
                    name="E_5_4"
                    :required="E_4==2"
                    >年<input min="0" type="number" class="input-inline"
                    name="E_5_5"
                    :required="E_4==2"
                    >
                    個月
                </div>
            </div>
            </div>
        </div>
        <div id="q6" class="col-12">
            <h3>六、請問您目前每月薪資如何運用？<span class="text-danger">(8項百分比合計為100%)</span></h3>
            <div class="form-group">
            <div class="qa-box">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v1" value="1"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v1">
                        1.生活費用(含自用及家用)
                        <input min="0" type="number" class="input-inline count" name="E_6_1"
                        :required="E_6.indexOf('1')!=-1"
                        :disabled="E_6.indexOf('1')==-1"
                        >
                        %
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v2" value="2"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v2">
                        2.房　租
                        <input min="0" type="number" class="input-inline count" name="E_6_2"
                        :required="E_6.indexOf('2')!=-1"
                        :disabled="E_6.indexOf('2')==-1"
                        >
                        %
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v3" value="3"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v3">
                        3.貸　款(含房貸、信貸、學貸等)
                        <input min="0" type="number" class="input-inline count" name="E_6_3"
                        :required="E_6.indexOf('3')!=-1"
                        :disabled="E_6.indexOf('3')==-1"
                        >
                        %
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v4" value="4"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v4">
                        4.休閒育樂
                        <input min="0" type="number" class="input-inline count" name="E_6_4"
                        :required="E_6.indexOf('4')!=-1"
                        :disabled="E_6.indexOf('4')==-1"
                        >
                        %
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v5" value="5"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v5">
                        5.投資理財(儲蓄、保險、基金)
                        <input min="0" type="number" class="input-inline count" name="E_6_5"
                        :required="E_6.indexOf('5')!=-1"
                        :disabled="E_6.indexOf('5')==-1"
                        >
                        %
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v6" value="6"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v6">
                        6.教育訓練
                        <input min="0" type="number" class="input-inline count" name="E_6_6"
                        :required="E_6.indexOf('6')!=-1"
                        :disabled="E_6.indexOf('6')==-1"
                        >
                        %
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v7" value="7"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v7">
                        7.給父母親
                        <input min="0" type="number" class="input-inline count" name="E_6_7"
                        :required="E_6.indexOf('7')!=-1"
                        :disabled="E_6.indexOf('7')==-1"
                        >
                        %
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="E_6[]" id="E_6_v8" value="8"
                    :required="E_6.length<1"
                    v-model="E_6" ref="E_6">
                    <label class="form-check-label" for="E_6_v8">
                        8.其　他(請說明)
                        <input type="text" class="form-control" name="E_6_9"
                        :required="E_6.indexOf('8')!=-1"
                        :disabled="E_6.indexOf('8')==-1">
                        <input min="0" type="number" class="input-inline count" name="E_6_8"
                        :required="E_6.indexOf('8')!=-1"
                        :disabled="E_6.indexOf('8')==-1"
                        >
                        %
                    </label>
                </div>
            </div>
            </div>
        </div>
        <div class="col-12">
            <h3>七、請問您在校期間是否有參加校外實習？<span class="text-danger">(學生時期打工不計入)</span></h3>
            <div class="form-group">
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_7" id="E_7_v1" value="1" required 
                    v-model="E_7" ref="E_7">
                    <label class="form-check-label" for="E_7_v1">
                        1.有，
                        <div class="qa-box">
                            (1)參加的實習類型？<span class="badge badge-pill badge-warning">可複選</span>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="E_7_1[]" id="E_7_1_v1" value="1"
                                :required="E_7==1&&E_7_1.length<1"
                                :disabled="E_7!=1"
                                v-model="E_7_1" ref="E_7_1">
                                <label class="form-check-label" for="E_7_1_v1">
                                    ①暑期
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="E_7_1[]" id="E_7_1_v2" value="2"
                                :required="E_7==1&&E_7_1.length<1"
                                :disabled="E_7!=1"
                                v-model="E_7_1" ref="E_7_1">
                                <label class="form-check-label" for="E_7_1_v2">
                                    ②學期
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="E_7_1[]" id="E_7_1_v3" value="3"
                                :required="E_7==1&&E_7_1.length<1"
                                :disabled="E_7!=1"
                                v-model="E_7_1" ref="E_7_1">
                                <label class="form-check-label" for="E_7_1_v3">
                                    ③學年
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="E_7_1[]" id="E_7_1_v4" value="4"
                                :required="E_7==1&&E_7_1.length<1"
                                :disabled="E_7!=1"
                                v-model="E_7_1" ref="E_7_1">
                                <label class="form-check-label" for="E_7_1_v4">
                                    ④醫護
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="E_7_1[]" id="E_7_1_v5" value="5"
                                :required="E_7==1&&E_7_1.length<1"
                                :disabled="E_7!=1"
                                v-model="E_7_1" ref="E_7_1">
                                <label class="form-check-label" for="E_7_1_v5">
                                    ⑤海外
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="E_7_1[]" id="E_7_1_v6" value="6"
                                :required="E_7==1&&E_7_1.length<1"
                                :disabled="E_7!=1"
                                v-model="E_7_1" ref="E_7_1">
                                <label class="form-check-label" for="E_7_1_v6">
                                    ⑥其他(請說明)
                                </label>
                                <input type="text" class="form-control" name="E_7_3" :disabled="E_7!=1">
                            </div>
                            (2)是否屬於產學專班(雙軌訓練旗艦計畫、產學攜手合作計畫、產學訓合作訓練計畫)
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="E_7_2" id="E_7_2_v1" value="1"
                                :required="E_7==1"
                                :disabled="E_7!=1">
                                <label class="form-check-label" for="E_7_2_v1">
                                    ①是
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="E_7_2" id="E_7_2_v2" value="2"
                                :required="E_7==1"
                                :disabled="E_7!=1">
                                <label class="form-check-label" for="E_7_2_v2">
                                    ②否
                                </label>
                            </div>
                        </div>
                        
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="E_7" id="E_7_v2" value="2"
                    v-model="E_7" ref="E_7">
                    <label class="form-check-label" for="E_7_v2">
                        2.沒有
                    </label>
                </div>
            </div>
            </div>
        </div>
    </div>
    @include('mixin.section-footer',['current'=>5])
  </form>
</main>
@include('mixin.footer')
<script src="js/page5.js?v={{ $assets_version }}"></script>
<script>
  $(function(){
    var text = ['E_7_3'];
    makeTextRequired(text)
  })
</script>
@endsection
