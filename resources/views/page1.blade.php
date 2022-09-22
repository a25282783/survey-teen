@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  {{-- <div class="info-box">
    <p>敬致 受查者</p>
    <p>為了解勞工生活及工作實況與需求，供為本部規劃勞動政策之衝要依據，特委託智略市場研究股份有限公司辦理「勞工生活及就業狀況調查」，敬請撥冗填答。</p>
    <p class="text-danger">若對於問卷內容有任何疑問，請洽智略市場研究股份有限公司(02)5553-2685分機103宋小姐或本部統計處(02)8995-6866分機2906/2905/2904。</p>
  </div> --}}
  <form id="form" action="{{ route('page2') }}" method="POST" onsubmit="return checkForm('確認前往下一頁嗎？');">
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
        <label for="phone" class="col-md-2 col-form-label"><span class="text-danger">*</span>聯絡電話：</label>
        <div class="col-md-5">
          <input name="phone" type="number" class="form-control" id="phone" required>
        </div>
      </div>
    </div>
    <hr>
    <h2>壹、一般概況</h2>
    <div class="row">
        <div class="col-12">
            <!-- 1-1 -->
            <h3>一、貴單位(公司) 組織型態：</h3>
            <div class="form-group">
              <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A-1" id="1-1-1" value="1" required>
                    <label class="form-check-label" for="1-1-1">
                        (1)民營
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A-1" id="1-1-2" value="2">
                    <label class="form-check-label" for="1-1-2">
                        (2)公營
                    </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="A-1" id="1-1-3" value="3">
                  <label class="form-check-label" for="1-1-3">
                      (3)公務行政機關(含公立學校)
                  </label>
                </div>
              </div>
            </div>
        </div>
        <div class="col-12">
            <!-- 1-2 -->
            <h3>二、貴單位(公司) 雇主(負責人) 性別：</h3>
            <div class="form-group">
              <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A-2" id="1-2-1" value="1" required>
                    <label class="form-check-label" for="1-2-1">
                        (1)男性
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="A-2" id="1-2-2" value="2">
                    <label class="form-check-label" for="1-2-2">
                        (2)女性
                    </label>
                </div>
              </div>
            </div>
        </div>
        <div class="col-12">
            <!-- 1-3 -->
            <h3>三、貴單位(公司)目前員工人數</h3>
            <small>（依<span class="text-danger">111年8月底</span>之狀況填寫；公營單位及公務行政機關(含公立學校)請填<span class="text-danger" style="font-size: large;">勞保投保人數</span>）</small>
            <div class="form-group">
                <label for="A-3-1" class="form-label">目前員工人數 (含外籍員工)：全體</label>
                <input name="A-3-1" type="number" min="4" max="100000" class="input-inline" id="A-3-1" required v-model="A_3_1">人
                <br>
                <span class="text-danger" v-show="A_3_1<4">3人以下事業單位不列入調查範圍</span>
            </div>
            <div class="form-group">
                <label for="A-3-2" class="form-label">目前員工人數 (含外籍員工)：女性</label>
                <input name="A-3-2" type="number" min="0" max="100000" class="input-inline" id="A-3-2" required>人
                <span id="err" class="text-danger d-none">女性員工人數(含外籍員工)不得大於全體員工人數(含外籍員工)</span>
            </div>
        </div>
    </div>
    @include('mixin.section-footer',['current'=>1])
  </form>
</main>
@include('mixin.footer')
<script>
  function checkForm() {
    if( parseInt($('#A-3-2').val()) > parseInt($('#A-3-1').val()) ){
      $('#err').toggleClass("d-none");
      return false;
    }
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
  var app = new Vue({
    el: '#app',
    mounted(){
      renderAnswer(),
      this.A_3_1 = $('input[name="A-3-1"]').val()
    },
    data: {
      A_3_1:'',
      A_3_2:''
    },
  })
</script>
@endsection
