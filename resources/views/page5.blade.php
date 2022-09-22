@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container">
  <form id="form" action="{{ route('page6') }}" method="POST" onsubmit="return checkForm()">
    @csrf
      <h2>肆、育嬰留職停薪概況</h2>
      <div class="row" id="app">
          <!-- 4-1 -->
          <div class="col-12">
              <h3>一、請問貴單位(公司)若有員工要申請育嬰留職停薪，會不會依法同意員工申請？</h3>
              <small>(性別工作平等法第16條：受僱者任職滿6個月後，於每一子女滿3歲前，得申請育嬰留職停薪，期間至該子女滿3歲止，但不得逾2年。同法第21條第1項：受僱者為育嬰留職停薪請求時，雇主不得拒絕。另受僱者有少於6個月之需求者，得以不低於30日之期間，向雇主提出申請，並以2次為限，且雇主不得拒絕。)</small>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-1" id="4-1-1" value="1" v-model="q4_1" ref="q4_1" required>
                  <label class="form-check-label" for="4-1-1">
                      1.會
                  </label>
              </div>
              <div class="qa-box">
                  <h4>A.請問貴單位(公司)有沒有符合申請資格的員工？</h4>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-A" id="4-1-A-1" value="1"
                      :disabled="q4_1==2" :required="q4_1==1">
                      <label class="form-check-label" for="4-1-A-1">
                          (1)有
                      </label>
                  </div>
                  <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="D-1-A" id="4-1-A-2" value="2"
                      :disabled="q4_1==2">
                      <label class="form-check-label" for="4-1-A-2">
                          (2)沒有
                      </label>
                  </div>
                  <h4>B.請問貴單位(公司)同意員工每次申請「育嬰留職停薪」的連續期間最長多久？</h4>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-B" id="4-1-B-1" value="1"
                      v-model="q4_1_A" ref="q4_1_A"
                      :disabled="q4_1==2" :required="q4_1==1">
                      <label class="form-check-label" for="4-1-B-1">
                          (1)1個月
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-B" id="4-1-B-2" value="2"
                      v-model="q4_1_A" ref="q4_1_A"
                      :disabled="q4_1==2">
                      <label class="form-check-label" for="4-1-B-2">
                          (2)超過1個月~未滿3個月
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-B" id="4-1-B-3" value="3"
                      v-model="q4_1_A" ref="q4_1_A"
                      :disabled="q4_1==2">
                      <label class="form-check-label" for="4-1-B-3">
                          (3)3個月~未滿6個月
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-B" id="4-1-B-4" value="4"
                      v-model="q4_1_A" ref="q4_1_A"
                      :disabled="q4_1==2">
                      <label class="form-check-label" for="4-1-B-4">
                          (4)6個月~未滿1年
                      </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-1-B" id="4-1-B-5" value="5"
                    v-model="q4_1_A" ref="q4_1_A"
                    :disabled="q4_1==2">
                    <label class="form-check-label" for="4-1-B-5">
                          (5)1年~2年
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-1-B" id="4-1-B-6" value="6"
                    v-model="q4_1_A" ref="q4_1_A"
                    :disabled="q4_1==2">
                    <label class="form-check-label" for="4-1-B-6">
                          (6)其他
                    </label>
                    <input name="D-1-G" type="text" class="form-control" placeholder="請說明" :disabled="q4_1==2">
                </div>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-1" id="4-1-2" value="2" v-model="q4_1" ref="q4_1">
                  <label class="form-check-label" for="4-1-2">
                      2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-C" id="4-1-C-1" value="1"
                      :disabled="q4_1==1" :required="q4_1==2" v-model="q4_1_C" ref="q4_1_C">
                      <label class="form-check-label" for="4-1-C-1">
                          (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                      </label>
                  </div>
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="D-1-D[]" id="4-1-D-1" value="1" :disabled="q4_1==1||q4_1_C!=1"
                          :required="q4_1_C==1&&q4_1_D.length==0"
                          v-model="q4_1_D" ref="q4_1_D">
                          <label class="form-check-label" for="4-1-D-1">
                              ①特休
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="D-1-D[]" id="4-1-D-2" value="2" :disabled="q4_1==1||q4_1_C!=1"
                          :required="q4_1_C==1&&q4_1_D.length==0"
                          v-model="q4_1_D" ref="q4_1_D">
                          <label class="form-check-label" for="4-1-D-2">
                              ②事假
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="D-1-D[]" id="4-1-D-3" value="3" :disabled="q4_1==1||q4_1_C!=1"
                          :required="q4_1_C==1&&q4_1_D.length==0"
                          v-model="q4_1_D" ref="q4_1_D">
                          <label class="form-check-label" for="4-1-D-3">
                              ③其他
                          </label>
                          <input name="D-1-E" type="text" class="form-control" placeholder="請說明" :disabled="q4_1==1">
                  </div>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-C" id="4-1-C-2" value="2"
                      :disabled="q4_1==1" v-model="q4_1_C" ref="q4_1_C">
                      <label class="form-check-label" for="4-1-C-2">
                          (2)員工人數少，無法提供
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-C" id="4-1-C-3" value="3"
                      :disabled="q4_1==1" v-model="q4_1_C" ref="q4_1_C">
                      <label class="form-check-label" for="4-1-C-3">
                          (3)公司為家族企業可自行放假休息
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-C" id="4-1-C-4" value="4"
                      :disabled="q4_1==1" v-model="q4_1_C" ref="q4_1_C">
                      <label class="form-check-label" for="4-1-C-4">
                          (4)業務繁忙，無法提供
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-C" id="4-1-C-5" value="5"
                      :disabled="q4_1==1" v-model="q4_1_C" ref="q4_1_C">
                      <label class="form-check-label" for="4-1-C-5">
                          (5)懷孕婦女自行離職
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-C" id="4-1-C-6" value="6"
                      :disabled="q4_1==1" v-model="q4_1_C" ref="q4_1_C">
                      <label class="form-check-label" for="4-1-C-6">
                          (6)不知道有此規定
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-1-C" id="4-1-C-7" value="7"
                      :disabled="q4_1==1" v-model="q4_1_C" ref="q4_1_C">
                      <label class="form-check-label" for="4-1-C-7">
                          (7)其他
                      </label>
                      <input name="D-1-F" type="text" class="form-control" placeholder="請說明" :disabled="q4_1==1">
                  </div>
              </div>
              <!-- （若勾選「不會」請跳填問項四） -->
              {{-- <p class="mark text-info font-weight-bold">（若勾選「不會」請跳填問項四）</p> --}}
          </div>
          <!-- 4-1 -->
          <!-- 4-2 -->
          <div class="col-12" v-show="q4_1==1">
              <h3>二、申請育嬰留職停薪後之復職員工，請問貴單位(公司)如何安排復職之職位？</h3>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-2" id="4-2-1" value="1" :required="q4_1==1">
                  <label class="form-check-label" for="4-2-1">
                      1.恢復原來的職位
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-2" id="4-2-2" value="2">
                  <label class="form-check-label" for="4-2-2">
                      2.由單位(公司)詢問員工意願後作調整
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-2" id="4-2-3" value="3">
                  <label class="form-check-label" for="4-2-3">
                      3.由單位(公司)人事管理部門決定
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-2" id="4-2-4" value="4">
                  <label class="form-check-label" for="4-2-4">
                      4.由部門主管決定
                  </label>
              </div>
              <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="D-2" id="4-2-5" value="5">
                  <label class="form-check-label" for="4-2-5">
                      5.其他
                  </label>
                  <input name="D-2-A" type="text" class="form-control" placeholder="請說明">
              </div>
          </div>
          <!-- 4-2 -->
          <!-- 4-3 -->
          <div class="col-12" v-show="q4_1==1">
              <h3>三、員工申請「育嬰留職停薪」期間，請問貴單位(公司)人力如何因應？</h3>
              <span class="badge badge-pill badge-warning">可複選，最多複選3項</span>
              <span id="4-3-err" class="text-danger d-none">超過3項</span>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="D-3[]" id="4-3-1" value="1" v-model="q4_3" ref="q4_3" :required="q4_1==1&&q4_3.length==0">
                  <label class="form-check-label" for="4-3-1">
                      1.直接調整同一部門人員
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox"name="D-3[]" id="4-3-2" value="2" v-model="q4_3" ref="q4_3" :required="q4_1==1&&q4_3.length==0">
                  <label class="form-check-label" for="4-3-2">
                      2.調用其他部門人員
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="D-3[]" id="4-3-3" value="3" v-model="q4_3" ref="q4_3" :required="q4_1==1&&q4_3.length==0">
                  <label class="form-check-label" for="4-3-3">
                      3.僱用約僱或臨時人員
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="D-3[]" id="4-3-4" value="4" v-model="q4_3" ref="q4_3" :required="q4_1==1&&q4_3.length==0">
                  <label class="form-check-label" for="4-3-4">
                      4.進用正職之新進人員
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="D-3[]" id="4-3-5" value="5" v-model="q4_3" ref="q4_3" :required="q4_1==1&&q4_3.length==0">
                  <label class="form-check-label" for="4-3-5">
                      5.使用派遣人員
                  </label>
              </div>
              <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" name="D-3[]" id="4-3-6" value="6" v-model="q4_3" ref="q4_3" :required="q4_1==1&&q4_3.length==0">
                  <label class="form-check-label" for="4-3-6">
                      6.其他
                  </label>
                  <input name="D-3-A" type="text" class="form-control" placeholder="請說明">
              </div>
          </div>
          <!-- 4-3 -->
          <!-- 4-4 -->
          <div class="col-12">
              <h3>四、現行規定受僱者任職滿6個月後，於每一子女滿3歲前，得向雇主申請育嬰留職停薪，期間至該子女滿3歲止，但不得逾2年，每次申請期間以不少於6個月為原則。但受僱者有少於6個月之需求者，得以不低於30日之期間，向雇主提出申請，並以2次為限。且雇主不得拒絕。請問貴單位(公司)會不會同意放寬法令，使受僱者可以「日」或「小時」彈性使用？</h3>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-4" id="4-4-1" value="1" v-model="q4_4" ref="q4_4" required>
                  <label class="form-check-label" for="4-4-1">
                      1.會
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="D-4" id="4-4-2" value="2" v-model="q4_4" ref="q4_4">
                  <label class="form-check-label" for="4-4-2">
                      2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-4-A" id="4-4-A-1" value="1"
                      :disabled="q4_4==1" :required="q4_4==2" v-model="q4_4_A" ref="q4_4_A">
                      <label class="form-check-label" for="4-4-A-1">
                          (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                      </label>
                  </div>
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="D-4-B[]" id="4-4-B-1" value="1" :disabled="q4_4==1||q4_4_A!=1" v-model="q4_4_B" ref="q4_4_B" :required="q4_4_A==1&&q4_4_B.length<1">
                          <label class="form-check-label" for="4-4-B-1">
                              ①特休
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="D-4-B[]" id="4-4-B-2" value="2" :disabled="q4_4==1||q4_4_A!=1" v-model="q4_4_B" ref="q4_4_B" :required="q4_4_A==1&&q4_4_B.length<1">
                          <label class="form-check-label" for="4-4-B-2">
                              ②事假
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="D-4-B[]" id="4-4-B-3" value="3" :disabled="q4_4==1||q4_4_A!=1" v-model="q4_4_B" ref="q4_4_B" :required="q4_4_A==1&&q4_4_B.length<1">
                          <label class="form-check-label" for="4-4-B-3">
                              ③其他
                          </label>
                          <input name="D-4-C" type="text" class="form-control" placeholder="請說明" :disabled="q4_4==1">
                      </div>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-4-A" id="4-4-A-2" value="2"
                      :disabled="q4_4==1" v-model="q4_4_A" ref="q4_4_A">
                      <label class="form-check-label" for="4-4-A-2">
                          (2)業務繁忙，無法提供
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-4-A" id="4-4-A-3" value="3"
                      :disabled="q4_4==1" v-model="q4_4_A" ref="q4_4_A">
                      <label class="form-check-label" for="4-4-A-3">
                          (3)單位(公司)人力無法負擔
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-4-A" id="4-4-A-4" value="4"
                      :disabled="q4_4==1" v-model="q4_4_A" ref="q4_4_A">
                      <label class="form-check-label" for="4-4-A-4">
                          (4)期間過短不易尋找替代人力
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-4-A" id="4-4-A-5" value="5"
                      :disabled="q4_4==1" v-model="q4_4_A" ref="q4_4_A">
                      <label class="form-check-label" for="4-4-A-5">
                          (5)公司為家族企業可自行放假休息
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-4-A" id="4-4-A-6" value="6"
                      :disabled="q4_4==1" v-model="q4_4_A" ref="q4_4_A">
                      <label class="form-check-label" for="4-4-A-6">
                          (6)其他
                      </label>
                      <input name="D-4-D" type="text" class="form-control" placeholder="請說明" :disabled="q4_4==1">
                  </div>
              </div>
          </div>
          <!-- 4-4 -->
          <!-- 4-5 -->
          <div class="col-12">
            <h3>五、請問貴單位(公司)認為性別工作平等法第16條規定「於每一子女滿3歲前，得申請育嬰留職停薪」之資格是否可放寬？</h3>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="D-5" id="4-5-1" value="1" v-model="q4_5" ref="q4_5" required>
              <label class="form-check-label" for="4-5-1">
                  1.是，認為可放寬至幾歲？
              </label>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-1" value="1"
                      :required="q4_5==1" :disabled="q4_5==2">
                      <label class="form-check-label" for="D-5-A-1">
                          (1)未滿4歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-2" value="2"
                      :disabled="q4_5==2">
                      <label class="form-check-label" for="D-5-A-2">
                          (2)未滿5歲
                      </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-3" value="3"
                    :disabled="q4_5==2">
                    <label class="form-check-label" for="D-5-A-3">
                        (3)未滿6歲
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-4" value="4"
                    :disabled="q4_5==2">
                    <label class="form-check-label" for="D-5-A-4">
                        (4)未滿7歲
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-5" value="5"
                    :disabled="q4_5==2">
                    <label class="form-check-label" for="D-5-A-5">
                        (5)未滿8歲
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-6" value="6"
                    :disabled="q4_5==2">
                    <label class="form-check-label" for="D-5-A-6">
                        (6)未滿9歲
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-7" value="7"
                    :disabled="q4_5==2">
                    <label class="form-check-label" for="D-5-A-7">
                        (7)未滿12歲
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="D-5-A" id="D-5-A-8" value="8"
                    :disabled="q4_5==2">
                    <label class="form-check-label" for="D-5-A-8">
                        (8)其他
                    </label>
                    <input name="D-5-B" type="text" class="form-control" placeholder="請說明" :disabled="q4_5==2">
                  </div>
              </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="D-5" id="4-5-2" value="2" v-model="q4_5" ref="q4_5">
                <label class="form-check-label" for="4-5-2">
                    2.否
                </label>
            </div>
          </div>
        <!-- 4-5 -->
      </div>
      <!-- 頁碼+按鈕 -->
      @include('mixin.section-footer',['current'=>5])
  </form>
</main>
@include('mixin.footer')
<script src="js/page5.js?v={{ $assets_version }}"></script>
<script>
  $(function(){
    var text = ["D-1-E","D-1-F","D-1-G",
    "D-2-A","D-3-A","D-4-C","D-4-D","D-5-B"
  ];
    makeTextRequired(text)
  })
</script>
@endsection
