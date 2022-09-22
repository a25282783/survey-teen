@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  <form id="form" action="{{ route('page3') }}" method="POST"  onsubmit="return checkForm()">
    @csrf
    <h2>貳、性騷擾防治概況</h2>
    <div class="row">
      <!-- 2-1 -->
      <div class="col-12">
        <h3>一、請問貴單位(公司)有沒有訂定「性騷擾防治措施、申訴及懲戒辦法」？</h3>
        <small><span class="text-danger">(性別工作平等法第13條第1項：受僱員工30人以上者，應訂定性騷擾防治措施、申訴及懲戒辦法，並在工作場所公開揭示。)</span></small>
        <!-- 2-1-1 -->
        <div class="form-check">
          <input type="radio" name="B-1" value="1" id="B-1-1" required class="form-check-input" v-model="q2_1" ref="q2_1">
          <label class="form-check-label" for="B-1-1">
              1.有訂定，請問有沒有在公開場所公開揭示(公告)：
              <span id="2-1-1err" class="text-danger d-none">請選擇</span>
          </label>
        </div>
        <div class="qa-box">
          <div class="form-group">
            <select name="B-1-1" class="form-control" :disabled="q2_1==2" :required="q2_1==1">
              <option value="">請選擇</option>
              <option value="1">(1)有</option>
              <option value="2">(2)沒有</option>
            </select>
          </div>
        </div>
        <!-- 2-1-2 -->
        <div class="form-check">
          <input type="radio" name="B-1" value="2" class="form-check-input" id="B-1-2" v-model="q2_1" ref="q2_1">
          <label class="form-check-label" for="B-1-2">
            2.沒有訂定，請問沒有訂定的主要原因：<span class="badge badge-pill badge-warning">單選</span>
            <span id="2-1-2err" class="text-danger d-none">請選擇</span>
          </label>
        </div>
        <div class="qa-box">
          <div class="form-check">
            <input name="B-1-2" value="1" class="form-check-input" type="radio" id="2-1-2-1" :required="q2_1==2" :disabled="q2_1==1"
            v-model="text1" ref="text1">
            <label class="form-check-label" for="2-1-2-1">
                (1)法律無強制設立(僱用員工未滿30人)
            </label>
          </div>
          <div class="form-check">
            <input name="B-1-2" value="2" class="form-check-input" type="radio" id="2-1-2-2" :disabled="q2_1==1"
            v-model="text1" ref="text1">
            <label class="form-check-label" for="2-1-2-2">
                (2)單位(公司)自行訂定管理辦法
            </label>
          </div>
          <div class="form-check">
            <input name="B-1-2" value="3" class="form-check-input" type="radio" id="2-1-2-3" :disabled="q2_1==1"
            v-model="text1" ref="text1">
            <label class="form-check-label" for="2-1-2-3">
                (3)單位(公司)員工都是同性別(全部女性或男性)
            </label>
          </div>
          <div class="form-check">
            <input name="B-1-2" value="4" class="form-check-input" type="radio" id="2-1-2-4" :disabled="q2_1==1"
            v-model="text1" ref="text1">
            <label class="form-check-label" for="2-1-2-4">
                (4)不知道有此規定
            </label>
          </div>
          <div class="form-check">
            <input name="B-1-2" value="5" class="form-check-input" type="radio" id="2-1-2-5" :disabled="q2_1==1"
            v-model="text1" ref="text1">
            <label class="form-check-label" for="2-1-2-5">
                (5)其他
            </label>
            <input name="B-1-2-6" type="text"  class="form-control" placeholder="請說明" :disabled="q2_1==1||text1!=5">
          </div>
        </div>
      </div>

      <!-- 2-2 -->
      <div class="col-12">
        <h3>二、請問最近一年(110年10月至111年9月)內貴單位(公司)有沒有員工申訴性騷擾事件？</h3>
        <div class="form-check">
          <input type="radio" name="B-2" id="B-2-1" value="1" class="form-check-input" required v-model="q2_2" ref="q2_2">
          <label class="form-check-label" for="B-2-1">
              1.有
          </label>
        </div>
        <div class="qa-box">
          <div>A.申訴<input name="B-2-1" min="1" max="10000" type="number" class="input-inline" :required="q2_2==1" :disabled="q2_2==2" v-model="q2_2_A" ref="q2_2_A">件</div>
          <div>B.請問提出申訴者之性別？</div>
          <div class="form-check">
              <input type="radio" name="B-2-2" id="2-2-1-1" value="1" class="form-check-input" :required="q2_2==1" :disabled="q2_2==2">
              <label class="form-check-label" for="2-2-1-1">
                  (1)僅有男性
              </label>
          </div>
          <div class="form-check">
              <input type="radio" name="B-2-2" id="2-2-1-2" value="2" class="form-check-input" :disabled="q2_2==2">
              <label class="form-check-label" for="2-2-1-2">
                  (2)僅有女性
              </label>
          </div>
          <div class="form-check">
              <input type="radio" name="B-2-2" id="2-2-1-3" value="3" class="form-check-input" :disabled="q2_2==2||q2_2_A==1">
              <label class="form-check-label" for="2-2-1-3">
                  (3)男女性都有
              </label>
          </div>
        </div>
        <div class="form-check">
          <input type="radio" name="B-2" id="2-2-2" value="2" class="form-check-input" v-model="q2_2" ref="q2_2">
          <label class="form-check-label" for="2-2-2">
              2.沒有
          </label>
        </div>
      </div>

      <!-- 2-3 -->
      <div class="col-12">
        <h3>三、請問貴單位(公司)有没有下列<span class="text-danger">性騷擾申訴處理機制或管道</span>？</h3>
        <h4>1.設置處理性騷擾之專線電話、傳真、專用信箱或電子信箱</h4>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="B-3-1" id="2-3-1-1" value="1" required>
                <label class="form-check-label" for="2-3-1-1">
                    (1)有
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="B-3-1" id="2-3-1-2" value="2">
                <label class="form-check-label" for="2-3-1-2">
                    (2)沒有
                </label>
            </div>
          </div>
        </div>
        <h4>2.組成申訴處理委員會</h4>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="B-3-2" id="2-3-2-1" value="1" required>
                  <label class="form-check-label" for="2-3-2-1">
                      (1)有
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="B-3-2" id="2-3-2-2" value="2">
                  <label class="form-check-label" for="2-3-2-2">
                      (2)沒有
                  </label>
              </div>
            </div>
          </div>
          <h4>3.直接向雇主或主管申訴</h4>
          <div class="form-group">
            <div class="qa-box">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="B-3-3" id="2-3-3-1" value="1" required>
                  <label class="form-check-label" for="2-3-3-1">
                      (1)有
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="B-3-3" id="2-3-3-2" value="2">
                  <label class="form-check-label" for="2-3-3-2">
                      (2)沒有
                  </label>
              </div>
            </div>
          </div>
      </div>
    </div>
    @include('mixin.section-footer',['current'=>2])
  </form>
</main>
@include('mixin.footer')
<script src="js/page2.js?v={{ $assets_version }}"></script>
<script>
  var app = new Vue({
    el: '#app',
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
    data: {
      q2_1:'',
      q2_2:'',
      q2_2_A:'',
      text1:'',
      watch_flag:true
    },
  })

  setTimeout(function(){
    app.watch_flag = true
  }, 1500)
</script>
<script>
  $(function(){
    var text = ["B-1-2-6"];
    makeTextRequired(text)
  })
</script>
@endsection
