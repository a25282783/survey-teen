@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
    <form id="form" action="{{ route('page4') }}" method="POST"  onsubmit="return checkForm()">
        @csrf
        <h2>參、職業生涯發展規劃</h2>
        <div class="row">
            <!-- C_1 -->
            <div class="col-12">
                <h3>一、請問您目前有沒有轉換工作的打算？</h3>
                <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_1" id="C_1_v1" value="1" required 
                        v-model="C_1" ref="C_1">
                        <label class="form-check-label" for="C_1_v1">
                            1.沒有
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_1" id="C_1_v2" value="2"
                        v-model="C_1" ref="C_1">
                        <label class="form-check-label" for="C_1_v2">
                            2.有，原因有哪些？<span class="badge badge-pill badge-warning">可複選</span>
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v1" value="1"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v1">
                                    (1)薪資及福利不符期望
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v2" value="2"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v2">
                                    (2)工作無發展前景
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v3" value="3"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v3">
                                    (3)興趣不合
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v4" value="4"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v4">
                                    (4)工作環境不佳
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v5" value="5"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v5">
                                    (5)想更換工作地點
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v6" value="6"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v6">
                                    (6)個人技能無法有效發揮
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v7" value="7"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v7">
                                    (7)公司經營困難(如破產、倒閉)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v8" value="8"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v8">
                                    (8)家庭或健康因素(如結婚、生產)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v9" value="9"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v9">
                                    (9)工作太累、壓力大
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v10" value="10"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v10">
                                    (10)與同事或主管相處困難
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v11" value="11"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v11">
                                    (11)想自行開創事業
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v12" value="12"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v12">
                                    (12)擔心被解僱
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v13" value="13"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v13">
                                    (13)準備考試 (含就業、證照等)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_1_1[]" id="C_1_1_v14" value="14"
                                :required="C_1==2&&C_1_1.length<1"
                                :disabled="C_1!=2"
                                v-model="C_1_1" ref="C_1_1">
                                <label class="form-check-label" for="C_1_1_v14">
                                    (14)其他(請說明)
                                </label>
                                <input type="text" class="form-control" name="C_1_2" :disabled="C_1!=2">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- C_2 -->
            <div class="col-12">
                <h3>二、請問您有沒有到海外工作的打算<span class="text-danger">(不考慮疫情因素)</span></h3>
                <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_2" id="C_2_v1" value="1" required 
                        v-model="C_2" ref="C_2">
                        <label class="form-check-label" for="C_2_v1">
                            1.沒有
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_2" id="C_2_v2" value="2" 
                        v-model="C_2" ref="C_2">
                        <label class="form-check-label" for="C_2_v2">
                            2.有，打算到哪？ <span class="badge badge-pill badge-warning">(最多複選3項)</span>
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v1" value="1"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('1') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v1">
                                    (1)中國大陸、港澳(中國大陸、香港、澳門等)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v2" value="2"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('2') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v2">
                                    (2)東北亞(日本、韓國等)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v3" value="3"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('3') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v3">
                                    (3)東南亞(越南、泰國、新加坡等)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v4" value="4"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('4') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v4">
                                    (4)紐澳(紐西蘭、澳洲等)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v5" value="5"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('5') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v5">
                                    (5)美國、加拿大
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v6" value="6"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('6') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v6">
                                    (6)歐洲
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v7" value="7"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('7') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v7">
                                    (7)中南美洲(古巴、墨西哥、秘魯等)
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_2_1[]" id="C_2_1_v8" value="8"
                                :required="C_2==2&&C_2_1.length<1"
                                :disabled="C_2!=2|| (C_2_1.length>=3 && C_2_1.indexOf('8') ==-1)"
                                v-model="C_2_1" ref="C_2_1">
                                <label class="form-check-label" for="C_2_1_v8">
                                    (8)其他(請說明)
                                </label>
                                <input type="text" class="form-control" name="C_2_2" :disabled="C_2!=2">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- C_3 -->
            <div class="col-12">
                <h3>三、請問您目前有沒有持有哪方面的證照？</h3>
                <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_3" id="C_3_v1" value="1" required 
                        v-model="C_3" ref="C_3">
                        <label class="form-check-label" for="C_3_v1">
                            1.有證照，持有的證照為：<span class="badge badge-pill badge-warning">可複選</span>
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_3_1[]" id="C_3_1_v1" value="1"
                                :required="C_3==1&&C_3_1.length<1"
                                :disabled="C_3!=1"
                                v-model="C_3_1" ref="C_3_1">
                                <label class="form-check-label" for="C_3_1_v1">
                                    (1)技術士證照<input min="1" type="number" class="input-inline"
                                    name="C_3_2"
                                    :required="C_3_1.indexOf('1')!==-1"
                                    :disabled="C_3_1.indexOf('1')==-1"
                                    >張
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_3_1[]" id="C_3_1_v2" value="2"
                                :required="C_3==1&&C_3_1.length<1"
                                :disabled="C_3!=1"
                                v-model="C_3_1" ref="C_3_1">
                                <label class="form-check-label" for="C_3_1_v2">
                                    (2)專門職業及技術人員考試及格證書<input min="1" type="number" class="input-inline"
                                    name="C_3_3"
                                    :required="C_3_1.indexOf('2')!==-1"
                                    :disabled="C_3_1.indexOf('2')==-1"
                                    >張
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_3_1[]" id="C_3_1_v3" value="3"
                                :required="C_3==1&&C_3_1.length<1"
                                :disabled="C_3!=1"
                                v-model="C_3_1" ref="C_3_1">
                                <label class="form-check-label" for="C_3_1_v3">
                                    (3)金融從業人員證照<input min="1" type="number" class="input-inline"
                                    name="C_3_4"
                                    :required="C_3_1.indexOf('3')!==-1"
                                    :disabled="C_3_1.indexOf('3')==-1"
                                    >張
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_3_1[]" id="C_3_1_v4" value="4"
                                :required="C_3==1&&C_3_1.length<1"
                                :disabled="C_3!=1"
                                v-model="C_3_1" ref="C_3_1">
                                <label class="form-check-label" for="C_3_1_v4">
                                    (4)電腦相關證照<input min="1" type="number" class="input-inline"
                                    name="C_3_5"
                                    :required="C_3_1.indexOf('4')!==-1"
                                    :disabled="C_3_1.indexOf('4')==-1"
                                    >張
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_3_1[]" id="C_3_1_v5" value="5"
                                :required="C_3==1&&C_3_1.length<1"
                                :disabled="C_3!=1"
                                v-model="C_3_1" ref="C_3_1">
                                <label class="form-check-label" for="C_3_1_v5">
                                    (5)語文認證<input min="1" type="number" class="input-inline"
                                    name="C_3_6"
                                    :required="C_3_1.indexOf('5')!==-1"
                                    :disabled="C_3_1.indexOf('5')==-1"
                                    >張
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_3_1[]" id="C_3_1_v6" value="6"
                                :required="C_3==1&&C_3_1.length<1"
                                :disabled="C_3!=1"
                                v-model="C_3_1" ref="C_3_1">
                                <label class="form-check-label" for="C_3_1_v6">
                                    (6)其他(請說明
                                    <input type="text" class="input-inline" name="C_3_7"
                                    :required="C_3_1.indexOf('6')!==-1"
                                    :disabled="C_3_1.indexOf('6')==-1"
                                    >
                                    )<input min="1" type="number" class="input-inline"
                                    name="C_3_8"
                                    :required="C_3_1.indexOf('6')!==-1"
                                    :disabled="C_3_1.indexOf('6')==-1"
                                    >張
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_3" id="C_3_v2" value="2"
                        v-model="C_3" ref="C_3">
                        <label class="form-check-label" for="C_3_v2">
                            2.沒有
                        </label>
                    </div>
                </div>
                </div>
            </div>
            <!-- C_4 -->
            <div class="col-12">
                <h3>四、請問您過去一年有沒有參加教育訓練<span class="text-danger">(含工作場所提供之訓練)</span>？</h3>
                <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_4" id="C_4_v1" value="1" required 
                        v-model="C_4" ref="C_4">
                        <label class="form-check-label" for="C_4_v1">
                            1.有，參加的訓練項目？<span class="badge badge-pill badge-warning">可複選</span>
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v1" value="1"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v1">
                                    (1)專業技術訓練
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v2" value="2"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v2">
                                    (2)語文
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v3" value="3"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v3">
                                    (3)電腦相關課程
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v4" value="4"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v4">
                                    (4)一般行政事務
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v5" value="5"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v5">
                                    (5)領導統御業務管理
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v6" value="6"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v6">
                                    (6)人際關係溝通協調
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v7" value="7"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v7">
                                    (7)職業安全訓練
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v8" value="8"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v8">
                                    (8)銷售或顧客服務之訓練
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="C_4_1[]" id="C_4_1_v9" value="9"
                                :required="C_4==1&&C_4_1.length<1"
                                :disabled="C_4!=1"
                                v-model="C_4_1" ref="C_4_1">
                                <label class="form-check-label" for="C_4_1_v9">
                                    (9)其他(請說明)
                                </label>
                                <input type="text" class="form-control" name="C_4_2" :disabled="C_4!=1">
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="C_4" id="C_4_v2" value="2"
                        v-model="C_4" ref="C_4">
                        <label class="form-check-label" for="C_4_v2">
                            2.沒有，未參訓主因？
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="C_4_3" id="C_4_3_v1" value="1"
                                :required="C_4==2"
                                :disabled="C_4!=2"
                                v-model="C_4_3" ref="C_4_3">
                                <label class="form-check-label" for="C_4_3_v1">
                                    (1)不知道提供訓練課程的單位或機構
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="C_4_3" id="C_4_3_v2" value="2"
                                :disabled="C_4!=2"
                                v-model="C_4_3" ref="C_4_3">
                                <label class="form-check-label" for="C_4_3_v2">
                                    (2)沒有適合的訓練課程
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="C_4_3" id="C_4_3_v3" value="3"
                                :disabled="C_4!=2"
                                v-model="C_4_3" ref="C_4_3">
                                <label class="form-check-label" for="C_4_3_v3">
                                    (3)工作太忙，沒有時間參加
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="C_4_3" id="C_4_3_v4" value="4"
                                :disabled="C_4!=2"
                                v-model="C_4_3" ref="C_4_3">
                                <label class="form-check-label" for="C_4_3_v4">
                                    (4)參加訓練的費用太高，負擔不起
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="C_4_3" id="C_4_3_v5" value="5"
                                :disabled="C_4!=2"
                                v-model="C_4_3" ref="C_4_3">
                                <label class="form-check-label" for="C_4_3_v5">
                                    (5)參加訓練對升遷或尋(轉)職沒有幫助
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="C_4_3" id="C_4_3_v6" value="6"
                                :disabled="C_4!=2"
                                v-model="C_4_3" ref="C_4_3">
                                <label class="form-check-label" for="C_4_3_v6">
                                    (6)目前的技能夠用，不需要再參加訓練
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="C_4_3" id="C_4_3_v7" value="7"
                                :disabled="C_4!=2"
                                v-model="C_4_3" ref="C_4_3">
                                <label class="form-check-label" for="C_4_3_v7">
                                    (7)其他(請說明)
                                </label>
                                <input type="text" class="form-control" name="C_4_4" :disabled="C_4!=2">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- 頁碼+按鈕 -->
        @include('mixin.section-footer',['current'=>3])
    </form>
</main>
@include('mixin.footer')
<script src="js/page3.js?v={{ $assets_version }}"></script>
<script>
$(function(){
    var text = ['C_1_2', 'C_2_2', 'C_4_2', 'C_4_4'];
    makeTextRequired(text)
})
</script>
@endsection
