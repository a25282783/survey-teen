@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  {{-- <div class="info-box">
    <p>敬致 受查者</p>
    <p>為了解勞工生活及工作實況與需求，供為本部規劃勞動政策之衝要依據，特委託智略市場研究股份有限公司辦理「勞工生活及就業狀況調查」，敬請撥冗填答。</p>
    <p class="text-danger">若對於問卷內容有任何疑問，請洽智略市場研究股份有限公司(02)5553-2685分機103宋小姐或本部統計處(02)8995-6866分機2906/2905/2904。</p>
  </div> --}}
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
        <label class="col-md-2 col-form-label">公司名稱：</label>
        <div class="col-md-5">
          <input name="company" type="text" class="form-control" value="{{ auth()->user()->depart }}" readonly="readonly">
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label"><span class="text-danger">*</span>填表人：</label>
        <div class="col-md-5">
          <input name="name" type="text" class="form-control" id="name" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="depart" class="col-md-2 col-form-label"><span class="text-danger">*</span>部門：</label>
        <div class="col-md-5">
          <input name="depart" type="text" class="form-control" id="depart" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="job" class="col-md-2 col-form-label"><span class="text-danger">*</span>職稱：</label>
        <div class="col-md-5">
          <input name="job" type="text" class="form-control" id="job" required>
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
          <input name="phone" type="number" class="form-control" id="phone" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="tax" class="col-md-2 col-form-label">傳真電話：</label>
        <div class="col-md-5">
          <input name="tax" type="number" class="form-control" id="tax">
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
                        (1)北部地區(臺北市、新北市、宜蘭縣、桃園市、新竹縣市、基隆市)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A_1" id="A_1_v2" value="2" v-model="A_1" ref="A_1">
                    <label class="form-check-label" for="A_1_v2">
                        (2)中部地區(苗栗縣、臺中市、彰化縣、南投縣、雲林縣)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A_1" id="A_1_v3" value="3" v-model="A_1" ref="A_1">
                    <label class="form-check-label" for="A_1_v3">
                        (3)南部地區(高雄市、嘉義縣市、臺南市、屏東縣、澎湖縣)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A_1" id="A_1_v4" value="4" v-model="A_1" ref="A_1">
                    <label class="form-check-label" for="A_1_v4">
                        (4)東部地區(花蓮縣、臺東縣)
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
                      (1)從政府提供之求職管道
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
                    <input name="A_2_1_3" type="text" class="form-control" placeholder="請說明">
                  </div>
                </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="A_2[]" id="A_2_v2" value="2" :required="A_2.length<1" v-model="A_2" ref="A_2">
                <label class="form-check-label" for="A_2_v2">
                    (2)從私立就業服務機構提供之求職管道
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
                    <input name="A_2_2_1" type="text" class="form-control" placeholder="請說明">
                  </div>
                </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="A_2[]" id="A_2_v3" value="3" :required="A_2.length<1" v-model="A_2" ref="A_2">
                <label class="form-check-label" for="A_2_v3">
                    (3)其他求職管道
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
                    <input name="A_2_3_1" type="text" class="form-control" placeholder="請說明">
                  </div>
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
    var text = ['A_2_1_3', 'A_2_2_1', 'A_2_3_1'];
    makeTextRequired(text)
  })
</script>
@endsection
