@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  <form id="form" action="{{ route('page4') }}" method="POST"  onsubmit="return checkForm()">
      @csrf
      <h2>參、各項假別及照顧措施</h2>
      <div class="row">
        <!-- 3-1 -->
        <div class="col-12">
          <h3>一、請問貴單位(公司)在女性員工因生理日致工作有困難時，會不會依法同意員工申請「生理假」？</h3>
          <small>
            <b>(<span class="text-danger">員工只要因生理因素請假，不論請生理假或病假，此題均歸類為會同意</span>)</b>
            (性別工作平等法第14條第1項：女性受僱者因生理日致工作有困難者，每月得請生理假1日，全年請假日數未逾3日，不併入病假計算，其餘日數併入病假計算。同法第21條第1項：受僱者為生理假請求時，雇主不得拒絕。)
          </small>
          <div class="form-check">
            <input type="radio" name="C-1" id="3-1-1" value="1" class="form-check-input" required v-model="q3_1" ref="q3_1">
            <label class="form-check-label" for="3-1-1">
                1.會
            </label>
          </div>
          <div class="qa-box">
              <h4>A.請問最近一年(110年10月至111年9月)內有沒有員工申請？</h4>
              <div class="form-check">
                  <input type="radio" name="C-1-A" id="3-1-A-1" value="1" class="form-check-input" v-model="q3_1_A" ref="q3_1_A" :required="q3_1==1" :disabled="q3_1==2">
                  <label class="form-check-label" for="3-1-A-1">
                      (1)有，
                  </label>
                  <span>
                    <input min="0" name="C-1-C" min="1" max="10000" type="number" class="input-inline" :required="q3_1_A==1" :disabled="q3_1==2||q3_1_A!=1">人;
                  </span>
                  <span>平均每人一年內約申請
                    <input min="0.1" max="12" name="C-1-D" type="number" step="0.1" class="input-inline" :required="q3_1_A==1" :disabled="q3_1==2||q3_1_A!=1">日
                  </span>
                  <small><span class="text-danger">(申請天數請以有申請的人計算)</span></small>
              </div>
              <div class="form-check mb-3">
                  <input type="radio" name="C-1-A" id="3-1-A-2" value="2" class="form-check-input" :disabled="q3_1==2" v-model="q3_1_A" ref="q3_1_A">
                  <label class="form-check-label" for="3-1-A-2">
                      (2)沒有
                  </label>
              </div>
              <h4>B.生理假工資怎麼計算？</h4>
              <div class="form-check">
                  <input type="radio" name="C-1-B" id="3-1-B-1" value="1" class="form-check-input" :required="q3_1==1" :disabled="q3_1==2" v-model="text1" ref="text1">
                  <label class="form-check-label" for="3-1-B-1">
                      (1)給全薪
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-B" id="3-1-B-2" value="2" class="form-check-input" :disabled="q3_1==2"
                  v-model="text1" ref="text1">
                  <label class="form-check-label" for="3-1-B-2">
                      (2)給半薪
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-B" id="3-1-B-3" value="3" class="form-check-input" :disabled="q3_1==2"
                  v-model="text1" ref="text1">
                  <label class="form-check-label" for="3-1-B-3">
                      (3)3日給全薪，逾3日給半薪
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-B" id="3-1-B-4" value="4" class="form-check-input" :disabled="q3_1==2"
                  v-model="text1" ref="text1">
                  <label class="form-check-label" for="3-1-B-4">
                      (4)不發工資
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-B" id="3-1-B-5" value="5" class="form-check-input" :disabled="q3_1==2"
                  v-model="text1" ref="text1">
                  <label class="form-check-label" for="3-1-B-5">
                      (5)其他
                  </label>
                  <input name="C-1-E" type="text" class="form-control" placeholder="請說明" :disabled="q3_1==2||text1!=5">
              </div>
          </div>
          <div class="form-check">
              <input type="radio" name="C-1" id="3-1-2" value="2" class="form-check-input" v-model="q3_1" ref="q3_1">
              <label class="form-check-label" for="3-1-2">
                  2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
              </label>
          </div>
          <div class="qa-box">
              <div class="form-check">
                  <input type="radio" name="C-1-F" id="3-1-F-1" value="1" class="form-check-input" :required="q3_1==2" :disabled="q3_1==1" v-model="q3_1_F" ref="q3_1_F">
                  <label class="form-check-label" for="3-1-F-1">
                      (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input type="checkbox" name="C-1-G[]" id="3-1-G-1" value="1" class="form-check-input"
                      :required="q3_1_G.length==0&&q3_1_F==1" :disabled="q3_1==1||q3_1_F!=1" v-model="q3_1_G" ref="q3_1_G">
                      <label class="form-check-label" for="3-1-G-1">
                          ①特休
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="checkbox" name="C-1-G[]" id="3-1-G-2" value="2" class="form-check-input"
                      :required="q3_1_G.length==0&&q3_1_F==1" :disabled="q3_1==1||q3_1_F!=1" v-model="q3_1_G" ref="q3_1_G">
                      <label class="form-check-label" for="3-1-G-2">
                          ②事假
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="checkbox" name="C-1-G[]" id="3-1-G-3" value="3" class="form-check-input"
                      :required="q3_1_G.length==0&&q3_1_F==1" :disabled="q3_1==1||q3_1_F!=1" v-model="q3_1_G" ref="q3_1_G">
                      <label class="form-check-label" for="3-1-G-3">
                          ③其他
                      </label>
                      <input name="C-1-H" type="text" class="form-control" placeholder="請說明" :disabled="q3_1==1">
                  </div>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-F" id="3-1-F-2" value="2" class="form-check-input" :disabled="q3_1==1" v-model="q3_1_F" ref="q3_1_F">
                  <label class="form-check-label" for="3-1-F-2">
                      (2)業務繁忙，無法提供
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-F" id="3-1-F-3" value="3" class="form-check-input" :disabled="q3_1==1" v-model="q3_1_F" ref="q3_1_F">
                  <label class="form-check-label" for="3-1-F-3">
                      (3)按日或按時計薪員工可調整工作時間休息
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-F" id="3-1-F-4" value="4" class="form-check-input" :disabled="q3_1==1" v-model="q3_1_F" ref="q3_1_F">
                  <label class="form-check-label" for="3-1-F-4">
                      (4)公司為家族企業可自行放假休息
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-F" id="3-1-F-5" value="5" class="form-check-input" :disabled="q3_1==1" v-model="q3_1_F" ref="q3_1_F">
                  <label class="form-check-label" for="3-1-F-5">
                      (5)不知道有此規定
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-1-F" id="3-1-F-6" value="6" class="form-check-input" :disabled="q3_1==1" v-model="q3_1_F" ref="q3_1_F">
                  <label class="form-check-label" for="3-1-F-6">
                      (6)其他
                  </label>
                  <input name="C-1-I" type="text" class="form-control" placeholder="請說明" :disabled="q3_1==1">
              </div>
          </div>
        </div>
        <!-- 3-1 -->
        <!-- 3-2 -->
        <div class="col-12">
          <h3>二、請問貴單位(公司)對懷孕員工有沒有提供友善措施？ </h3>
          <div class="form-check">
            <input type="radio" name="C-2" id="3-2-1" value="1" class="form-check-input" required v-model="q3_2" ref="q3_2">
            <label class="form-check-label" for="3-2-1">
                1.有，方式為：<span class="badge badge-pill badge-warning">可複選</span>
            </label>
          </div>
          <div class="qa-box">
            <div class="form-check">
              <input type="checkbox" name="C-2-A[]" id="3-2-A-1" value="1" class="form-check-input" :disabled="q3_2==2" :required="q3_2_A.length==0&&q3_2==1" v-model="q3_2_A" ref="q3_2_A">
              <label class="form-check-label" for="3-2-A-1">
                  (1)調整至較輕鬆工作
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="C-2-A[]" id="3-2-A-2" value="2" class="form-check-input" :disabled="q3_2==2" :required="q3_2_A.length==0&&q3_2==1" v-model="q3_2_A" ref="q3_2_A">
              <label class="form-check-label" for="3-2-A-2">
                  (2)調整至無危險性之工作
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="C-2-A[]" id="3-2-A-3" value="3" class="form-check-input" :disabled="q3_2==2" :required="q3_2_A.length==0&&q3_2==1" v-model="q3_2_A" ref="q3_2_A">
              <label class="form-check-label" for="3-2-A-3">
                  (3)調整工作時間
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="C-2-A[]" id="3-2-A-4" value="4" class="form-check-input" :disabled="q3_2==2"
              :required="q3_2_A.length==0&&q3_2==1" v-model="q3_2_A" ref="q3_2_A">
              <label class="form-check-label" for="3-2-A-4">
                  (4)其他
              </label>
              <input name="C-2-B" type="text" class="form-control" placeholder="請說明">
            </div>
          </div>
          <div class="form-check">
            <input type="radio" name="C-2" id="3-2-2" value="2" class="form-check-input" v-model="q3_2" ref="q3_2">
            <label class="form-check-label" for="3-2-2">
                2.沒有
            </label>
          </div>
        </div>
        <!-- 3-2 -->
        <!-- 3-3 -->
        <div class="col-12">
          <h3>三、請問貴單位(公司)若有員工經醫師診斷需安胎休養，會不會依法同意員工申請「安胎休養」？</h3>
          <small>
            <b><span class="text-danger">(員工經醫師診斷需安胎休養，因而請假，此題均歸類為會同意)</span></b><br>(性別工作平等法第15條第3項：受僱者經醫師診斷需安胎休養者，其治療、照護或休養期間之請假及薪資計算，依相關法令之規定。同法第21條第1項：受僱者為安胎休養請求時，雇主不得拒絕。適用勞動基準法之勞工依勞工請假規則第4條第2項辦理：經醫師診斷，罹患癌症(含原位癌)採門診方式治療或懷孕期間需安胎休養者，其治療或休養期間，併入住院傷病假計算。)
          </small>
          <div class="form-check">
              <input type="radio" name="C-3" id="3-3-1" value="1" class="form-check-input" required v-model="q3_3" ref="q3_3">
              <label class="form-check-label" for="3-3-1">
                  1.會，請問最近一年(110年10月至111年9月)內有沒有員工申請？
              </label>
          </div>
          <div class="qa-box">
              <div class="form-check">
                  <input type="radio" name="C-3-A" id="3-3-A-1" value="1" class="form-check-input"
                  :required="q3_3==1" :disabled="q3_3==2">
                  <label class="form-check-label" for="3-3-A-1">
                      (1)有
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-3-A" id="3-3-A-2" value="2" class="form-check-input" :disabled="q3_3==2">
                  <label class="form-check-label" for="3-3-A-2">
                      (2)沒有
                  </label>
              </div>
          </div>
          <div class="form-check">
              <input type="radio" name="C-3" id="3-3-2" value="2" class="form-check-input" v-model="q3_3" ref="q3_3">
              <label class="form-check-label" for="3-3-2">
                  2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
              </label>
          </div>
          <div class="qa-box">
              <div class="form-check">
                  <input type="radio" name="C-3-B" id="3-3-B-1" value="1" class="form-check-input"
                  :required="q3_3==2" :disabled="q3_3==1" v-model="q3_3_B" ref="q3_3_B">
                  <label class="form-check-label" for="3-3-B-1">
                      (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input type="checkbox" name="C-3-C[]" id="3-3-C-1" value="1" class="form-check-input" :required="q3_3_C.length==0&&q3_3_B==1"
                      :disabled="q3_3==1||q3_3_B!=1" v-model="q3_3_C" ref="q3_3_C">
                      <label class="form-check-label" for="3-3-C-1">
                          ①特休
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="checkbox" name="C-3-C[]" id="3-3-C-2" value="2" class="form-check-input" :required="q3_3_C.length==0&&q3_3_B==1" :disabled="q3_3==1||q3_3_B!=1" v-model="q3_3_C" ref="q3_3_C">
                      <label class="form-check-label" for="3-3-C-2">
                          ②事假
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="checkbox" name="C-3-C[]" id="3-3-C-3" value="3"  class="form-check-input" :required="q3_3_C.length==0&&q3_3_B==1" :disabled="q3_3==1||q3_3_B!=1" v-model="q3_3_C" ref="q3_3_C">
                      <label class="form-check-label" for="3-3-C-3">
                          ③其他
                      </label>
                      <input name="C-3-D" type="text" class="form-control" placeholder="請說明" :disabled="q3_3==1">
                  </div>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-3-B" id="3-3-B-2" value="2" class="form-check-input" :disabled="q3_3==1" v-model="q3_3_B" ref="q3_3_B">
                  <label class="form-check-label" for="3-3-B-2">
                      (2)業務繁忙，無法提供
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-3-B" id="3-3-B-3" value="3"   class="form-check-input" :disabled="q3_3==1" v-model="q3_3_B" ref="q3_3_B">
                  <label class="form-check-label" for="3-3-B-3">
                      (3)公司為家族企業可自行放假休息
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-3-B" id="3-3-B-4" value="4" class="form-check-input" :disabled="q3_3==1" v-model="q3_3_B" ref="q3_3_B">
                  <label class="form-check-label" for="3-3-B-4">
                      (4)不知道有此規定
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-3-B" id="3-3-B-5" value="5" class="form-check-input" :disabled="q3_3==1" v-model="q3_3_B" ref="q3_3_B">
                  <label class="form-check-label" for="3-3-B-5">
                      (5)其他
                  </label>
                  <input name="C-3-E" type="text" class="form-control" placeholder="請說明" :disabled="q3_3==1">
              </div>
          </div>
        </div>
        <!-- 3-3 -->
        <!-- 3-4 -->
        <div class="col-12">
          <h3>四、請問貴單位(公司)在員工懷孕時，會不會依法同意員工申請「產檢假」?</h3>
          <small>
            (性別工作平等法第15條：受僱者妊娠期間，雇主應給予產檢假7日。產檢假期間，薪資照給。雇主依前項規定給付產檢假薪資後，就其中逾5日之部分得向中央主管機關申請補助。同法第21條第1項：受僱者為產檢假請求時，雇主不得拒絕。)
          </small>
          <div class="form-check">
            <input type="radio" name="C-4_1" id="3-4_1-1" value="1" class="form-check-input" required v-model="q3_41" ref="q3_41">
            <label class="form-check-label" for="3-4_1-1">
                1.會
            </label>
          </div>
          <div class="qa-box">
            <h4>A.「產檢假」可申請
              <input min="1" max="30" name="C-4_1-A" type="number" class="input-inline" :required="q3_41==1" :disabled="q3_41==2">日
            </h4>
            <h4>B.請問最近一年(110年10月至111年9月)內有沒有員工申請？</h4>
            <div class="form-check">
              <input type="radio" name="C-4_1-B" id="3-4_1-B-1" value="1" class="form-check-input" :required="q3_41==1" :disabled="q3_41==2" v-model="q3_41_B" ref="q3_41_B">
              <label class="form-check-label" for="3-4_1-B-1">
                  (1)有，
                  <input min="1" max="10000" name="C-4_1-C" type="number" class="input-inline" :disabled="q3_41==2||q3_41_B!=1" :required="q3_41_B==1">
                  人申請
              </label>
            </div>
            <div class="form-check mb-3">
              <input type="radio" name="C-4_1-B" id="3-4_1-B-2" value="2"  class="form-check-input" :disabled="q3_41==2" v-model="q3_41_B" ref="q3_41_B">
              <label class="form-check-label" for="3-4_1-B-2">
                  (2)沒有
              </label>
            </div>
            <h4>C.產檢假期間工資怎麼計算？</h4>
            <div class="form-check">
              <input type="radio" name="C-4_1-D" id="3-4_1-D-1" value="1" class="form-check-input" :required="q3_41==1" :disabled="q3_41==2">
              <label class="form-check-label" for="3-4_1-D-1">
                  (1)給全薪
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="C-4_1-D" id="3-4_1-D-2" value="2" class="form-check-input" :disabled="q3_41==2">
              <label class="form-check-label" for="3-4_1-D-2">
                  (2)部分給薪
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="C-4_1-D" id="3-4_1-D-3" value="3" class="form-check-input" :disabled="q3_41==2">
              <label class="form-check-label" for="3-4_1-D-3">
                  (3)不發工資
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="C-4_1-D" id="3-4_1-D-4" value="4"  class="form-check-input" :disabled="q3_41==2">
              <label class="form-check-label" for="3-4_1-D-4">
                  (4)其他
              </label>
              <input name="C-4_1-E" type="text" class="form-control" placeholder="請說明" :disabled="q3_41==2">
            </div>
          </div>
          <div class="form-check">
              <input type="radio" name="C-4_1" id="3-4_1-2" value="2" class="form-check-input" v-model="q3_41" ref="q3_41">
              <label class="form-check-label" for="3-4_1-2">
                  2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
              </label>
          </div>
          <div class="qa-box">
            <div class="form-check">
              <input type="radio" name="C-4_1-F" id="3-4_1-F-1" value="1" class="form-check-input"
              :required="q3_41==2" :disabled="q3_41==1" v-model="q3_41_F" ref="q3_41_F">
              <label class="form-check-label" for="3-4_1-F-1">
                  (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
              </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input type="checkbox" name="C-4_1-H[]" id="3-4_1-H-1" value="1" class="form-check-input" 
                    :disabled="q3_41==1||q3_41_F!=1" v-model="q3_41_H" ref="q3_41_H"
                    :required="q3_41_F==1&&q3_41_H.length==0">
                    <label class="form-check-label" for="3-4_1-H-1">
                        ①特休
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="C-4_1-H[]" id="3-4_1-H-2" value="2" class="form-check-input" :disabled="q3_41==1||q3_41_F!=1" v-model="q3_41_H" ref="q3_41_H"
                    :required="q3_41_F==1&&q3_41_H.length==0">
                    <label class="form-check-label" for="3-4_1-H-2">
                        ②事假
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="C-4_1-H[]" id="3-4_1-H-3" value="3"  class="form-check-input" :disabled="q3_41==1||q3_41_F!=1" v-model="q3_41_H" ref="q3_41_H"
                    :required="q3_41_F==1&&q3_41_H.length==0">
                    <label class="form-check-label" for="3-4_1-H-3">
                        ③病假
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="C-4_1-H[]" id="3-4_1-H-4" value="4" class="form-check-input" :disabled="q3_41==1||q3_41_F!=1" v-model="q3_41_H" ref="q3_41_H"
                    :required="q3_41_F==1&&q3_41_H.length==0">
                    <label class="form-check-label" for="3-4_1-H-4">
                        ④其他
                    </label>
                    <input name="C-4_1-I" type="text" class="form-control" placeholder="請說明" :disabled="q3_41==1">
                </div>
            </div>
            <div class="form-check">
                <input type="radio" name="C-4_1-F" id="3-4_1-F-2" value="2" class="form-check-input" :disabled="q3_41==1" v-model="q3_41_F" ref="q3_41_F">
                <label class="form-check-label" for="3-4_1-F-2">
                    (2)業務繁忙，無法提供
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="C-4_1-F" id="3-4_1-F-3" value="3"  class="form-check-input" :disabled="q3_41==1" v-model="q3_41_F" ref="q3_41_F">
                <label class="form-check-label" for="3-4_1-F-3">
                    (3)按日或按時計薪員工可調整工作時間產檢
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="C-4_1-F" id="3-4_1-F-4" value="4"  class="form-check-input" :disabled="q3_41==1" v-model="q3_41_F" ref="q3_41_F">
                <label class="form-check-label" for="3-4_1-F-4">
                    (4)公司為家族企業可自行放假產檢
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="C-4_1-F" id="3-4_1-F-5" value="5" class="form-check-input" :disabled="q3_41==1" v-model="q3_41_F" ref="q3_41_F">
                <label class="form-check-label" for="3-4_1-F-5">
                    (5)不知道有此規定
                </label>
            </div>
            <div class="form-check">
                <input type="radio" name="C-4_1-F" id="3-4_1-F-6" value="6"  class="form-check-input" :disabled="q3_41==1" v-model="q3_41_F" ref="q3_41_F">
                <label class="form-check-label" for="3-4_1-F-6">
                    (6)其他
                </label>
                <input name="C-4_1-G" type="text" class="form-control" placeholder="請說明" :disabled="q3_41==1">
            </div>
          </div>

          {{-- ================================= --}}
          {{-- <h4>4-2請問貴單位(公司)，會不會在還沒有完成修法前即同意員工申請第6日或第7日有薪「產檢假」？</h4>
          <div class="form-check">
              <input type="radio" name="C-4_2" id="3-4_2-1" value="1" class="form-check-input" required v-model="q3_42" ref="q3_42">
              <label class="form-check-label" for="3-4_2-1">
                  1.會，提供哪幾日？
              </label>
          </div>
          <div class="qa-box">
              <div class="form-check">
                  <input type="radio" name="C-4_2-A" id="3-4_2-A-1" value="1" class="form-check-input"
                  :required="q3_42==1" :disabled="q3_42==2">
                  <label class="form-check-label" for="3-4_2-A-1">
                      (1)僅提供第6日
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-A" id="3-4_2-A-2" value="2" class="form-check-input" :disabled="q3_42==2">
                  <label class="form-check-label" for="3-4_2-A-2">
                      (2)提供第6日及第7日
                  </label>
              </div>
          </div>
          <div class="form-check">
              <input type="radio" name="C-4_2" id="3-4_2-2" value="2" class="form-check-input" v-model="q3_42" ref="q3_42">
              <label class="form-check-label" for="3-4_2-2">
                  2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
              </label>
          </div>
          <div class="qa-box">
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-1" value="1" class="form-check-input"
                  :required="q3_42==2" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="3-4_2-B-1">
                      (1)法令沒有強制規定
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-2" value="2" class="form-check-input" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="3-4_2-B-2" >
                      (2)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                  </label>
              </div>
              <div class="qa-box">
                  <div class="form-check">
                      <input type="checkbox" name="C-4_2-C[]" id="3-4_2-C-1" value="1" class="form-check-input" :disabled="q3_42==1"
                      :required="q3_42_B==2&&q3_42_C.length==0" v-model="q3_42_C" ref="q3_42_C">
                      <label class="form-check-label" for="3-4_2-C-1">
                          ①特休
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="checkbox" name="C-4_2-C[]" id="3-4_2-C-2" value="2" class="form-check-input" :disabled="q3_42==1"
                      :required="q3_42_B==2&&q3_42_C.length==0" v-model="q3_42_C" ref="q3_42_C">
                      <label class="form-check-label" for="3-4_2-C-2">
                          ②事假
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="checkbox" name="C-4_2-C[]" id="3-4_2-C-3" value="3" class="form-check-input" :disabled="q3_42==1"
                      :required="q3_42_B==2&&q3_42_C.length==0" v-model="q3_42_C" ref="q3_42_C">
                      <label class="form-check-label" for="3-4_2-C-3">
                          ③病假
                      </label>
                  </div>
                  <div class="form-check">
                      <input type="checkbox" name="C-4_2-C[]" id="3-4_2-C-4" value="4" class="form-check-input" :disabled="q3_42==1"
                      :required="q3_42_B==2&&q3_42_C.length==0" v-model="q3_42_C" ref="q3_42_C">
                      <label class="form-check-label" for="3-4_2-C-4">
                          ④其他
                      </label>
                      <input name="C-4_2-D" type="text" class="form-control" placeholder="請說明" :disabled="q3_42==1">
                  </div>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-3" value="3" class="form-check-input" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="3-4_2-B-3">
                      (3)申請補助過於繁瑣
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-4" value="4" class="form-check-input" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="4">
                      (4)不知道有此規定
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-5" value="5" class="form-check-input" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="3-4_2-B-5">
                      (5)業務繁忙，無法提供
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-6" value="6" class="form-check-input" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="3-4_2-B-6">
                      (6)按日或按時計薪員工可調整工作時間產檢
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-7" value="7" class="form-check-input" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="3-4_2-B-7">
                      (7)公司為家族企業可自行放假產檢
                  </label>
              </div>
              <div class="form-check">
                  <input type="radio" name="C-4_2-B" id="3-4_2-B-8" value="8" class="form-check-input" :disabled="q3_42==1"
                  v-model="q3_42_B" ref="q3_42_B">
                  <label class="form-check-label" for="3-4_2-B-8">
                      (8)其他
                  </label>
                  <input name="C-4_2-E" type="text" class="form-control" placeholder="請說明" :disabled="q3_42==1">
              </div>
          </div> --}}
        </div>
        <!-- 3-4 -->
        <!-- 3-5 -->
        <div class="col-12">
            <h3>五、請問貴單位(公司)在員工流產時，會不會依法同意員工申請「流產假」？</h3>
            <small>(勞動基準法第50條及性別工作平等法第15條第1項規定：妊娠3個月以上流產者，應使其停止工作，給予產假4星期。性別工作平等法第15條第1項規定：妊娠2個月以上未滿3個月流產者，應使其停止工作，給予產假1星期，妊娠未滿2個月流產者，應使其停止工作，給予產假5日。同法第21條第1項：受僱者為流產請求時，雇主不得拒絕。)</small>
            <div class="form-check">
                <input type="radio" name="C-5" id="3-5-1" value="1" class="form-check-input" required v-model="q3_5" ref="q3_5">
                <label class="form-check-label" for="3-5-1">
                    1.會，請問最近一年(110年10月至111年9月)內有沒有員工申請？
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                  <input type="radio" name="C-5-A" id="3-5-A-1" value="1" class="form-check-input" :required="q3_5==1" :disabled="q3_5==2">
                  <label class="form-check-label" for="3-5-A-1">
                      (1)有
                  </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-5-A" id="3-5-A-2" value="2" class="form-check-input" :disabled="q3_5==2">
                    <label class="form-check-label" for="3-5-A-2">
                        (2)沒有
                    </label>
                </div>
            </div>
            <div class="form-check">
                <input type="radio" name="C-5" id="3-5-2" value="2" class="form-check-input" v-model="q3_5" ref="q3_5">
                <label class="form-check-label" for="3-5-2">
                    2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" name="C-5-B" id="3-5-B-1" value="1" class="form-check-input" :required="q3_5==2" :disabled="q3_5==1"
                    v-model="q3_5_B" ref="q3_5_B">
                    <label class="form-check-label" for="3-5-B-1">
                        (1)員工可用病假替代
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-5-B" id="3-5-B-2" value="2" class="form-check-input" :disabled="q3_5==1"
                    v-model="q3_5_B" ref="q3_5_B">
                    <label class="form-check-label" for="3-5-B-2">
                        (2)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                    </label>
                </div>
                <div class="qa-box">
                    <div class="form-check">
                        <input type="checkbox" name="C-5-C[]" id="3-5-C-1" value="1" class="form-check-input" :disabled="q3_5==1||q3_5_B!=2"
                        :required="q3_5_B==2&&q3_5_C.length==0" v-model="q3_5_C" ref="q3_5_C">
                        <label class="form-check-label" for="3-5-C-1">
                            ①特休
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-5-C[]" id="3-5-C-2" value="2" class="form-check-input" :disabled="q3_5==1||q3_5_B!=2"
                        :required="q3_5_B==2&&q3_5_C.length==0" v-model="q3_5_C" ref="q3_5_C">
                        <label class="form-check-label" for="3-5-C-2">
                            ②事假
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-5-C[]" id="3-5-C-3" value="3" class="form-check-input" :disabled="q3_5==1||q3_5_B!=2"
                        :required="q3_5_B==2&&q3_5_C.length==0" v-model="q3_5_C" ref="q3_5_C">
                        <label class="form-check-label" for="3-5-C-3">
                            ③其他
                        </label>
                        <input name="C-5-D" type="text" class="form-control" placeholder="請說明" :disabled="q3_5==1">
                    </div>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-5-B" id="3-5-B-3" value="3" class="form-check-input" :disabled="q3_5==1"
                    v-model="q3_5_B" ref="q3_5_B">
                    <label class="form-check-label" for="3-5-B-3">
                        (3)業務繁忙，無法提供
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-5-B" id="3-5-B-4" value="4" class="form-check-input" :disabled="q3_5==1"
                    v-model="q3_5_B" ref="q3_5_B">
                    <label class="form-check-label" for="4">
                        (4)公司為家族企業可自行放假休息
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-5-B" id="3-5-B-5" value="5" class="form-check-input" :disabled="q3_5==1"
                    v-model="q3_5_B" ref="q3_5_B">
                    <label class="form-check-label" for="3-5-B-5">
                        (5)不知道有此規定
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-5-B" id="3-5-B-6" value="6" class="form-check-input" :disabled="q3_5==1"
                    v-model="q3_5_B" ref="q3_5_B">
                    <label class="form-check-label" for="3-5-B-6">
                        (6)其他
                    </label>
                    <input name="C-5-E" type="text" class="form-control" placeholder="請說明" :disabled="q3_5==1">
                </div>
            </div>
        </div>
        <!-- 3-5 -->
        <!-- 3-6 -->
        <div class="col-12">
            <h3>六、請問貴單位(公司)在女性員工生產時，會不會依法同意員工申請「產假」(停止工作)？</h3>
            <small>(勞動基準法第50條及性別工作平等法第15條規定，女工分娩前後，應停止工作，給予產假8星期，停止工作期間工資照給。同法第21條第1項：受僱者為產假請求時，雇主不得拒絕。性別工作平等法施行細則第6條規定，產假期間之計算，應依曆連續計算<b>【包含例假、休息日及國定假日在內】</b>。)</small>
            <div class="form-check">
                <input type="radio" name="C-6" id="3-6-1" value="1" class="form-check-input" required v-model="q3_6" ref="q3_6">
                <label class="form-check-label" for="3-6-1">
                    1.會
                </label>
            </div>
            <div class="qa-box">
                <h4>A.產假有
                  <input name="C-6-A" min="0.1" step="0.1" max="16.0" type="number" class="input-inline" :required="q3_6==1" :disabled="q3_6==2"> 週
                  <small>(產假以工作天給予者，請依產假天數/每週工作天數換算)</small>
                </h4>
                <h4>B.請問最近一年(109年10月至110年9月)內有沒有員工申請？</h4>
                <div class="form-check">
                    <input type="radio" name="C-6-B" id="3-6-B-1" value="1" class="form-check-input" :required="q3_6==1" :disabled="q3_6==2" v-model="q3_6_B" ref="q3_6_B">
                    <label class="form-check-label" for="3-6-B-1">
                        (1)有，
                        <input name="C-6-G" min="1" max="10000" type="number" class="input-inline" :disabled="q3_6==2||q3_6_B!=1" :required="q3_6_B==1">
                        人申請
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input type="radio" name="C-6-B" id="3-6-B-2" value="2"  class="form-check-input" :disabled="q3_6==2" v-model="q3_6_B" ref="q3_6_B">
                    <label class="form-check-label" for="3-6-B-2">
                        (2)沒有
                    </label>
                </div>
                <h4>C.產假期間工資怎麼計算？</h4>
                <div class="form-check">
                    <input type="radio" name="C-6-C" id="3-6-C-1" value="1" class="form-check-input"
                    :required="q3_6==1" :disabled="q3_6==2"  v-model="q3_6_c" ref="q3_6_c">
                    <label class="form-check-label" for="3-6-C-1">
                        (1)給全薪(和生產前薪資相同) <b>【含受僱未滿6個月減半發給之情形】</b>
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-C" id="3-6-C-2" value="2" class="form-check-input" :disabled="q3_6==2" v-model="q3_6_c" ref="q3_6_c">
                    <label class="form-check-label" for="3-6-C-2">
                        (2)給底薪，與生產前薪資項目比較，未支付哪些項目？<span class="badge badge-pill badge-warning">可複選</span>
                    </label>
                </div>
                <div class="qa-box">
                    <div class="form-check">
                        <input type="checkbox" name="C-6-H[]" id="3-6-H-1" value="1" class="form-check-input" :disabled="q3_6==2||q3_6_c!=2">
                        <label class="form-check-label" for="3-6-H-1">
                            ①全勤獎金
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-6-H[]" id="3-6-H-2" value="2" class="form-check-input" :disabled="q3_6==2||q3_6_c!=2">
                        <label class="form-check-label" for="3-6-H-2">
                            ②專業或職務津貼(加給)
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-6-H[]" id="3-6-H-3" value="3" class="form-check-input" :disabled="q3_6==2||q3_6_c!=2">
                        <label class="form-check-label" for="3-6-H-3">
                            ③伙食、交通津貼
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-6-H[]" id="3-6-H-4" value="4" class="form-check-input" :disabled="q3_6==2||q3_6_c!=2">
                        <label class="form-check-label" for="3-6-H-4">
                            ④績效、業績、生產或工作獎金
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-6-H[]" id="3-6-H-5" value="5" class="form-check-input" :disabled="q3_6==2||q3_6_c!=2">
                        <label class="form-check-label" for="3-6-H-5">
                            ⑤其他
                        </label>
                        <input name="C-6-I" type="text" class="form-control" placeholder="請說明" :disabled="q3_6==2||q3_6_c!=2">
                    </div>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-C" id="3-6-C-3" value="3" class="form-check-input" :disabled="q3_6==2" v-model="q3_6_c" ref="q3_6_c">
                    <label class="form-check-label" for="3-6-C-3">
                        (3)部分給薪
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-C" id="3-6-C-4" value="4" class="form-check-input" :disabled="q3_6==2" v-model="q3_6_c" ref="q3_6_c">
                    <label class="form-check-label" for="3-6-C-4">
                        (4)不發工資
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input type="radio" name="C-6-C" id="3-6-C-5" value="5" class="form-check-input" :disabled="q3_6==2" v-model="q3_6_c" ref="q3_6_c">
                    <label class="form-check-label" for="3-6-C-5">
                        (5)其他
                    </label>
                    <input name="C-6-J" type="text" class="form-control" placeholder="請說明" :disabled="q3_6==2">
                </div>
                <h4>D.產假期間貴單位(公司)人力如何因應？<span class="badge badge-pill badge-warning">可複選，最多複選3項</span>
                  <span id="3-6-D-err" class="text-danger d-none">超過3項</span>
                </h4>
                <div class="form-check">
                    <input type="checkbox" name="C-6-D[]" id="3-6-D-1" value="1" class="form-check-input" :required="q3_6_D.length==0&&q3_6==1" :disabled="q3_6==2" v-model="q3_6_D" ref="q3_6_D">
                    <label class="form-check-label" for="3-6-D-1">
                        (1)直接調整同一部門人員
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="C-6-D[]" id="3-6-D-2" value="2" class="form-check-input" :required="q3_6_D.length==0&&q3_6==1" :disabled="q3_6==2" v-model="q3_6_D" ref="q3_6_D">
                    <label class="form-check-label" for="3-6-D-2">
                        (2)調用其他部門人員
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="C-6-D[]" id="3-6-D-3" value="3" class="form-check-input" :required="q3_6_D.length==0&&q3_6==1" :disabled="q3_6==2" v-model="q3_6_D" ref="q3_6_D">
                    <label class="form-check-label" for="3-6-D-3">
                        (3)僱用約僱或臨時人員
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="C-6-D[]" id="3-6-D-4" value="4" class="form-check-input" :required="q3_6_D.length==0&&q3_6==1" :disabled="q3_6==2" v-model="q3_6_D" ref="q3_6_D">
                    <label class="form-check-label" for="3-6-D-4">
                        (4)進用正職之新進人員
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="C-6-D[]" id="3-6-D-5" value="5" class="form-check-input" :required="q3_6_D.length==0&&q3_6==1" :disabled="q3_6==2" v-model="q3_6_D" ref="q3_6_D">
                    <label class="form-check-label" for="3-6-D-5">
                        (5)使用派遣人員
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="C-6-D[]" id="3-6-D-6" value="6" class="form-check-input" :required="q3_6_D.length==0&&q3_6==1" :disabled="q3_6==2" v-model="q3_6_D" ref="q3_6_D">
                    <label class="form-check-label" for="3-6-D-6">
                        (6)其他
                    </label>
                    <input name="C-6-K" type="text" class="form-control" placeholder="請說明" :disabled="q3_6==2">
                </div>
                <h4>E.對於產假後銷假上班員工，請問貴單位(公司)怎麼安排？</h4>
                <div class="form-check">
                    <input type="radio" name="C-6-E" id="3-6-E-1" value="1" class="form-check-input" :required="q3_6==1" :disabled="q3_6==2">
                    <label class="form-check-label" for="3-6-E-1">
                        (1)恢復原來的職位
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-E" id="3-6-E-2" value="2" class="form-check-input" :disabled="q3_6==2">
                    <label class="form-check-label" for="3-6-E-2">
                        (2)由單位(公司)考量員工意願後作調整
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-E" id="3-6-E-3" value="3" class="form-check-input" :disabled="q3_6==2">
                    <label class="form-check-label" for="3-6-E-3">
                        (3)由單位(公司)人事管理部門決定
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-E" id="3-6-E-4" value="4" class="form-check-input" :disabled="q3_6==2">
                    <label class="form-check-label" for="3-6-E-4">
                        (4)由部門主管決定
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-E" id="3-6-E-5" value="5" class="form-check-input" :disabled="q3_6==2">
                    <label class="form-check-label" for="3-6-E-5">
                        (5)其他
                    </label>
                    <input name="C-6-L" type="text" class="form-control" placeholder="請說明" :disabled="q3_6==2">
                </div>
            </div>
            <div class="form-check">
                <input type="radio" name="C-6" id="3-6-2" value="2"  class="form-check-input" v-model="q3_6" ref="q3_6">
                <label class="form-check-label" for="3-6-2">
                    2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" name="C-6-F" id="3-6-F-1" value="1" class="form-check-input" :required="q3_6==2" :disabled="q3_6==1">
                    <label class="form-check-label" for="3-6-F-1">
                        (1)工作性質不適合孕婦，員工懷孕會自動離職
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-F" id="3-6-F-2" value="2" class="form-check-input" :disabled="q3_6==1">
                    <label class="form-check-label" for="3-6-F-2">
                        (2)不僱用孕婦
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-F" id="3-6-F-3" value="3" class="form-check-input" :disabled="q3_6==1">
                    <label class="form-check-label" for="3-6-F-3">
                        (3)業務繁忙，無法提供
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-F" id="3-6-F-4" value="4" class="form-check-input" :disabled="q3_6==1">
                    <label class="form-check-label" for="3-6-F-4">
                        (4)單位(公司)無法負擔此項假別
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-F" id="3-6-F-5" value="5" class="form-check-input" :disabled="q3_6==1">
                    <label class="form-check-label" for="3-6-F-5">
                        (5)公司為家族企業可自行放假休息
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-F" id="3-6-F-6" value="6" class="form-check-input" :disabled="q3_6==1">
                    <label class="form-check-label" for="3-6-F-6">
                        (6)不知道有此規定
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-6-F" id="3-6-F-7" value="7" class="form-check-input" :disabled="q3_6==1">
                    <label class="form-check-label" for="3-6-F-7">
                        (7)其他
                    </label>
                    <input name="C-6-M" type="text" class="form-control" placeholder="請說明" :disabled="q3_6==1">
                </div>
            </div>
        </div>
        <!-- 3-6 -->
        <!-- 3-7 -->
        <div class="col-12">
            <h3>七、請問貴單位(公司)在員工配偶懷孕或生產時，會不會依法同意員工申請「陪產檢及陪產假」？</h3>
            <small> (性別工作平等法第15條：受僱者陪伴其配偶妊娠產檢或其配偶分娩時，雇主應給予陪產檢及陪產假7日。陪產檢及陪產假期間，薪資照給。雇主依前項規定給付陪產檢及陪產假薪資後，就其中逾5日之部分得向中央主管機關申請補助。同法第21條第1項：受僱者為陪產檢及陪產假請求時，雇主不得拒絕。)</small>
            <div class="form-check">
                <input type="radio" name="C-7" id="3-7-1" value="1" class="form-check-input" required v-model="q3_7" ref="q3_7">
                <label class="form-check-label" for="3-7-1">
                    1.會
                </label>
            </div>
            <div class="qa-box">
                <h4>A.「陪產檢及陪產假」可申請
                  <input min="1" max="30" name="C-7-A" type="number" class="input-inline" :required="q3_7==1" :disabled="q3_7==2">日
                </h4>
                <h4>B.請問最近一年(110年10月至111年9月)內有沒有員工申請？ </h4>
                <div class="form-check">
                    <input type="radio" name="C-7-B" id="3-7-B-1" value="1" class="form-check-input" :required="q3_7==1" :disabled="q3_7==2" v-model="q3_7_B" ref="q3_7_B">
                    <label class="form-check-label" for="3-7-B-1">
                        (1)有，
                        <input name="C-7-D" min="1" max="10000" type="number" class="input-inline" :disabled="q3_7==2||q3_7_B!=1" :required="q3_7_B==1">
                        人申請
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-B" id="3-7-B-2" value="2" class="form-check-input" :disabled="q3_7==2" v-model="q3_7_B" ref="q3_7_B">
                    <label class="form-check-label" for="3-7-B-2">
                        (2)沒有
                    </label>
                </div>
                <h4>C.陪產檢及陪產假期間工資怎麼計算？</h4>
                <div class="form-check">
                    <input type="radio" name="C-7-C" id="3-7-C-1" value="1" class="form-check-input" :required="q3_7==1" :disabled="q3_7==2">
                    <label class="form-check-label" for="3-7-C-1">
                        (1)給全薪
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-C" id="3-7-C-2" value="2" class="form-check-input" :disabled="q3_7==2">
                    <label class="form-check-label" for="3-7-C-2">
                        (2)部分給薪
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-C" id="3-7-C-3" value="3" class="form-check-input" :disabled="q3_7==2">
                    <label class="form-check-label" for="3-7-C-3">
                        (3)不發工資
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-C" id="3-7-C-4" value="4" class="form-check-input" :disabled="q3_7==2">
                    <label class="form-check-label" for="3-7-C-4">
                        (4)其他
                    </label>
                    <input name="C-7-E" type="text" class="form-control" placeholder="請說明" :disabled="q3_7==2">
                </div>
            </div>
            <div class="form-check">
                <input type="radio" name="C-7" id="3-7-2" value="2" class="form-check-input" v-model="q3_7" ref="q3_7">
                <label class="form-check-label" for="3-7-2" >
                    2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" name="C-7-F" id="3-7-F-1" value="1" class="form-check-input" :required="q3_7==2" :disabled="q3_7==1" v-model="q3_7_F" ref="q3_7_F">
                    <label class="form-check-label" for="3-7-F-1">
                        (1)員工可用其他假別替代，是哪些假別？<span class="badge badge-pill badge-warning">可複選</span>
                    </label>
                </div>
                <div class="qa-box">
                    <div class="form-check">
                        <input type="checkbox" name="C-7-H[]" id="3-7-H-1" value="1" class="form-check-input" :disabled="q3_7==1||q3_7_F!=1">
                        <label class="form-check-label" for="3-7-H-1">
                            ①特休
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-7-H[]" id="3-7-H-2" value="2" class="form-check-input" :disabled="q3_7==1||q3_7_F!=1">
                        <label class="form-check-label" for="3-7-H-2">
                            ②事假
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-7-H[]" id="3-7-H-3" value="3" class="form-check-input" :disabled="q3_7==1||q3_7_F!=1">
                        <label class="form-check-label" for="3-7-H-3">
                            ③病假
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="C-7-H[]" id="3-7-H-4" value="4" class="form-check-input" :disabled="q3_7==1||q3_7_F!=1">
                        <label class="form-check-label" for="3-7-H-4">
                            ④其他
                        </label>
                        <input name="C-7-I" type="text" class="form-control" placeholder="請說明" :disabled="q3_7==1||q3_7_F!=1">
                    </div>

                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-F" id="3-7-F-2" value="2" class="form-check-input" :disabled="q3_7==1" v-model="q3_7_F" ref="q3_7_F">
                    <label class="form-check-label" for="3-7-F-2">
                        (2)業務繁忙，無法提供
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-F" id="3-7-F-3" value="3" class="form-check-input" :disabled="q3_7==1" v-model="q3_7_F" ref="q3_7_F">
                    <label class="form-check-label" for="3-7-F-3">
                        (3)按日或按時計薪員工可調整工作時間陪產檢及陪產
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-F" id="3-7-F-4" value="4" class="form-check-input" :disabled="q3_7==1" v-model="q3_7_F" ref="q3_7_F">
                    <label class="form-check-label" for="3-7-F-4">
                        (4)公司為家族企業可自行放假陪產
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-F" id="3-7-F-5" value="5" class="form-check-input" :disabled="q3_7==1" v-model="q3_7_F" ref="q3_7_F">
                    <label class="form-check-label" for="3-7-F-5">
                        (5)不知道有此規定
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-7-F" id="3-7-F-6" value="6" class="form-check-input" :disabled="q3_7==1" v-model="q3_7_F" ref="q3_7_F">
                    <label class="form-check-label" for="3-7-F-6">
                        (6)其他
                    </label>
                    <input name="C-7-G" type="text" class="form-control" placeholder="請說明" :disabled="q3_7==1">
                </div>
            </div>
        </div>
        <!-- 3-7 -->
        <!-- 3-8 -->
        <div class="col-12">
            <h3>八、請問貴單位(公司)若有員工子女未滿2歲須親自哺(集)乳者申請，會不會同意員工申請或使用「哺(集)乳時間」？</h3>
            <small>(性別工作平等法第18條：子女未滿2歲須受僱者親自哺(集)乳者，除規定之休息時間外，雇主應每日另給哺(集)乳時間60分鐘。若延長工作時間達1小時以上者，應給予哺(集)乳時間30分鐘。前項哺(集)乳時間，視為工作時間。)</small>
            <div class="form-check">
                <input type="radio" name="C-8" id="3-8-1" value="1" class="form-check-input" required v-model="q3_8" ref="q3_8">
                <label class="form-check-label" for="3-8-1">
                    1.會
                </label>
            </div>
            <div class="qa-box">
                <h4>A</h4>
                <div class="form-check">
                    <input type="radio" name="C-8-A" id="3-8-A-1" value="1" class="form-check-input" :required="q3_8==1" :disabled="q3_8==2" v-model="q3_8_A" ref="q3_8_A">
                    <label class="form-check-label" for="3-8-A-1">
                      (1)會規定哺(集)乳時間，每日提供「哺(集)乳時間」
                        <input name="C-8-C" min="1" max="10" type="number" class="input-inline" :disabled="q3_8==2||q3_8_A!=1" :required="q3_8==1&&q3_8_A==1">
                        次；每次
                        <input name="C-8-D" min="10" max="60" type="number" class="input-inline" :disabled="q3_8==2||q3_8_A!=1" :required="q3_8==1&&q3_8_A==1">
                        分鐘
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input type="radio" name="C-8-A" id="3-8-A-2" value="2" class="form-check-input" :disabled="q3_8==2" v-model="q3_8_A" ref="q3_8_A">
                    <label class="form-check-label" for="3-8-A-2">
                      (2)不會規定哺(集)乳時間
                    </label>
                </div>
                <h4>B.請問最近一年(110年10月至111年9月)內有沒有員工申請或使用此措施？</h4>
                <div class="form-check">
                    <input type="radio" name="C-8-B" id="3-8-B-1" value="1" class="form-check-input" :required="q3_8==1" :disabled="q3_8==2" v-model="q3_8_B" ref="q3_8_B">
                    <label class="form-check-label" for="3-8-B-1">
                        (1)有，
                        <input name="C-8-E" min="1" max="10000" type="number" class="input-inline" :disabled="q3_8==2||q3_8_B!=1" :required="q3_8==1&&q3_8_B==1">人申請或使用該措施
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-8-B" id="3-8-B-2" value="2" class="form-check-input" :disabled="q3_8==2" v-model="q3_8_B" ref="q3_8_B">
                    <label class="form-check-label" for="3-8-B-2">
                        (2)沒有
                    </label>
                </div>
            </div>
            <div class="form-check">
                <input type="radio" name="C-8" id="3-8-2" value="2" class="form-check-input" v-model="q3_8" ref="q3_8">
                <label class="form-check-label" for="3-8-2">
                    2.不會，主要原因為：<span class="badge badge-pill badge-warning">單選</span>
                </label>
            </div>
            <div class="qa-box">
                <div class="form-check">
                    <input type="radio" name="C-8-F" id="3-8-F-1" value="1" class="form-check-input"
                    :required="q3_8==2" :disabled="q3_8==1">
                    <label class="form-check-label" for="3-8-F-1">
                        (1)員工可用休息時間替代
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-8-F" id="3-8-F-2" value="2" class="form-check-input" :disabled="q3_8==1">
                    <label class="form-check-label" for="3-8-F-2">
                        (2)業務繁忙，無法提供
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-8-F" id="3-8-F-3" value="3" class="form-check-input" :disabled="q3_8==1">
                    <label class="form-check-label" for="3-8-F-3">
                        (3)公司為家族企業可自行調整工作時間哺(集)乳
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-8-F" id="3-8-F-4" value="4" class="form-check-input" :disabled="q3_8==1">
                    <label class="form-check-label" for="3-8-F-4">
                        (4)不知道有此規定
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="C-8-F" id="3-8-F-5" value="5" class="form-check-input" :disabled="q3_8==1">
                    <label class="form-check-label" for="3-8-F-5">
                        (5)其他
                    </label>
                    <input name="C-8-G" type="text" class="form-control" placeholder="請說明" :disabled="q3_8==1">
                </div>
            </div>
        </div>
        <!-- 3-8 -->
      </div>
      <!-- 頁碼+按鈕 -->
      @include('mixin.section-footer',['current'=>3])
  </form>
</main>
@include('mixin.footer')
<script src="js/page3.js?v={{ $assets_version }}"></script>
<script>
  $(function(){
    var text = ['C-1-E','C-1-H','C-1-I','C-2-B','C-3-D','C-3-E',
    'C-4_1-E','C-4_1-I','C-4_1-G','C-4_2-D','C-4_2-E',
    'C-5-D','C-5-E','C-6-I','C-6-J','C-6-K',"C-6-L",
    "C-6-M","C-7-E","C-7-I","C-7-G","C-8-G"];
    makeTextRequired(text)
  })
</script>
@endsection
