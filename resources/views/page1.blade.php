@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  <form id="form" action="{{ route('page2') }}" method="POST" onsubmit="return checkForm()">
    @csrf
    <div class="basic-info-form">
      <div class="form-group row">
        <label class="col col-form-label text-danger">打＊號欄位請務必填寫：</label>
      </div>
      <div class="form-group row">
        <label  class="col-md-2 col-form-label">樣本編號：</label>
        <div class="col-md-5">
          <input name="serial" type="text" class="form-control" value="{{ auth()->user()->serial }}" readonly="readonly">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-md-2 col-form-label">公司名稱/姓名：</label>
        <div class="col-md-5">
          <input name="company" type="text" class="form-control" value="{{ auth()->user()->depart }}" readonly="readonly">
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label"><span class="text-danger">*</span>填表人：</label>
        <div class="col-md-5">
          <input name="name" type="text" class="form-control" id="name" value="{{ auth()->user()->survey_name }}" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="depart" class="col-md-2 col-form-label">部門：</label>
        <div class="col-md-5">
          <input name="depart" type="text" class="form-control" id="depart">
        </div>
      </div>
      <div class="form-group row">
        <label for="job" class="col-md-2 col-form-label">職稱：</label>
        <div class="col-md-5">
          <input name="job" type="text" class="form-control" id="job">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-md-2 col-form-label"><span class="text-danger">*</span>email：</label>
        <div class="col-md-5">
          <input name="email" type="email" class="form-control" id="email" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="phone" class="col-md-2 col-form-label"><span class="text-danger">*</span>聯絡電話：</label>
        <div class="col-md-5">
          <input name="phone" type="text" class="form-control" id="phone" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="tax" class="col-md-2 col-form-label">傳真電話：</label>
        <div class="col-md-5">
          <input name="tax" type="text" class="form-control" id="tax">
        </div>
      </div>
    </div>
    <hr>
    <h2>壹、目前就業狀況</h2>
    <div class="row">
        <!-- A_1 -->
        <div class="col-12">
            <h3>一、請問您服務之工作地點所在縣市？</h3>
            <div class="form-group">
              <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A_1" id="A_1_v1" value="1" required v-model="A_1" ref="A_1">
                    <label class="form-check-label" for="A_1_v1">
                        1.北部地區(臺北市、新北市、宜蘭縣、桃園市、新竹縣市、基隆市)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A_1" id="A_1_v2" value="2" v-model="A_1" ref="A_1">
                    <label class="form-check-label" for="A_1_v2">
                        2.中部地區(苗栗縣、臺中市、彰化縣、南投縣、雲林縣)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A_1" id="A_1_v3" value="3" v-model="A_1" ref="A_1">
                    <label class="form-check-label" for="A_1_v3">
                        3.南部地區(高雄市、嘉義縣市、臺南市、屏東縣、澎湖縣)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A_1" id="A_1_v4" value="4" v-model="A_1" ref="A_1">
                    <label class="form-check-label" for="A_1_v4">
                        4.東部地區(花蓮縣、臺東縣)
                    </label>
                </div>
              </div>
            </div>
        </div>
        <!-- A_2 -->
        <div class="col-12">
          <h3>二、請問您獲得目前工作的方法：<span class="badge badge-pill badge-warning">可複選</span></h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="A_2[]" id="A_2_v1" value="1" :required="A_2.length<1" v-model="A_2" ref="A_2">
                  <label class="form-check-label" for="A_2_v1">
                      1.從政府提供之求職管道
                  </label>
              </div>
                <!-- A_2_1 -->
                <div class="qa-box">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_1[]" id="A_2_1_v1" value="1" 
                    :required="A_2.indexOf('1')!=-1 && A_2_1.length<1"
                    :disabled="A_2.indexOf('1')==-1"
                    v-model="A_2_1" ref="A_2_1">
                    <label class="form-check-label" for="A_2_1_v1">
                        (1)透過網站(或APP)應徵：
                    </label>
                  </div>
                    <!-- A_2_1_1 -->
                    <div class="qa-box">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_2_1_1[]" id="A_2_1_1_v1" value="1" 
                        :required="A_2_1.indexOf('1')!=-1 && A_2_1_1.length<1"
                        :disabled="A_2_1.indexOf('1')==-1"
                        v-model="A_2_1_1" ref="A_2_1_1">
                        <label class="form-check-label" for="A_2_1_1_v1">
                            ①台灣就業通網站
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_2_1_1[]" id="A_2_1_1_v2" value="2" 
                        :required="A_2_1.indexOf('1')!=-1 && A_2_1_1.length<1"
                        :disabled="A_2_1.indexOf('1')==-1"
                        v-model="A_2_1_1" ref="A_2_1_1">
                        <label class="form-check-label" for="A_2_1_1_v2">
                            ②其他政府機關網站
                        </label>
                      </div>
                    </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_1[]" id="A_2_1_v2" value="2" 
                    :required="A_2.indexOf('1')!=-1 && A_2_1.length<1"
                    :disabled="A_2.indexOf('1')==-1"
                    v-model="A_2_1" ref="A_2_1">
                    <label class="form-check-label" for="A_2_1_v2">
                        (2)現場服務：
                    </label>
                  </div>
                    <!-- A_2_1_2 -->
                    <div class="qa-box">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_2_1_2[]" id="A_2_1_2_v1" value="1" 
                        :required="A_2_1.indexOf('2')!=-1 && A_2_1_2.length<1"
                        :disabled="A_2_1.indexOf('2')==-1"
                        v-model="A_2_1_2" ref="A_2_1_2">
                        <label class="form-check-label" for="A_2_1_2_v1">
                            ①公立就業服務機構(就業中心/就業服務站/就業服務台)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_2_1_2[]" id="A_2_1_2_v2" value="2" 
                        :required="A_2_1.indexOf('2')!=-1 && A_2_1_2.length<1"
                        :disabled="A_2_1.indexOf('2')==-1"
                        v-model="A_2_1_2" ref="A_2_1_2">
                        <label class="form-check-label" for="A_2_1_2_v2">
                            ②現場徵才活動或就業博覽會
                        </label>
                      </div>
                    </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_1[]" id="A_2_1_v3" value="3" 
                    :required="A_2.indexOf('1')!=-1 && A_2_1.length<1"
                    :disabled="A_2.indexOf('1')==-1"
                    v-model="A_2_1" ref="A_2_1">
                    <label class="form-check-label" for="A_2_1_v3">
                        (3)參加政府機關考試：
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_1[]" id="A_2_1_v4" value="4" 
                    :required="A_2.indexOf('1')!=-1 && A_2_1.length<1"
                    :disabled="A_2.indexOf('1')==-1"
                    v-model="A_2_1" ref="A_2_1">
                    <label class="form-check-label" for="A_2_1_v4">
                        (4)其他(請說明)：
                    </label>
                    <input name="A_2_1_3" type="text" class="form-control" 
                    :disabled="A_2_1.indexOf('4') == -1"
                    placeholder="請說明">
                  </div>
                </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="A_2[]" id="A_2_v2" value="2" :required="A_2.length<1" v-model="A_2" ref="A_2">
                <label class="form-check-label" for="A_2_v2">
                    2.從私立就業服務機構提供之求職管道
                </label>
              </div>
                <!-- A_2_2 -->
                <div class="qa-box">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_2[]" id="A_2_2_v1" value="1" 
                    :required="A_2.indexOf('2')!=-1 && A_2_2.length<1"
                    :disabled="A_2.indexOf('2')==-1"
                    v-model="A_2_2" ref="A_2_2">
                    <label class="form-check-label" for="A_2_2_v1">
                        (1)透過網站(或APP)應徵(104、1111、518、yes123等人力銀行)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_2[]" id="A_2_2_v2" value="2" 
                    :required="A_2.indexOf('2')!=-1 && A_2_2.length<1"
                    :disabled="A_2.indexOf('2')==-1"
                    v-model="A_2_2" ref="A_2_2">
                    <label class="form-check-label" for="A_2_2_v2">
                        (2)私立就業服務機構現場服務
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_2[]" id="A_2_2_v3" value="3" 
                    :required="A_2.indexOf('2')!=-1 && A_2_2.length<1"
                    :disabled="A_2.indexOf('2')==-1"
                    v-model="A_2_2" ref="A_2_2">
                    <label class="form-check-label" for="A_2_2_v3">
                        (3)其他(請說明)
                    </label>
                    <input name="A_2_2_1" type="text" class="form-control"
                    :disabled="A_2_2.indexOf('3') == -1"
                    placeholder="請說明">
                  </div>
                </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="A_2[]" id="A_2_v3" value="3" :required="A_2.length<1" v-model="A_2" ref="A_2">
                <label class="form-check-label" for="A_2_v3">
                    3.其他求職管道
                </label>
              </div>
                <!-- A_2_3 -->
                <div class="qa-box">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v1" value="1" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v1">
                        (1)公司機構網站
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v2" value="2" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v2">
                        (2)社群網站
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v3" value="3" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v3">
                        (3)報紙或平面媒體廣告
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v4" value="4" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v4">
                        (4)參加公司機構考試
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v5" value="5" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v5">
                        (5)親友推薦
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v6" value="6" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v6">
                        (6)自我推薦
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v7" value="7" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v7">
                        (7)師長推薦
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="A_2_3[]" id="A_2_3_v8" value="8" 
                    :required="A_2.indexOf('3')!=-1 && A_2_3.length<1"
                    :disabled="A_2.indexOf('3')==-1"
                    v-model="A_2_3" ref="A_2_3">
                    <label class="form-check-label" for="A_2_3_v8">
                        (8)其他(請說明)
                    </label>
                    <input name="A_2_3_1" type="text" class="form-control"
                    :disabled="A_2_3.indexOf('8') == -1"
                    placeholder="請說明">
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- A_3 -->
        <div class="col-12">
          <h3>三、請問您目前的工作於應徵時有無提出薪資期望？</h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_3" id="A_3_v1" value="1" required v-model="A_3" ref="A_3">
                  <label class="form-check-label" for="A_3_v1">
                      1.有,
                  </label>
                      <!-- A_3_1 -->
                      <div class="qa-box">
                        <label for="form-check-label">
                          (1)提出薪資期望的原因為：<span class="badge badge-pill badge-warning">可複選</span>
                        </label>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_1[]" id="A_3_1_v1" value="1" 
                          :required="A_3=='1' && A_3_1.length<1"
                          :disabled="A_3!='1'"
                          v-model="A_3_1" ref="A_3_1">
                          <label class="form-check-label" for="A_3_1_v1">
                              ①已經設定理想的薪資水準
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_1[]" id="A_3_1_v2" value="2" 
                          :required="A_3=='1' && A_3_1.length<1"
                          :disabled="A_3!='1'"
                          v-model="A_3_1" ref="A_3_1">
                          <label class="form-check-label" for="A_3_1_v2">
                              ②已知道一般薪資行情
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_1[]" id="A_3_1_v3" value="3" 
                          :required="A_3=='1' && A_3_1.length<1"
                          :disabled="A_3!='1'"
                          v-model="A_3_1" ref="A_3_1">
                          <label class="form-check-label" for="A_3_1_v3">
                              ③做為談判的基礎
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_1[]" id="A_3_1_v4" value="4" 
                          :required="A_3=='1' && A_3_1.length<1"
                          :disabled="A_3!='1'"
                          v-model="A_3_1" ref="A_3_1">
                          <label class="form-check-label" for="A_3_1_v4">
                              ④其他(請說明)
                          </label>
                          <input name="A_3_4" type="text" class="form-control"
                          :disabled="A_3_1.indexOf('4') == -1"
                          placeholder="請說明">
                        </div>
                      </div>
                     <!-- A_3_2 -->
                      <div class="qa-box">
                        <label class="form-check-label">
                          (2)您覺得提出薪資期望是否有助於獲得理想薪資﹖
                         </label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="A_3_2" id="A_3_2_v1" value="1" 
                          :required="A_3=='1'"
                          :disabled="A_3!='1'"
                          v-model="A_3_2" ref="A_3_2">
                          <label class="form-check-label" for="A_3_2_v1">
                             ①有
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="A_3_2" id="A_3_2_v2" value="2" 
                          :disabled="A_3!='1'"
                          v-model="A_3_2" ref="A_3_2">
                          <label class="form-check-label" for="A_3_2_v2">
                              ②沒有
                          </label>
                        </div>
                      </div>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_3" id="A_3_v2" value="2" v-model="A_3" ref="A_3">
                  <label class="form-check-label" for="A_3_v2">
                      2.沒有，原因有哪些？<span class="badge badge-pill badge-warning">可複選</span>
                  </label>
                      <!-- A_3_3 -->
                      <div class="qa-box">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v1" value="1" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v1">
                            (1)雇主給的薪資福利已符合自己的期待
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v2" value="2" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v2">
                            (2)自認為爭取也沒用
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v3" value="3" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v3">
                            (3)擔心給雇主不好印象，影響應徵結果
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v4" value="4" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v4">
                            (4)自己學歷不是很好，不敢要求
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v5" value="5" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v5">
                            (5)自己經驗不足，不敢要求
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v6" value="6" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v6">
                            (6)自己欠缺相關證照，不敢要求
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v7" value="7" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v7">
                            (7)有經濟壓力，只求趕快找到工作
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v8" value="8" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v8">
                            (8)認為薪資不是重點，想先累積經驗
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="A_3_3[]" id="A_3_3_v9" value="9" 
                          :required="A_3=='2' && A_3_3.length<1"
                          :disabled="A_3!='2'"
                          v-model="A_3_3" ref="A_3_3">
                          <label class="form-check-label" for="A_3_3_v9">
                            (9)其他(請說明)
                          </label>
                          <input name="A_3_5" type="text" class="form-control"
                          :disabled="A_3_3.indexOf('9') == -1"
                          placeholder="請說明">
                        </div>
                      </div>
              </div>
            </div>
          </div>
        </div>
        <!-- A_4 -->
        <div class="col-12">
          <h3>四、請問您目前的工作性質？</h3>
          <div class="form-group">
            <div class="qa-box">
              (一)全時或部分工時：
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_4" id="A_4_v1" value="1" required v-model="A_4" ref="A_4">
                  <label class="form-check-label" for="A_4_v1">
                    1.全時工作
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_4" id="A_4_v2" value="2" v-model="A_4" ref="A_4">
                  <label class="form-check-label" for="A_4_v2">
                    2.部分時間工作 (指較場所單位規定全時勞工正常上班時數有相當程度縮短者)，
                    <br>
                    請問您從事部分時間工作的原因為：<span class="badge badge-pill badge-warning">最多複選3項</span>
                  </label>
                  <div class="qa-box">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v1" value="1"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('1') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v1">
                        (1)能選擇工作時段
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v2" value="2"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('2') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v2">
                        (2)想縮短工作時間
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v3" value="3"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('3') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v3">
                        (3)工作比較簡單
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v4" value="4"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('4') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v4">
                        (4)對於工作內容感興趣
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v5" value="5"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('5') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v5">
                        (5)可以馬上離職
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v6" value="6"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('6') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v6">
                        (6)職類特性
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v7" value="7"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('7') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v7">
                        (7)目前還是學生
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v8" value="8"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('8') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v8">
                        (8)貼補家用
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v9" value="9"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('9') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v9">
                        (9)幫忙親友
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v10" value="10"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('10') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v10">
                        (10)等待服兵役
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v11" value="11"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('11') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v11">
                        (11)打發時間
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v12" value="12"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('12') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v12">
                        (12)家庭因素(育兒、照顧病人及老人等)，無法擔任全時工作
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v13" value="13"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('13') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v13">
                        (13)體力上無法擔任全時工作
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v14" value="14"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('14') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v14">
                        (14)找不到全時工作
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v15" value="15"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('15') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v15">
                        (15)公司業務緊縮，縮短工時因應
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="A_4_1[]" id="A_4_1_v16" value="16"
                      :required="A_4==2 && A_4_1.length<1"
                      :disabled="A_4!=2 || (A_4_1.length>=3 && A_4_1.indexOf('16') ==-1)"
                      v-model="A_4_1" ref="A_4_1">
                      <label class="form-check-label" for="A_4_1_v16">
                        (16)其他(請說明)
                      </label>
                      <input name="A_4_2" type="text" class="form-control"
                      :disabled="A_4_1.indexOf('16') == -1"
                      placeholder="請說明">
                    </div>
                    <div class="form-check">
                      其中最主要的原因為                      (請填號碼)
                      <input min="1" max="16" name="A_4_3" type="number" class="input-inline" placeholder="請說明"
                      :required="A_4==2"
                      :disabled="A_4!=2"
                      v-model="A_4_3" ref="A_4_3"
                      id="A_4_3"
                      style="width: 100px;">
                    </div>
                  </div>
              </div>

            </div>
            <div class="qa-box">
            (二)一般僱用或派遣人力：
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_4_4" id="A_4_4_v1" value="1" required
                v-model="A_4_4" ref="A_4_4">
                <label class="form-check-label" for="A_4_4_v1">
                  1.一般僱用
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_4_4" id="A_4_4_v2" value="2"
                v-model="A_4_4" ref="A_4_4">
                <label class="form-check-label" for="A_4_4_v2">
                  2.派遣人力(指派遣事業單位與要派單位約定，由派遣事業單位指派所僱用之勞工至要派單位提供勞務，並接受要派單位指揮監督管理之關係。)
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- A_5 -->
        <div class="col-12">
          <h3>五、請問您目前這份工作平均每週工作幾小時(不含加班工時)</h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                <input min="1" type="number" step="0.1"  class="form-control" required name="A_5"
                style="width: 100px" ref="A_5">
              </div>
            </div>
          </div>
        </div>
        <!-- A_6 -->
        <div class="col-12">
          <h3>六、請問您<span class="text-danger">(111年)</span>到目前為止有沒有延長工時(加班)工作的情形？</h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_6" id="A_6_v1" value="1" required v-model="A_6" ref="A_6">
                  <label class="form-check-label" for="A_6_v1">
                    1.有,
                    平均每週
                    <input type="number" class="input-inline"
                    step="0.1" name="A_6_1" ref="A_6_1"
                    :required="A_6==1"
                    :disabled="A_6!=1"
                    >
                    小時，其中有領取加班費的時數為
                    <input type="number" class="input-inline"
                    step="0.1" name="A_6_2" ref="A_6_2"
                    :required="A_6==1"
                    :disabled="A_6!=1"
                    >
                    小時(無則填0)，
                    有轉換補休的時數為
                    <input type="number" class="input-inline"
                    step="0.1" name="A_6_3" ref="A_6_3"
                    :required="A_6==1"
                    :disabled="A_6!=1"
                    >
                    小時(無則填0)
                  </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_6" id="A_6_v2" value="2" required v-model="A_6" ref="A_6">
                <label class="form-check-label" for="A_6_v2">
                  1.沒有
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- A_7 -->
        <div class="col-12">
          <h3>七、請問您目前這份工作薪資：</h3>
          <div class="form-group">
            <div class="qa-box">
              1.計薪方式：
              <div class="qa-box">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_7" id="A_7_v1" value="1" required v-model="A_7" ref="A_7">
                  <label class="form-check-label" for="A_7_v1">
                    (1)月薪制(不論出勤日數或時數，每月可以領取固定的金額，而不是指每個月發一次薪水)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_7" id="A_7_v2" value="2" required v-model="A_7" ref="A_7">
                  <label class="form-check-label" for="A_7_v2">
                    (2)日薪制(指依出勤日數計給薪水)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_7" id="A_7_v3" value="3" required v-model="A_7" ref="A_7">
                  <label class="form-check-label" for="A_7_v3">
                    (3)時薪制(指依出勤時數計給薪水)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_7" id="A_7_v4" value="4" required v-model="A_7" ref="A_7">
                  <label class="form-check-label" for="A_7_v4">
                    (4)按件計酬(依完成的件數計給薪水)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_7" id="A_7_v5" value="5" required v-model="A_7" ref="A_7">
                  <label class="form-check-label" for="A_7_v5">
                    (5)底薪加業績獎金(指除有約定固定底薪外，會再依績效或件數發給獎金)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_7" id="A_7_v6" value="6" required v-model="A_7" ref="A_7">
                  <label class="form-check-label" for="A_7_v6">
                    (6)無底薪之績效制(指無約定固定底薪，僅依績效發給薪水或獎金)
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_7" id="A_7_v7" value="7" required v-model="A_7" ref="A_7">
                  <label class="form-check-label" for="A_7_v7">
                    (7)其他(請說明)
                  </label>
                  <input type="text" class="form-control" name="A_7_1">
                </div>
              </div>
            </div>
            <div class="qa-box">
              2.平均每月薪資為
              <input min="0" type="number" name="A_7_2"
              required class="input-inline"
              >
              元(指受僱人員經常性收入，如本薪、加班費、固定津貼及獎金，非月薪制者，請換算成平均每月之薪資。)
            </div>
          </div>
        </div>
        <!-- A_8 -->
        <div class="col-12">
          <h3>八、請問您目前這份工作過去一年是否有領到下列各項奬金(含禮券、禮盒)？</h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_8" id="A_8_v1" value="1" v-model="A_8" ref="A_8" required>
                    <label class="form-check-label" for="A_8_v1">
                      有領到，獎金項目為：<span class="badge badge-pill badge-warning">可複選</span>
                    </label>
                    <div class="qa-box">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v1" value="1"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v1">
                          (1)工作績效獎金
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v2" value="2"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v2">
                          (2)年終獎金(或年中獎金)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v3" value="3"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v3">
                          (3)員工紅利
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v4" value="4"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v4">
                          (4)全勤獎金
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v5" value="5"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v5">
                          (5)不休假獎金
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v6" value="6"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v6">
                          (6)三節獎金/禮券/禮盒(春節、端午節、中秋節)
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v7" value="7"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v7">
                          (7)生日禮金/禮券/禮盒
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_8_1[]" id="A_8_1_v8" value="8"
                        :required="A_8==1 && A_8_1.length<1"
                        :disabled="A_8!=1"
                        v-model="A_8_1" ref="A_8_1">
                        <label class="form-check-label" for="A_8_1_v8">
                          (8)其他(請說明)
                        </label>
                        <input type="text" class="form-control" name="A_8_3">
                      </div>
                    </div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_8" id="A_8_v2" value="2" v-model="A_8" ref="A_8">
                    <label class="form-check-label" for="A_8_v2">
                      2.沒有領到，原因為：
                    </label>
                    <div class="qa-box">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="A_8_2" id="A_8_2_v1" value="1"
                        :required="A_8==2"
                        :disabled="A_8!=2">
                        <label class="form-check-label" for="A_8_2_v1">
                          (1)還沒做滿1年無法領取獎金
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="A_8_2" id="A_8_2_v2" value="2"
                        :required="A_8==2"
                        :disabled="A_8!=2">
                        <label class="form-check-label" for="A_8_2_v2">
                          (2)公司沒發獎金
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="A_8_2" id="A_8_2_v3" value="3"
                        :required="A_8==2"
                        :disabled="A_8!=2">
                        <label class="form-check-label" for="A_8_2_v3">
                          (3)其他(請說明)
                        </label>
                        <input type="text" class="form-control" name="A_8_4">
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <!-- A_9 -->
        <div class="col-12">
          <h3>九、請問您目前這份工作，是否曾獲加薪？</h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_9" id="A_9_v1" value="1" v-model="A_9" ref="A_9" required>
                    <label class="form-check-label" for="A_9_v1">
                      1.沒有
                    </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_9" id="A_9_v2" value="2" v-model="A_9" ref="A_9">
                    <label class="form-check-label" for="A_9_v2">
                      2.有，請問獲得加薪的理由為何？<span class="badge badge-pill badge-warning">可複選</span>
                    </label>
                    <div class="qa-box">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v1" value="1"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v1">
                          (1)個人職務晉升
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v2" value="2"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v2">
                          (2)個人在原職務表現良好
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v3" value="3"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v3">
                          (3)公司獲利增加
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v4" value="4"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v4">
                          (4)個人服務年資增加
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v5" value="5"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v5">
                          (5)個人完成新的訓練課程或取得新的證照
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v6" value="6"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v6">
                          (6)公司擔心我會離職
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v7" value="7"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v7">
                          (7)公司全面調薪
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v8" value="8"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v8">
                          (8)配合基本工資調整
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v9" value="9"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v9">
                          (9)試用期滿調薪
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v10" value="10"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v10">
                          (10)業務增加
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="A_9_1[]" id="A_9_1_v11" value="11"
                        :required="A_9==2 && A_9_1.length<1"
                        :disabled="A_9!=2" 
                        v-model="A_9_1" ref="A_9_1">
                        <label class="form-check-label" for="A_9_1_v11">
                          (11)其他(請說明) 
                        </label>
                        <input type="text" class="form-control" name="A_9_2">
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <!-- A_10 -->
        <div class="col-12">
          <h3>十、請問您目前這份工作是否為網路接案平台工作？(如載客平台司機、送餐平台外送員、線上平台自由接案者等)</h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_10" id="A_10_v1" value="1" v-model="A_10" ref="A_10" required>
                    <label class="form-check-label" for="A_10_v1">
                      1.是
                    </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_10" id="A_10_v2" value="2" v-model="A_10" ref="A_10">
                    <label class="form-check-label" for="A_10_v2">
                      2.否，目前有沒有另從事網路接案平台工作？
                    </label>
                    <div class="qa-box">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="A_10_1" id="A_10_1_v1" value="1"
                        :required="A_10==2"
                        :disabled="A_10!=2">
                        <label class="form-check-label" for="A_10_1_v1">
                          (1)有
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="A_10_1" id="A_10_1_v2" value="2"
                        :required="A_10==2"
                        :disabled="A_10!=2">
                        <label class="form-check-label" for="A_10_1_v2">
                          (2)沒有
                        </label>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <!-- A_11 -->
        <div class="col-12">
          <h3>十一、請問您覺得學校所學與目前工作學以致用的程度？</h3>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="A_11" id="A_11_v1" value="1" required>
                  <label class="form-check-label" for="A_11_v1">
                    1.很高
                  </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_11" id="A_11_v2" value="2">
                <label class="form-check-label" for="A_11_v2">
                  2.高
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_11" id="A_11_v3" value="3">
                <label class="form-check-label" for="A_11_v3">
                  3.普通
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_11" id="A_11_v4" value="4">
                <label class="form-check-label" for="A_11_v4">
                  4.低
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="A_11" id="A_11_v5" value="5">
                <label class="form-check-label" for="A_11_v5">
                  5.很低
                </label>
              </div>
            </div>
          </div>
        </div>
    </div>
    @include('mixin.section-footer',['current'=>1])
  </form>
</main>
@include('mixin.footer')
<script src="js/page1.js?v={{ $assets_version }}"></script>
<script>
  $(function(){
    var text = ['A_2_1_3', 'A_2_2_1', 'A_2_3_1', 'A_3_5', 'A_3_4', 'A_4_2', 'A_7_1', 'A_8_3', 'A_8_4', 'A_9_2'];
    makeTextRequired(text)
  })
</script>
@endsection
