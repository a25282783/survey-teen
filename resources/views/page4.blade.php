@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  <form id="form" action="{{ route('page5') }}" method="POST" onsubmit="return checkForm()">
      @csrf
      <!-- <h2>參、各項假別及照顧措施</h2> -->
      <div class="row">
          <div class="col-12">
              <!-- 3-9 -->
              <h3>九、請問貴單位(公司)有沒有設置員工「哺(集)乳室」？</h3>
              <small>(性別工作平等法第23條：僱用受僱者100人以上之雇主，應設置哺(集)乳室。)</small>
              <div class="form-check">
                  <input type="radio" name="C-9" id="3-9-1" value="1" class="form-check-input" v-model="q3_9" ref="q3_9"
                    required
                  >
                  <label class="form-check-label" for="3-9-1">
                      1.有，屬於專供員工使用或與民眾共用？
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input type="radio" name="C-9-A" id="3-9-A-1" value="1" class="form-check-input"
                      :required="q3_9==1" :disabled="q3_9==2">
                      <label class="form-check-label" for="3-9-A-1">
                          (1)專供員工使用
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="radio" name="C-9-A" id="3-9-A-2" value="2" class="form-check-input" :disabled="q3_9==2">
                      <label class="form-check-label" for="3-9-A-2">
                          (2)與民眾共用
                      </label>
                  </div>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-9" id="3-9-2" value="2"  class="form-check-input" v-model="q3_9" ref="q3_9">
                  <label class="form-check-label" for="3-9-2">
                      2.沒有，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input type="radio" name="C-9-B" id="3-9-B-1" value="1" class="form-check-input"
                      :required="q3_9==2" :disabled="q3_9==1">
                      <label class="form-check-label" for="3-9-B-1">
                          (1)法律無強制設立(僱用員工未滿100人)
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="radio" name="C-9-B" id="3-9-B-2" value="2" class="form-check-input" :disabled="q3_9==1">
                      <label class="form-check-label" for="3-9-B-2">
                          (2)員工沒有此項需求
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="radio" name="C-9-B" id="3-9-B-3" value="3" class="form-check-input" :disabled="q3_9==1">
                      <label class="form-check-label" for="3-9-B-3">
                          (3)工作空間無法設置
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="radio" name="C-9-B" id="3-9-B-4" value="4" class="form-check-input" :disabled="q3_9==1">
                      <label class="form-check-label" for="3-9-B-4">
                          (4)經費不足
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="radio" name="C-9-B" id="3-9-B-5" value="5" class="form-check-input" :disabled="q3_9==1">
                      <label class="form-check-label" for="3-9-B-5">
                          (5)其他
                      </label>
                      <input name="C-9-C" type="text" class="form-control" placeholder="請說明" :disabled="q3_9==1">
                  </div>
              </div>
          </div>
          <div class="col-12">
              <!-- 3-10 -->
              <h3 style="background-color: transparent;">十、性別工作平等法第19條：受僱於僱用30人以上雇主之受僱者，為撫育未滿3歲子女，得向雇主請求每天減少工作時間1小時或調整工作時間；減少之工作時間，不得請求報酬。同法第21條第1項：受僱者為減少工作時間1小時或調整工作時間請求時，雇主不得拒絕。<b><span class="text-danger">自111年1月18日起，受僱於僱用未滿30人雇主之受僱者，為撫育未滿3歲子女，經與雇主協商，雙方合意後，得依前項規定辦理。</span></b>
              </h3>
              <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">10-1、請問貴單位(公司)若有員工為撫育未滿3歲子女，提出<b>減少工作時間</b>，會不會依法同意員工申請？<b
                      >(如果員工只能以特休或年假、事假、家庭照顧假等假別，申請減少工作時間，則勾選不會同意)</b></h4>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_1" id="3-10_1-1" value="1" v-model="q3_10_1" ref="q3_10_1" required>
                  <label class="form-check-label" for="3-10_1-1">
                      1.會
                  </label>
              </div>
              <div class="qa-box">
                  <h4>A.請問可允許每日減少
                    <input name="C-10_1-A" min="1" max="5" type="number" class="input-inline" :required="q3_10_1==1" :disabled="q3_10_1==2">
                    小時
                  </h4>
                  <h4>B.請問最近一年(110年10月至111年9月)內有沒有員工申請？</h4>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_1-B" id="3-10_1-B-1" value="1"
                      :required="q3_10_1==1" :disabled="q3_10_1==2" v-model="q3_10_1_B" ref="q3_10_1_B">
                      <label class="form-check-label" for="3-10_1-B-1">
                          (1)有，
                          <input name="C-10_1-E" min="1" max="10000" type="number" class="input-inline" :required="q3_10_1_B==1" :disabled="q3_10_1==2||q3_10_1_B!=1" v-model="q3_10_1_E" ref="q3_10_1_E">人申請，請問提出申請者之性別？
                      </label>
                  </div>
                  <div class="qa-box">
                      <div class="form-group">
                          <select name="C-10_1-F" class="form-control" :required="q3_10_1_B==1" :disabled="q3_10_1==2||q3_10_1_B!=1" v-model="q3_10_1_F" ref="q3_10_1_F">
                              <option value="">請選擇</option>
                              <option value="1">①僅有男性</option>
                              <option value="2">②僅有女性</option>
                              <option value="3" v-show="q3_10_1_E>1">③男女性都有</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="C-10_1-B" id="3-10_1-B-2" value="2" :disabled="q3_10_1==2" v-model="q3_10_1_B" ref="q3_10_1_B">
                      <label class="form-check-label" for="3-10_1-B-2">
                          (2)沒有
                      </label>
                  </div>
                  <h4> C.減少工時之工資如何計算？</h4>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_1-C" id="3-10_1-C-1" value="1"
                      :required="q3_10_1==1" :disabled="q3_10_1==2">
                      <label class="form-check-label" for="3-10_1-C-1">
                          (1)給全薪
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_1-C" id="3-10_1-C-2" value="2" :disabled="q3_10_1==2">
                      <label class="form-check-label" for="3-10_1-C-2">
                          (2)部分給薪
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_1-C" id="3-10_1-C-3" value="3" :disabled="q3_10_1==2">
                      <label class="form-check-label" for="3-10_1-C-3">
                          (3)不發工資
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_1-C" id="3-10_1-C-4" value="4" :disabled="q3_10_1==2">
                      <label class="form-check-label" for="3-10_1-C-4">
                          (4)其他
                      </label>
                      <input name="C-10_1-G" type="text" class="form-control" placeholder="請說明" :disabled="q3_10_1==2">
                  </div>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_1" id="3-10_1-2" value="2" v-model="q3_10_1" ref="q3_10_1">
                  <label class="form-check-label" for="3-10_1-2">
                      2.不會，原因為：<span class="badge badge-pill badge-warning">可複選，最多複選2項</span>
                  </label>
                  <span id="3-10_1-D-err" class="text-danger d-none">超過2項</span>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_1-D[]" id="3-10_1-D-1" value="1" :required="q3_10_1==2&&q3_10_1_D.length==0" :disabled="q3_10_1==1" v-model="q3_10_1_D" ref="q3_10_1_D">
                      <label class="form-check-label" for="3-10_1-D-1">
                          (1)法律無強制設立(僱用員工未滿30人)
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_1-D[]" id="3-10_1-D-2" value="2" :required="q3_10_1==2&&q3_10_1_D.length==0" :disabled="q3_10_1==1"  v-model="q3_10_1_D" ref="q3_10_1_D">
                      <label class="form-check-label" for="3-10_1-D-2">
                          (2)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                      </label>
                  </div>
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="C-10_1-H[]" id="3-10_1-H-1" value="1" :disabled="q3_10_1==1||q3_10_1_D!=2" :required="q3_10_1_D.indexOf('2')!=-1&&q3_10_1_H.length<1" v-model="q3_10_1_H" ref="q3_10_1_H">
                          <label class="form-check-label" for="3-10_1-H-1">
                              ①特休
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="C-10_1-H[]" id="3-10_1-H-2" value="2" :disabled="q3_10_1==1||q3_10_1_D!=2" :required="q3_10_1_D.indexOf('2')!=-1&&q3_10_1_H.length<1" v-model="q3_10_1_H" ref="q3_10_1_H">
                          <label class="form-check-label" for="3-10_1-H-2">
                              ②家庭照顧假
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="C-10_1-H[]" id="3-10_1-H-3" value="3" :disabled="q3_10_1==1||q3_10_1_D!=2" :required="q3_10_1_D.indexOf('2')!=-1&&q3_10_1_H.length<1" v-model="q3_10_1_H" ref="q3_10_1_H">
                          <label class="form-check-label" for="3-10_1-H-3">
                              ③事假
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="C-10_1-H[]" id="3-10_1-H-4" value="4" :disabled="q3_10_1==1||q3_10_1_D!=2" :required="q3_10_1_D.indexOf('2')!=-1&&q3_10_1_H.length<1" v-model="q3_10_1_H" ref="q3_10_1_H">
                          <label class="form-check-label" for="3-10_1-H-4">
                              ④其他
                          </label>
                          <input name="C-10_1-I" type="text" class="form-control" placeholder="請說明" :disabled="q3_10_1==1">
                      </div>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_1-D[]" id="3-10_1-D-3" value="3" :required="q3_10_1==2&&q3_10_1_D.length==0" :disabled="q3_10_1==1" v-model="q3_10_1_D" ref="q3_10_1_D">
                      <label class="form-check-label" for="3-10_1-D-3">
                          (3)業務繁忙，無法提供
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_1-D[]" id="3-10_1-D-4" value="4" :required="q3_10_1==2&&q3_10_1_D.length==0" :disabled="q3_10_1==1" v-model="q3_10_1_D" ref="q3_10_1_D">
                      <label class="form-check-label" for="3-10_1-D-4">
                          (4)按日或按時計薪員工可調整工作時間 
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_1-D[]" id="3-10_1-D-5" value="5" :required="q3_10_1==2&&q3_10_1_D.length==0" :disabled="q3_10_1==1" v-model="q3_10_1_D" ref="q3_10_1_D">
                      <label class="form-check-label" for="3-10_1-D-5">
                          (5)公司為家族企業可自行減少工作時間
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_1-D[]" id="3-10_1-D-6" value="6" :required="q3_10_1==2&&q3_10_1_D.length==0" :disabled="q3_10_1==1" v-model="q3_10_1_D" ref="q3_10_1_D">
                      <label class="form-check-label" for="3-10_1-D-6">
                          (6)不知道有此規定
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_1-D[]" id="3-10_1-D-7" value="7" :required="q3_10_1==2&&q3_10_1_D.length==0" :disabled="q3_10_1==1" v-model="q3_10_1_D" ref="q3_10_1_D">
                      <label class="form-check-label" for="3-10_1-D-7">
                          (7)其他
                      </label>
                      <input name="C-10_1-J" type="text" class="form-control" placeholder="請說明" :disabled="q3_10_1==1">
                  </div>
              </div>

              <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">10-2、請問貴單位(公司)若有員工為撫育未滿3歲子女，須<b >調整工作時間</b>(係指在一定的彈性範圍內，調整上、下班時間，如：上班時間8~9點、下班時間17~18點)，貴單位依法如何處理？</h4>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_2" id="3-10_2-1" value="1" v-model="q3_10_2" ref="q3_10_2" required>
                  <label class="form-check-label" for="3-10_2-1">
                      1.公司原本就有彈性上、下班措施，無須提出申請
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_2" id="3-10_2-2" value="2"
                  v-model="q3_10_2" ref="q3_10_2">
                  <label class="form-check-label" for="3-10_2-2">
                      2.會同意員工申請，請問最近一年(110年10月至111年9月)內有沒有員工申請？
                  </label>

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-10_2-E" id="C-10_2-E-1" value="1" :disabled="q3_10_2!=2" :required="q3_10_2==2" v-model="q3_10_2_E" ref="q3_10_2_E">
                    <label class="form-check-label" for="C-10_2-E-1">
                        (1)有，
                        <input name="C-10_2-D" min="1" max="10000" type="number" class="input-inline" :required="q3_10_2_E==1" 
                        :disabled="q3_10_2_E!=1 || q3_10_2!=2" v-model="q3_10_2_D" ref="q3_10_2_D">人申請，請問提出申請者之性別？
                    </label>
                </div>

                <div class="qa-box">
                    <select name="C-10_2-A" class="form-control" :required="q3_10_2_E==1" 
                    :disabled="q3_10_2_E!=1 || q3_10_2!=2"
                    v-model="q3_10_2_A" ref="q3_10_2_A">
                        <option value="">請選擇</option>
                        <option value="1">(1)僅有男性</option>
                        <option value="2">(2)僅有女性</option>
                        <option v-show="q3_10_2_D>1" value="3">(3)男女性都有</option>
                    </select>

{{-- 
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="C-10_2-A" id="3-10_2-A-1" value="1"
                        :required="q3_10_2_E==1" :disabled="q3_10_2_E!=1">
                        <label class="form-check-label" for="3-10_2-A-1">
                            (1)僅有男性
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="C-10_2-A" id="3-10_2-A-2" value="2"
                        :disabled="q3_10_2_E!=1">
                        <label class="form-check-label" for="3-10_2-A-2">
                            (2)僅有女性
                        </label>
                    </div>
                    <div class="form-check" v-show="q3_10_2_D>1">
                        <input class="form-check-input" type="radio" name="C-10_2-A" id="3-10_2-A-3" value="3"
                        :disabled="q3_10_2_E!=1">
                        <label class="form-check-label" for="3-10_2-A-3">
                            (3)男女性都有
                        </label>
                    </div> --}}
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="C-10_2-E" id="C-10_2-E-2" value="2" :disabled="q3_10_2!=2" v-model="q3_10_2_E" ref="q3_10_2_E">
                    <label class="form-check-label" for="C-10_2-E-2">
                        (2)沒有
                    </label>
                </div>

              </div>

              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_2" id="3-10_2-3" value="3"
                  v-model="q3_10_2" ref="q3_10_2">
                  <label class="form-check-label" for="3-10_2-3">
                      3.不會同意員工申請，原因為：<span class="badge badge-pill badge-warning">可複選，最多複選2項</span>
                  </label>
                  <span id="3-10_2-B-err" class="text-danger d-none">超過2項</span>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_2-B[]" id="3-10_2-B-1" value="1" :required="q3_10_2==3&&q3_10_2_B.length==0"  :disabled="q3_10_2!=3" v-model="q3_10_2_B" ref="q3_10_2_B">
                      <label class="form-check-label" for="3-10_2-B-1">
                          (1)法律無強制設立(僱用員工未滿30人)
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_2-B[]" id="3-10_2-B-2" value="2" :required="q3_10_2==3&&q3_10_2_B.length==0"  :disabled="q3_10_2!=3" v-model="q3_10_2_B" ref="q3_10_2_B">
                      <label class="form-check-label" for="3-10_2-B-2">
                          (2)業務屬性，無法提供
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_2-B[]" id="3-10_2-B-3" value="3" :required="q3_10_2==3&&q3_10_2_B.length==0"  :disabled="q3_10_2!=3" v-model="q3_10_2_B" ref="q3_10_2_B">
                      <label class="form-check-label" for="3-10_2-B-3">
                          (3)按日或按時計薪員工可調整工作時間
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_2-B[]" id="3-10_2-B-4" value="4" :required="q3_10_2==3&&q3_10_2_B.length==0"  :disabled="q3_10_2!=3" v-model="q3_10_2_B" ref="q3_10_2_B">
                      <label class="form-check-label" for="3-10_2-B-4">
                          (4)公司為家族企業可自行調整工作時間
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_2-B[]" id="3-10_2-B-5" value="5" :required="q3_10_2==3&&q3_10_2_B.length==0"  :disabled="q3_10_2!=3" v-model="q3_10_2_B" ref="q3_10_2_B" >
                      <label class="form-check-label" for="3-10_2-B-5">
                          (5)不知道有此規定
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-10_2-B[]" id="3-10_2-B-6" value="6" :required="q3_10_2==3&&q3_10_2_B.length==0" :disabled="q3_10_2!=3" v-model="q3_10_2_B" ref="q3_10_2_B">
                      <label class="form-check-label" for="3-10_2-B-6">
                          (6)其他
                      </label>
                      <input name="C-10_2-C" type="text" class="form-control" placeholder="請說明" :disabled="q3_10_2!=3">
                  </div>
              </div>

              <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">10-3、依目前法規員工可申請每天減少1小時之工作時間(無薪資)，請問貴單位(公司)是否曾有員工提出希望減少超過1小時之工作時間？</h4>
              <div class="form-group">
                  <select name="C-10_3" class="form-control" required>
                      <option value="">請選擇</option>
                      <option value="1">1.是</option>
                      <option value="2">2.否</option>
                  </select>
              </div>

              <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">10-4、依目前法規員工可申請每天減少1小時之工作時間(無薪資)，請問貴單位(公司)認為是否可以再提高減少工作時數，以利落實執行？</h4>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_4" id="3-10_4-1" value="1" v-model="q3_10_4" ref="q3_10_4" required>
                  <label class="form-check-label" for="3-10_4-1">
                      1.是，可以放寬給予每天最多減少時數？
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-group">
                      <select name="C-10_4-A" class="form-control"
                      :required="q3_10_4==1" :disabled="q3_10_4==2">
                          <option value="">請選擇</option>
                          <option value="1">(1)2小時</option>
                          <option value="2">(2)3小時</option>
                          <option value="3">(3)4小時</option>
                      </select>
                  </div>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_4" id="3-10_4-2" value="2" v-model="q3_10_4" ref="q3_10_4">
                  <label class="form-check-label" for="3-10_4-2">
                      2.否
                  </label>
              </div>

              <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">10-5、請問貴單位(公司)認為性別工作平等法第19條規定「撫育未滿3歲子女受僱者得請求減少或調整工作時間」之資格是否可放寬？</h4>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_5" id="3-10_5-1" value="1" v-model="q3_10_5" ref="q3_10_5" required>
                  <label class="form-check-label" for="3-10_5-1">
                      1.是，認為可放寬至幾歲？
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-1" value="1"
                      :required="q3_10_5==1" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-1">
                          (1)未滿4歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-2" value="2" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-2">
                          (2)未滿5歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-3" value="3" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-3">
                          (3)未滿6歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-4" value="4" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-4">
                          (4)未滿7歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-5" value="5" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-5">
                          (5)未滿8歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-6" value="6" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-6">
                          (6)未滿9歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-7" value="7" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-7">
                          (7)未滿12歲
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_5-A" id="3-10_5-A-8" value="8" :disabled="q3_10_5==2">
                      <label class="form-check-label" for="3-10_5-A-8">
                          (8)其他
                      </label>
                      <input name="C-10_5-B" type="text" class="form-control" placeholder="請說明" :disabled="q3_10_5==2">
                  </div>
              </div>
              <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="C-10_5" id="3-10_5-2" value="2" v-model="q3_10_5" ref="q3_10_5">
                  <label class="form-check-label" for="3-10_5-2">
                      2.否
                  </label>
              </div>

              {{-- <h4>10-6、現行規定受僱於僱用30人以上雇主之受僱者，為撫育未滿3歲子女，得向雇主申請減少或調整工作時間，雇主不得拒絕。請問貴單位(公司)會不會同意放寬法令使受僱於未滿30人雇主之員工，得申請減少或調整工作時間？
                <span class="badge badge-pill badge-warning">單選</span>
              </h4>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_6" id="3-10_6-1" value="1" v-model="q3_10_6" ref="q3_10_6" required>
                  <label class="form-check-label" for="3-10_6-1">
                      1.是
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-10_6" id="3-10_6-2" value="2" v-model="q3_10_6" ref="q3_10_6">
                  <label class="form-check-label" for="3-10_6-2">
                      2.否，主要原因為：
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_6-A" id="3-10_6-A-1" value="1" :disabled="q3_10_6==1" v-model="q3_10_6_A" ref="q3_10_6_A"
                      :required="q3_10_6==2">
                      <label class="form-check-label" for="3-10_6-A-1">
                          (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                      </label>
                  </div>
                  <div class="qa-box">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-10_6-C[]" id="C-10_6-C-1" value="1" :disabled="q3_10_6==1" :required="q3_10_6_A==1&&q3_10_6_c==0" v-model="q3_10_6_c" ref="q3_10_6_c">
                        <label class="form-check-label" for="C-10_6-C-1">
                            ①特休
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-10_6-C[]" id="C-10_6-C-2" value="2" :disabled="q3_10_6==1" :required="q3_10_6_A==1&&q3_10_6_c==0" v-model="q3_10_6_c" ref="q3_10_6_c">
                        <label class="form-check-label" for="C-10_6-C-2">
                            ②事假
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-10_6-C[]" id="C-10_6-C-3" value="3" :disabled="q3_10_6==1" :required="q3_10_6_A==1&&q3_10_6_c==0" v-model="q3_10_6_c" ref="q3_10_6_c">
                        <label class="form-check-label" for="C-10_6-C-3">
                            ③其他
                        </label>
                        <input name="C-10_6-D" type="text" class="form-control" placeholder="請說明" :disabled="q3_10_6==1">
                    </div>
                </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_6-A" id="3-10_6-A-2" value="2" :disabled="q3_10_6==1" v-model="q3_10_6_A" ref="q3_10_6_A">
                      <label class="form-check-label" for="3-10_6-A-2">
                          (2)單位(公司)人力無法負擔
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_6-A" id="3-10_6-A-3" value="3" :disabled="q3_10_6==1" v-model="q3_10_6_A" ref="q3_10_6_A" >
                      <label class="form-check-label" for="3-10_6-A-3">
                          (3)業務繁忙，無法提供
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_6-A" id="3-10_6-A-4" value="4" :disabled="q3_10_6==1" v-model="q3_10_6_A" ref="q3_10_6_A" >
                      <label class="form-check-label" for="3-10_6-A-4">
                          (4)按日或按時計薪員工可調整工作時間
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_6-A" id="3-10_6-A-5" value="5" :disabled="q3_10_6==1" v-model="q3_10_6_A" ref="q3_10_6_A" >
                      <label class="form-check-label" for="3-10_6-A-5">
                          (5)公司為家族企業可自行減少或調整工作時間
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-10_6-A" id="3-10_6-A-6" value="6" :disabled="q3_10_6==1" v-model="q3_10_6_A" ref="q3_10_6_A" >
                      <label class="form-check-label" for="3-10_6-A-6">
                          (6)其他
                      </label>
                      <input name="C-10_6-B" type="text" class="form-control" placeholder="請說明" :disabled="q3_10_6==1">
                  </div>
              </div> --}}
          </div>
          <!-- 3-11 -->
          <div class="col-12">
              <h3>十一、請問貴單位(公司)若有員工為撫育未滿3歲子女，提出申請遠距工作(如：在家或公司以外場所)，會不會同意員工申請？</h3>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="C-11" id="3-11-1" value="1" v-model="q3_11" ref="q3_11" required>
                <label class="form-check-label" for="3-11-1">
                    1.會，目前公司是否有提供該類型工作？ 
                </label>
                <div class="qa-box">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="C-11-A" id="C-11-A-1" value="1"
                        :required="q3_11==1" :disabled="q3_11==2">
                        <label class="form-check-label" for="C-11-A-1">
                            (1)有
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="C-11-A" id="C-11-A-2" value="2"
                        :disabled="q3_11==2">
                        <label class="form-check-label" for="C-11-A-2">
                            (2)沒有
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-11" id="3-11-2" value="2" v-model="q3_11" ref="q3_11">
                <label class="form-check-label" for="3-11-2">
                    2.不會
                </label>
            </div>
          </div>
          <!-- 3-12 -->
          <div class="col-12">
              <h3>十二、請問貴單位(公司)若有員工申請「家庭照顧假」，會不會依法同意員工申請？</h3>
              <small><b>(員工只要因家庭因素請假，不論請家庭照顧假或事假，此題均歸類為會同意)</b>
                (性別工作平等法第20條：受僱者於其家庭成員預防接種、發生嚴重之疾病或其他重大事故須親自照顧時，得請家庭照顧假，其請假日數併入事假計算，全年以7日為限。同法第21條第1項：受僱者為家庭照顧假請求時，雇主不得拒絕。)</small>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-12" id="3-12-1" value="1" required v-model="q3_12" ref="q3_12">
                  <label class="form-check-label" for="3-12-1">
                      1.會
                  </label>
              </div>
              <div class="qa-box">
                  <h4>A.「家庭照顧假」一年可申請
                    <input name="C-12-A" min="1" max="30" type="number" class="input-inline" :required="q3_12==1" :disabled="q3_12==2">日
                  </h4>
                  <h4>B.請問最近一年(110年10月至111年9月)內有沒有員工申請？</h4>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-12-B" id="3-12-B-1" value="1" :disabled="q3_12==2" :required="q3_12==1" v-model="q3_12_B" ref="q3_12_B">
                      <label class="form-check-label" for="3-12-B-1">
                          (1)有，
                          <input name="C-12-D" min="1" type="number" class="input-inline" :disabled="q3_12==2||q3_12_B!=1" :required="q3_12_B==1" v-model="q3_12_D" ref="q3_12_D">
                          人申請，請問提出申請者之性別？
                      </label>
                  </div>
                  <div class="qa-box">
                        <select name="C-12-E" class="form-control" :disabled="q3_12==2||q3_12_B!=1" :required="q3_12_B==1">
                            <option value="">請選擇</option>
                            <option value="1">(1)僅有男性</option>
                            <option value="2">(2)僅有女性</option>
                            <option v-show="q3_12_D>1" value="3">(3)男女性都有</option>
                        </select>
                      {{-- <div class="form-check">
                          <input class="form-check-input" type="radio" name="C-12-E" id="3-12-E-1" value="1" :disabled="q3_12==2" :required="q3_12_B==1">
                          <label class="form-check-label" for="3-12-E-1">
                              ①僅有男性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="C-12-E" id="3-12-E-2" value="2" :disabled="q3_12==2">
                          <label class="form-check-label" for="3-12-E-2">
                              ②僅有女性
                          </label>
                      </div>
                      <div class="form-check" v-show="q3_12_D>1">
                          <input class="form-check-input" type="radio" name="C-12-E" id="3-12-E-3" value="3" :disabled="q3_12==2">
                          <label class="form-check-label" for="3-12-E-3">
                              ③男女性都有
                          </label>
                      </div> --}}
                  </div>
                  <div class="form-check mb-3">
                      <input class="form-check-input" type="radio" name="C-12-B" id="3-12-B-2" value="2" :disabled="q3_12==2" v-model="q3_12_B" ref="q3_12_B">
                      <label class="form-check-label" for="3-12-B-2">
                          (2)沒有
                      </label>
                  </div>
                  <h4>C.家庭照顧假工資怎麼計算？</h4>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-12-C" id="3-12-C-1" value="1" :disabled="q3_12==2" :required="q3_12==1">
                      <label class="form-check-label" for="3-12-C-1">
                          (1)給全薪
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-12-C" id="3-12-C-2" value="2" :disabled="q3_12==2">
                      <label class="form-check-label" for="3-12-C-2">
                          (2)部分給薪
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-12-C" id="3-12-C-3" value="3" :disabled="q3_12==2">
                      <label class="form-check-label" for="3-12-C-3">
                          (3)依勞工請假規則，不發工資
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-12-C" id="3-12-C-4" value="4" :disabled="q3_12==2">
                      <label class="form-check-label" for="3-12-C-4">
                          (4)其他
                      </label>
                      <input name="C-12-F" type="text" class="form-control" placeholder="請說明" :disabled="q3_12==2">
                  </div>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-12" id="3-12-2" value="2" v-model="q3_12" ref="q3_12">
                  <label class="form-check-label" for="3-12-2">
                      2.不會，原因為：<span class="badge badge-pill badge-warning">可複選，最多複選2項</span>
                  </label>
                  <span id="3-12-G-err" class="text-danger d-none">超過2項</span>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-12-G[]" id="3-12-G-1" value="1" :disabled="q3_12==1" v-model="q3_12_G" ref="q3_12_G" :required="q3_12==2&&q3_12_G.length<1">
                      <label class="form-check-label" for="3-12-G-1">
                          (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                      </label>
                  </div>
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="C-12-H[]" id="3-12-H-1" value="1" :disabled="q3_12==1||q3_12_G.indexOf(1)<0" v-model="q3_12_H" ref="q3_12_H" :required="q3_12==2&&q3_12_H.length<1&&q3_12_G.indexOf('1')!=-1">
                          <label class="form-check-label" for="3-12-H-1">
                              ①特休
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="C-12-H[]" id="3-12-H-2" value="2" :disabled="q3_12==1||q3_12_G.indexOf(1)<0" v-model="q3_12_H" ref="q3_12_H"  :required="q3_12==2&&q3_12_H.length<1&&q3_12_G.indexOf('1')!=-1">
                          <label class="form-check-label" for="3-12-H-2">
                              ②其他
                          </label>
                          <input name="C-12-I" type="text" class="form-control" placeholder="請說明" :disabled="q3_12==1||q3_12_H!=2">
                      </div>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-12-G[]" id="3-12-G-2" value="2" :disabled="q3_12==1" v-model="q3_12_G" ref="q3_12_G" :required="q3_12==2&&q3_12_G.length<1">
                      <label class="form-check-label" for="3-12-G-2">
                          (2)業務繁忙，無法提供
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-12-G[]" id="3-12-G-3" value="3" :disabled="q3_12==1" v-model="q3_12_G" ref="q3_12_G" :required="q3_12==2&&q3_12_G.length<1">
                      <label class="form-check-label" for="3-12-G-3">
                          (3)按日或按時計薪員工可調整工作時間
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-12-G[]" id="3-12-G-4" value="4" :disabled="q3_12==1" v-model="q3_12_G" ref="q3_12_G" :required="q3_12==2&&q3_12_G.length<1">
                      <label class="form-check-label" for="3-12-G-4">
                          (4)公司為家族企業可自行放假
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-12-G[]" id="3-12-G-5" value="5" :disabled="q3_12==1" v-model="q3_12_G" ref="q3_12_G" :required="q3_12==2&&q3_12_G.length<1">
                      <label class="form-check-label" for="3-12-G-5">
                          (5)不知道有此規定
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="C-12-G[]" id="3-12-G-6" value="6" :disabled="q3_12==1" v-model="q3_12_G" ref="q3_12_G" :required="q3_12==2&&q3_12_G.length<1">
                      <label class="form-check-label" for="3-12-G-6">
                          (6)其他
                      </label>
                      <input name="C-12-J" type="text" class="form-control" placeholder="請說明" :disabled="q3_12==1">
                  </div>
              </div>
          </div>
          <!-- 3-12 -->
          <!-- 3-13 -->
          <div class="col-12">
            <h3>十三、請問貴單位(公司)是否同意法令增加「受僱者為照顧家庭成員(如父母、配偶、傷病子女等)，可申請『長期照顧安排假』(<b><span class="text-danger">無薪資及津貼補助</span></b>)」?</h3>
            <small><b>
                <span class="text-danger">說明:「長期」定義至少30天，若公司可申請期間未滿30天，請勾選不同意。</span>
            </b></small>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-13" id="3-13-1" value="1" v-model="q3_13" ref="q3_13" required>
                <label class="form-check-label" for="3-13-1">
                    1.同意，期間最長可以請多久？
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-A" id="3-13-A-1" value="1"
                    :disabled="q3_13==2" :required="q3_13==1">
                    <label class="form-check-label" for="3-13-A-1">
                        (1)30天
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-A" id="3-13-A-2" value="2"
                    :disabled="q3_13==2">
                    <label class="form-check-label" for="3-13-A-2">
                        (2)超過30天~3個月
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-A" id="3-13-A-3" value="3"
                    :disabled="q3_13==2">
                    <label class="form-check-label" for="3-13-A-3">
                        (3)超過3個月~6個月
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-A" id="3-13-A-4" value="4"
                    :disabled="q3_13==2">
                    <label class="form-check-label" for="3-13-A-4">
                        (4)其他
                    </label>
                    <input name="C-13-B" type="text" class="form-control" placeholder="請說明" :disabled="q3_13==2">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-13" id="3-13-2" value="2" v-model="q3_13" ref="q3_13">
                <label class="form-check-label" for="3-13-2">
                    2.不同意，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-C" id="3-13-C-1" value="1" :disabled="q3_13==1" :required="q3_13==2" v-model="q3_13_C" ref="q3_13_C">
                    <label class="form-check-label" for="3-13-C-1">
                        (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                    </label>
                </div>
                <div class="qa-box">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-13-D[]" id="3-13-D-1" value="1" :disabled="q3_13==1||q3_13_C!=1"
                        :required="q3_13_C==1&&q3_13_D.length==0"
                        v-model="q3_13_D" ref="q3_13_D">
                        <label class="form-check-label" for="3-13-D-1">
                            ①特休
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-13-D[]" id="3-13-D-2" value="2" :disabled="q3_13==1||q3_13_C!=1"
                        :required="q3_13_C==1&&q3_13_D.length==0"
                        v-model="q3_13_D" ref="q3_13_D">
                        <label class="form-check-label" for="3-13-D-2">
                            ②事假
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-13-D[]" id="3-13-D-3" value="3" :disabled="q3_13==1||q3_13_C!=1"
                        :required="q3_13_C==1&&q3_13_D.length==0"
                        v-model="q3_13_D" ref="q3_13_D">
                        <label class="form-check-label" for="3-13-D-3">
                            ③其他
                        </label>
                        <input name="C-13-E" type="text" class="form-control" placeholder="請說明" :disabled="q3_13==1">
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-C" id="3-13-C-2" value="2" :disabled="q3_13==1" v-model="q3_13_C" ref="q3_13_C">
                    <label class="form-check-label" for="3-13-C-2">
                        (2)單位(公司)人力無法負擔此項假別
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-C" id="3-13-C-3" value="3" :disabled="q3_13==1" v-model="q3_13_C" ref="q3_13_C">
                    <label class="form-check-label" for="3-13-C-3">
                        (3)長期照顧服務應由政府統一規劃辦理
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-C" id="3-13-C-4" value="4" :disabled="q3_13==1" v-model="q3_13_C" ref="q3_13_C">
                    <label class="form-check-label" for="3-13-C-4">
                        (4)按日或按時計薪員工可調整工作時間
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-C" id="3-13-C-5" value="5" :disabled="q3_13==1" v-model="q3_13_C" ref="q3_13_C">
                    <label class="form-check-label" for="3-13-C-5">
                        (5)公司為家族企業可自行放假
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-C" id="3-13-C-6" value="6" :disabled="q3_13==1" v-model="q3_13_C" ref="q3_13_C">
                    <label class="form-check-label" for="3-13-C-6">
                        (6)業務繁忙，無法提供
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-13-C" id="3-13-C-7" value="7" :disabled="q3_13==1" v-model="q3_13_C" ref="q3_13_C">
                    <label class="form-check-label" for="3-13-C-7">
                        (7)其他
                    </label>
                    <input name="C-13-F" type="text" class="form-control" placeholder="請說明" :disabled="q3_13==1">
                </div>
            </div>
          </div>
          <!-- 3-13 -->
          <!-- 3-14 -->
          <div class="col-12">
            <h3>十四、未來法令如增加受僱者為照顧家庭成員(如父母、配偶、傷病子女)可申請「長期照顧安排假」
                <b>(無薪資及津貼補助)</b>，請問貴單位(公司)認為是否需限制適用幾人以上員工之公司才能申請？</h3>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-14" id="3-14-1" value="1" v-model="q3_14" ref="q3_14" required>
                  <label class="form-check-label" for="3-14-1">
                      1.不需要
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="C-14" id="3-14-2" value="2" v-model="q3_14" ref="q3_14">
                  <label class="form-check-label" for="3-14-2">
                      2.需要，公司員工人數：
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-14-A" id="3-14-A-1" value="1" :disabled="q3_14==1" :required="q3_14==2">
                      <label class="form-check-label" for="3-14-A-1">
                          (1) 30人以上
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-14-A" id="3-14-A-2" value="2" :disabled="q3_14==1">
                      <label class="form-check-label" for="3-14-A-2">
                          (2) 100人以上
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-14-A" id="3-14-A-3" value="3" :disabled="q3_14==1">
                      <label class="form-check-label" for="3-14-A-3">
                          (3) 150人以上
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-14-A" id="3-14-A-4" value="4" :disabled="q3_14==1">
                      <label class="form-check-label" for="3-14-A-4">
                          (4) 200人以上
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-14-A" id="3-14-A-5" value="5" :disabled="q3_14==1">
                      <label class="form-check-label" for="3-14-A-5">
                          (5) 250人以上
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="C-14-A" id="3-14-A-6" value="6" :disabled="q3_14==1">
                      <label class="form-check-label" for="3-14-A-6">
                          (6)其他
                      </label>
                      <input name="C-14-B" type="text" class="form-control" placeholder="請說明" :disabled="q3_14==1">
                  </div>
              </div>
          </div>
           <!-- 3-14 -->
           <!-- 3-15 -->
          <div class="col-12">
            <h3>十五、未來法令如增加受僱者為照顧家庭成員(如父母、配偶、傷病子女)可申請「長期照顧安排假」<b
                >(無薪資及津貼補助)</b>，請問貴單位(公司)認為是否需限制家庭成員對象？</h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-15" id="3-15-1" value="1" v-model="q3_15" ref="q3_15" required>
                <label class="form-check-label" for="3-15-1">
                    1.不需要
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-15" id="3-15-2" value="2" v-model="q3_15" ref="q3_15">
                <label class="form-check-label" for="3-15-2">
                    2.需要，限制對象為<span class="badge badge-pill badge-warning">可複選</span>：
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-15-A[]" id="3-15-A-1" value="1" :disabled="q3_15==1" v-model="q3_15_A" ref="q3_15_A">
                    <label class="form-check-label" for="3-15-A-1">
                        (1)傷病子女
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-15-A[]" id="3-15-A-2" value="2" :disabled="q3_15==1" v-model="q3_15_A" ref="q3_15_A">
                    <label class="form-check-label" for="3-15-A-2">
                        (2)父母
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input"  type="checkbox" name="C-15-A[]" id="3-15-A-3" value="3" :disabled="q3_15==1" v-model="q3_15_A" ref="q3_15_A">
                    <label class="form-check-label" for="3-15-A-3">
                        (3)配偶
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-15-A[]" id="3-15-A-4" value="4" :disabled="q3_15==1" v-model="q3_15_A" ref="q3_15_A">
                    <label class="form-check-label" for="3-15-A-4">
                        (4)配偶之父母
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-15-A[]" id="3-15-A-5" value="5" :disabled="q3_15==1" v-model="q3_15_A" ref="q3_15_A">
                    <label class="form-check-label" for="3-15-A-5">
                        (5)祖父母
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-15-A[]" id="3-15-A-6" value="6" :disabled="q3_15==1" v-model="q3_15_A" ref="q3_15_A">
                    <label class="form-check-label" for="3-15-A-6">
                        (6)兄弟姊妹
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-15-A[]" id="3-15-A-7" value="7" :disabled="q3_15==1" v-model="q3_15_A" ref="q3_15_A">
                    <label class="form-check-label" for="3-15-A-7">
                        (7)其他家人
                    </label>
                    <input name="C-15-B" type="text" class="form-control" placeholder="請說明" :disabled="q3_15==1">
                </div>
            </div>
          </div>
          <!-- 3-15 -->
          <!-- 3-16 -->
          <div class="col-12">
            <h3>十六、請問貴單位(公司)若有員工因新型冠狀病毒肺炎疫情影響，有照顧家人需求，會不會同意員工申請<b >「防疫照顧假」</b></h3>
            <small><b>(因新型冠狀病毒肺炎疫情影響，受僱者若有照顧子女、身心障礙及失能等家人之需求，得依規定請「防疫照顧假」)</b></small>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-16" id="3-16-1" value="1" v-model="q3_16" ref="q3_16" required>
                <label class="form-check-label" for="3-16-1">
                    1.會
                </label>
            </div>
            <div class="qa-box">
                <h4>A. 請問110年10月至111年9月有沒有員工申請？
                </h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-16-I" id="C-16-I-1" value="1" :disabled="q3_16!=1" :required="q3_16==1" v-model="q3_16_I" ref="q3_16_I">
                    <label class="form-check-label" for="C-16-I-1">
                        (1)有，
                        <input name="C-16-H" min="1" max="10000" type="number" class="input-inline" :required="q3_16_I==1" :disabled="q3_16_I!=1" v-model="q3_16_H" ref="q3_16_H">人申請，請問提出申請者之性別？
                    </label>
                </div>

                <div class="qa-box">
                    <select name="C-16-A" class="form-control" :disabled="q3_16_I!=1" :required="q3_16_I==1" 
                    v-model="q3_16_A" ref="q3_16_A">
                        <option value="">請選擇</option>
                        <option value="1">(1)僅有男性</option>
                        <option value="2">(2)僅有女性</option>
                        <option v-show="q3_16_H>1" value="3">(3)男女性都有</option>
                    </select>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="C-16-I" id="C-16-I-2" value="2" :disabled="q3_16!=1" v-model="q3_16_I" ref="q3_16_I">
                    <label class="form-check-label" for="C-16-I-2">
                        (2)沒有
                    </label>
                </div>
                {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-16-A" id="3-16-A-1" value="1" :disabled="q3_16==2" :required="q3_16==1">
                    <label class="form-check-label" for="3-16-A-1">
                        (1)僅有男性
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-16-A" id="3-16-A-2" value="2" :disabled="q3_16==2">
                    <label class="form-check-label" for="3-16-A-2">
                        (2)僅有女性
                    </label>
                </div>
                <div class="form-check" v-show="q3_16_H>1">
                    <input class="form-check-input" type="radio" name="C-16-A" id="3-16-A-3" value="3" :disabled="q3_16==2">
                    <label class="form-check-label" for="3-16-A-3">
                        (3)男女性都有
                    </label>
                </div> --}}
                <h4>B. 防疫照顧假工資如何計算?</h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-16-B" id="3-16-B-1" value="1" :disabled="q3_16==2" :required="q3_16==1">
                    <label class="form-check-label" for="3-16-B-1">
                        (1)給全薪
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-16-B" id="3-16-B-2" value="2" :disabled="q3_16==2">
                    <label class="form-check-label" for="3-16-B-2">
                        (2)部分薪水
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-16-B" id="3-16-B-3" value="3" :disabled="q3_16==2">
                    <label class="form-check-label" for="3-16-B-3">
                        (3)不發工資
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-16-B" id="3-16-B-4" value="4" :disabled="q3_16==2">
                    <label class="form-check-label" for="3-16-B-4">
                        (4)其他
                    </label>
                    <input name="C-16-C" type="text" class="form-control" placeholder="請說明" :disabled="q3_16==2">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-16" id="3-16-2" value="2" v-model="q3_16" ref="q3_16">
                <label class="form-check-label" for="3-16-2">
                    2.不會，原因為：<span class="badge badge-pill badge-warning">可複選，最多複選2項</span>
                </label>
                <span id="3-16-D-err" class="text-danger d-none">超過2項</span>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input"
                    type="checkbox" name="C-16-D[]" id="3-16-D-1" value="1" :disabled="q3_16==1" v-model="q3_16_D" ref="q3_16_D" :required="q3_16==2&&q3_16_D.length<1">
                    <label class="form-check-label" for="3-16-D-1">
                        (1)員工可用其他假別替代，是哪些假別?<span class="badge badge-pill badge-warning">可複選</span>
                    </label>
                </div>
                <div class="qa-box">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-16-E[]" id="3-16-E-1" value="1" :disabled="q3_16==1||q3_16_D.indexOf(1)<0" v-model="q3_16_E" ref="q3_16_E" :required="q3_16==2&&q3_16_E.length<1&&q3_16_D.indexOf('1')!=-1">
                        <label class="form-check-label" for="3-16-E-1">
                            ①特休
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-16-E[]" id="3-16-E-2" value="2" :disabled="q3_16==1||q3_16_D.indexOf(1)<0" v-model="q3_16_E" ref="q3_16_E" :required="q3_16==2&&q3_16_E.length<1&&q3_16_D.indexOf('1')!=-1">
                        <label class="form-check-label" for="3-16-E-2">
                            ②家庭照顧假
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-16-E[]" id="3-16-E-3" value="3" :disabled="q3_16==1||q3_16_D.indexOf(1)<0" v-model="q3_16_E" ref="q3_16_E" :required="q3_16==2&&q3_16_E.length<1&&q3_16_D.indexOf('1')!=-1">
                        <label class="form-check-label" for="3-16-E-3">
                            ③事假
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="C-16-E[]" id="3-16-E-4" value="4" :disabled="q3_16==1||q3_16_D.indexOf(1)<0" v-model="q3_16_E" ref="q3_16_E" :required="q3_16==2&&q3_16_E.length<1&&q3_16_D.indexOf('1')!=-1">
                        <label class="form-check-label" for="3-16-E-4">
                            ④其他
                        </label>
                        <input name="C-16-F" type="text" class="form-control" placeholder="請說明" :disabled="q3_16==1">
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-16-D[]" id="3-16-D-2" value="2" :disabled="q3_16==1" v-model="q3_16_D" ref="q3_16_D" :required="q3_16==2&&q3_16_D.length<1">
                    <label class="form-check-label" for="3-16-D-2">
                        (2)業務繁忙，無法提供
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-16-D[]" id="3-16-D-3" value="3" :disabled="q3_16==1" v-model="q3_16_D" ref="q3_16_D" :required="q3_16==2&&q3_16_D.length<1">
                    <label class="form-check-label" for="3-16-D-3">
                        (3)按日或按時計薪員工可調整工作時間
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-16-D[]" id="3-16-D-4" value="4" :disabled="q3_16==1" v-model="q3_16_D" ref="q3_16_D" :required="q3_16==2&&q3_16_D.length<1">
                    <label class="form-check-label" for="3-16-D-4">
                        (4)公司為 家族企業可自行減少工作時間
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-16-D[]" id="3-16-D-5" value="5" :disabled="q3_16==1" v-model="q3_16_D" ref="q3_16_D" :required="q3_16==2&&q3_16_D.length<1">
                    <label class="form-check-label" for="3-16-D-5">
                        (5)讓員工採行居家辦公
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-16-D[]" id="3-16-D-6" value="6" :disabled="q3_16==1" v-model="q3_16_D" ref="q3_16_D" :required="q3_16==2&&q3_16_D.length<1">
                    <label class="form-check-label" for="3-16-D-6">
                        (6)不知道有此規定
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-16-D[]" id="3-16-D-7" value="7" :disabled="q3_16==1" v-model="q3_16_D" ref="q3_16_D" :required="q3_16==2&&q3_16_D.length<1">
                    <label class="form-check-label" for="3-16-D-7">
                        (7)其他
                    </label>
                    <input name="C-16-G" type="text" class="form-control" placeholder="請說明" :disabled="q3_16==1" >
                </div>
            </div>
          </div>
          <!-- 3-16 -->
          <!-- 3-17 -->
          <div class="col-12">
            <h3>十七、請問貴單位(公司)有沒有為員工子女設立托兒服務機構(如托嬰中心、幼兒園、職場互助教保服務中心、社區公共托育家園、兒童課後照顧服務中心)？</h3>
            <small><b>(性別工作平等法第23條：僱用受僱者100人以上之雇主，應設置托兒設施或提供適當之托兒措施。)</b></small>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-17" id="3-17-1" value="1" v-model="q3_17" ref="q3_17" required>
                <label class="form-check-label" for="3-17-1">
                    1.單位(公司)本身即為托兒服務機構
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-17" id="3-17-2" value="2" v-model="q3_17" ref="q3_17">
                <label class="form-check-label" for="3-17-2">
                    2.有，收托費用方式為：<span class="badge badge-pill badge-warning">單選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-A" id="3-17-A-1" value="1"
                    :disabled="q3_17!=2" :required="q3_17==2">
                    <label class="form-check-label" for="3-17-A-1">
                        (1)由單位(公司)全額補助收托費用
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-A" id="3-17-A-2" value="2"
                    :disabled="q3_17!=2">
                    <label class="form-check-label" for="3-17-A-2">
                        (2)由單位(公司)補助部分收托費用，其他由員工負擔
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-A" id="3-17-A-3" value="3"
                    :disabled="q3_17!=2">
                    <label class="form-check-label" for="3-17-A-3">
                        (3)由員工全額負擔收托費用
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-A" id="3-17-A-4" value="4"
                    :disabled="q3_17!=2">
                    <label class="form-check-label" for="3-17-A-4">
                        (4)其他
                    </label>
                    <input name="C-17-B" type="text" class="form-control" placeholder="請說明" :disabled="q3_17!=2">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-17" id="3-17-3" value="3" v-model="q3_17" ref="q3_17">
                <label class="form-check-label" for="3-17-3">
                    3.沒有，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-1" value="1"
                    :disabled="q3_17!=3" :required="q3_17==3">
                    <label class="form-check-label" for="3-17-C-1">
                        (1)法律無強制設立(僱用員工未滿100人)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-2" value="2"
                    :disabled="q3_17!=3">
                    <label class="form-check-label" for="3-17-C-2">
                        (2)沒有空間設立
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-3" value="3"
                    :disabled="q3_17!=3">
                    <label class="form-check-label" for="3-17-C-3">
                        (3)沒有經費預算
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-4" value="4"
                    :disabled="q3_17!=3">
                    <label class="form-check-label" for="3-17-C-4">
                        (4)員工分散各地
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-5" value="5"
                    :disabled="q3_17!=3">
                    <label class="form-check-label" for="3-17-C-5">
                        (5)員工送托住家附近托兒服務機構或保母
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-6" value="6"
                    :disabled="q3_17!=3">
                    <label class="form-check-label" for="3-17-C-6">
                        (6)員工將子女交給家人照顧
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-7" value="7"
                    :disabled="q3_17!=3">
                    <label class="form-check-label" for="3-17-C-7">
                        (7)員工無幼小子女
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-17-C" id="3-17-C-8" value="8"
                    :disabled="q3_17!=3">
                    <label class="form-check-label" for="3-17-C-8">
                        (8)其他
                    </label>
                    <input name="C-17-D" type="text" class="form-control" placeholder="請說明" :disabled="q3_17!=3">
                </div>
            </div>
            <!-- (十七題回答有者，請跳填問項十九) -->
              {{-- <p class="mark text-info font-weight-bold">(十七題回答有者，請跳填問項十九)</p> --}}
          </div>
          <!-- 3-17 -->
          <!-- 3-18 -->
          <div class="col-12" v-show="q3_17!=2">
              <h3>十八、請問貴單位(公司)有沒有提供員工托兒措施？</h3>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="C-18" id="3-18-1" value="1" v-model="q3_18" ref="q3_18" :required="q3_16!=2&&q3_17!=2">
                <label class="form-check-label" for="3-18-1">
                    1.有，其方式為：<span class="badge badge-pill badge-warning">可複選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input"
                    type="checkbox" name="C-18-A[]" id="3-18-A-1" value="1" :disabled="q3_18==2" :required="q3_18==1&&q3_18_A.length<1" v-model="q3_18_A" ref="q3_18_A">
                    <label class="form-check-label" for="3-18-A-1">
                        (1)與托兒服務機構簽約
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-18-A[]" id="3-18-A-2" value="2" :disabled="q3_18==2" :required="q3_18==1&&q3_18_A.length<1" v-model="q3_18_A" ref="q3_18_A">
                    <label class="form-check-label" for="3-18-A-2">
                        (2)單位(公司)提供托兒津貼
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-18-A[]" id="3-18-A-3" value="3" :disabled="q3_18==2" :required="q3_18==1&&q3_18_A.length<1" v-model="q3_18_A" ref="q3_18_A">
                    <label class="form-check-label" for="3-18-A-3">
                        (3)雇主聘僱或委託托育人員至雇主設置之指定地點提供托兒服務(雇主設置居家式托育服務)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="C-18-A[]" id="3-18-A-4" value="4" :disabled="q3_18==2" :required="q3_18==1&&q3_18_A.length<1" v-model="q3_18_A" ref="q3_18_A">
                    <label class="form-check-label" for="3-18-A-4">
                        (4)其他
                    </label>
                    <input name="C-18-B" type="text" class="form-control" placeholder="請說明" :disabled="q3_18==2">
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-18" id="3-18-2" value="2" v-model="q3_18" ref="q3_18" :required="q3_17!=2">
                <label class="form-check-label" for="3-18-2">
                    2.沒有，(續答A、B)
                </label>
            </div>
            <div class="qa-box">
                <h4>A.主要原因為：<span class="badge badge-pill badge-warning">單選</span></h4>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-1" value="1" :disabled="q3_18==1" :required="q3_18==2&&q3_17!=2">
                    <label class="form-check-label" for="3-18-C-1">
                        (1)法律無強制設立(僱用員工未滿100人)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-2" value="2" :disabled="q3_18==1">
                    <label class="form-check-label" for="3-18-C-2">
                        (2)員工送托住家附近托兒服務機構或保母
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-3" value="3" :disabled="q3_18==1">
                    <label class="form-check-label" for="3-18-C-3">
                        (3)員工分散各地
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-4" value="4" :disabled="q3_18==1">
                    <label class="form-check-label" for="3-18-C-4">
                        (4)員工將子女交給家人照顧
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-5" value="5" :disabled="q3_18==1">
                    <label class="form-check-label" for="3-18-C-5">
                        (5)沒有經費預算
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-6" value="6" :disabled="q3_18==1">
                    <label class="form-check-label" for="3-18-C-6">
                        (6)員工無幼小子女
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-7" value="7" :disabled="q3_18==1">
                    <label class="form-check-label" for="3-18-C-7">
                        (7)沒有空間辦理居家式托育服務
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="C-18-C" id="3-18-C-8" value="8" :disabled="q3_18==1">
                    <label class="form-check-label" for="3-18-C-8">
                        (8)其他
                    </label>
                    <input name="C-18-D" type="text" class="form-control" placeholder="請說明" :disabled="q3_18==1">
                </div>
                <h4>B.請問近5年貴單位(公司)是否曾與托兒服務機構簽約？</h4>
                <div class="form-group">
                    <select name="C-18-E" class="form-control" :disabled="q3_18==1" :required="q3_18==2&&q3_17!=2">
                        <option value="">請選擇</option>
                        <option value="1">(1)有</option>
                        <option value="2">(2)沒有</option>
                    </select>
                </div>
            </div>
        </div>
          <!-- 3-18 -->
          <!-- 3-19 -->
          <div class="col-12">
            <h3>十九、請問貴單位(公司)有無僱用外籍員工<b><span class="text-danger">(不包含新住民)</span></b>?</h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-19" id="3-19-1" value="1" v-model="q3_19" ref="q3_19" required>
                <label class="form-check-label" for="3-19-1">
                    1.有，請問所僱用外籍員工有無使用貴單位(公司)為員工子女設立之托兒服務機構或提供之員工托兒措施？<span class="badge badge-pill badge-warning">(單選)</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-19-A" id="3-19-A-1" value="1"
                    v-model="q3_19_A" ref="q3_19_A"
                    :disabled="q3_19!=1" :required="q3_19==1">
                    <label class="form-check-label" for="3-19-A-1">
                        (1)有外籍員工使用，使用何項?<span class="badge badge-pill badge-warning"> (可複選)</span>
                    </label>
                </div>
                <div class="qa-box">
                    <div class="form-check">
                        <input class="form-check-input"
                        type="checkbox" name="C-19-B[]" id="C-19-B-1" value="1" :disabled="q3_19_A!=1" :required="q3_19_A==1&&q3_19_B.length<1" v-model="q3_19_B" ref="q3_19_B">
                        <label class="form-check-label" for="C-19-B-1">
                            (1)托兒服務機構
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"
                        type="checkbox" name="C-19-B[]" id="C-19-B-2" value="2" :disabled="q3_19_A!=1" :required="q3_19_A==1&&q3_19_B.length<1" v-model="q3_19_B" ref="q3_19_B">
                        <label class="form-check-label" for="C-19-B-2">
                            (2)托兒措施
                        </label>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-19-A" id="3-19-A-2" value="2"
                    v-model="q3_19_A" ref="q3_19_A"
                    :disabled="q3_19!=1">
                    <label class="form-check-label" for="3-19-A-2">
                        (2)沒有外籍員工使用，請選最多者主要原因：<span class="badge badge-pill badge-warning">(最多選2項)</span>
                    </label>
                    <span id="3-19-C-err" class="text-danger d-none">超過2項</span>
                </div>
                <div class="qa-box">
                    <div class="form-check">
                        <input class="form-check-input"
                        type="checkbox" name="C-19-C[]" id="C-19-C-1" value="1" :disabled="q3_19_A!=2" :required="q3_19_A==2&&q3_19_C.length<1" v-model="q3_19_C" ref="q3_19_C">
                        <label class="form-check-label" for="C-19-C-1">
                            ①外籍員工無幼小子女
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"
                        type="checkbox" name="C-19-C[]" id="C-19-C-2" value="2" :disabled="q3_19_A!=2" :required="q3_19_A==2&&q3_19_C.length<1" v-model="q3_19_C" ref="q3_19_C">
                        <label class="form-check-label" for="C-19-C-2">
                            ②外籍員工將子女交給母國親友照顧
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"
                        type="checkbox" name="C-19-C[]" id="C-19-C-3" value="3" :disabled="q3_19_A!=2" :required="q3_19_A==2&&q3_19_C.length<1" v-model="q3_19_C" ref="q3_19_C">
                        <label class="form-check-label" for="C-19-C-3">
                            ③外籍員工將子女交給在臺親友或移工關懷單位照顧
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input"
                        type="checkbox" name="C-19-C[]" id="C-19-C-4" value="4" :disabled="q3_19_A!=2" :required="q3_19_A==2&&q3_19_C.length<1" v-model="q3_19_C" ref="q3_19_C">
                        <label class="form-check-label" for="C-19-C-4">
                            ④外籍員工將子女送托住家附近托兒服務機構或保母
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" 
                        type="checkbox" name="C-19-C[]" id="C-19-C-5" value="5" :disabled="q3_19_A!=2" :required="q3_19_A==2&&q3_19_C.length<1" v-model="q3_19_C" ref="q3_19_C">
                        <label class="form-check-label" for="C-19-C-5">
                            ⑤其他
                        </label>
                        <input name="C-19-D" type="text" class="form-control" placeholder="請說明" :disabled="q3_19_C!=5">
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="C-19-A" id="3-19-A-3" value="3"
                    v-model="q3_19_A" ref="q3_19_A"
                    :disabled="q3_19!=1">
                    <label class="form-check-label" for="3-19-A-3">
                        (3)沒有提供托兒服務機構及托兒措施
                    </label>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="C-19" id="3-19-2" value="2" v-model="q3_19" ref="q3_19">
                <label class="form-check-label" for="3-19-2">
                    2.沒有
                </label>
            </div>
          </div>
          <!-- 3-19 -->
      </div>
      @include('mixin.section-footer',['current'=>4])
  </form>
</main>
@include('mixin.footer')
<script src="js/page4.js?v={{ $assets_version }}"></script>
<script>
  $(function(){
    var text = ["C-9-C","C-10_1-G","C-10_1-I","C-10_1-J",
    "C-10_2-C","C-10_5-B","C-10_6-B","C-10_6-D","C-12-F","C-12-I",
    "C-12-J","C-13-B","C-13-E","C-13-F","C-14-B",
    "C-15-B","C-16-C","C-16-F","C-16-G","C-17-B",
    "C-17-D","C-18-B","C-18-D","C-19-D"
  ];
    makeTextRequired(text)
  })
</script>
@endsection
