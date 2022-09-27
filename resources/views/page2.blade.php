@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  <form id="form" action="{{ route('page3') }}" method="POST"  onsubmit="return checkForm()">
    @csrf
    <h2>貳、初入職場尋職歷程及初次工作經驗
      <span class="text-danger">(請以第一次工作之經驗填寫，學生時期打工不算)</span>
    </h2>
    <div class="row">
      <!-- B_1 -->
      <div class="col-12">
        <h3>一、請問您初次求職前有沒有做準備？</h3>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
              <input type="radio" name="B_1" value="1" id="B_1_v1" required class="form-check-input" 
              v-model="B_1" ref="B_1">
              <label class="form-check-label" for="B_1_v1">
                  1.有，做過哪些準備？<span class="badge badge-pill badge-warning">可複選</span>
              </label>
              <!-- B_1_1[] -->
              <div class="qa-box">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_1_1[]" id="B_1_1_v1" value="1"
                  :required="B_1==1 && B_1_1.length<1"
                  :disabled="B_1!=1" 
                  v-model="B_1_1" ref="B_1_1">
                  <label class="form-check-label" for="B_1_1_v1">
                    (1)增加打工或實習經驗
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_1_1[]" id="B_1_1_v2" value="2"
                  :required="B_1==1 && B_1_1.length<1"
                  :disabled="B_1!=1" 
                  v-model="B_1_1" ref="B_1_1">
                  <label class="form-check-label" for="B_1_1_v2">
                    (2)考取專業證照
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_1_1[]" id="B_1_1_v3" value="3"
                  :required="B_1==1 && B_1_1.length<1"
                  :disabled="B_1!=1" 
                  v-model="B_1_1" ref="B_1_1">
                  <label class="form-check-label" for="B_1_1_v3">
                    (3)做職業興趣分析
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_1_1[]" id="B_1_1_v4" value="4"
                  :required="B_1==1 && B_1_1.length<1"
                  :disabled="B_1!=1" 
                  v-model="B_1_1" ref="B_1_1">
                  <label class="form-check-label" for="B_1_1_v4">
                    (4)找師長、親友諮詢就業方向
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_1_1[]" id="B_1_1_v5" value="5"
                  :required="B_1==1 && B_1_1.length<1"
                  :disabled="B_1!=1" 
                  v-model="B_1_1" ref="B_1_1">
                  <label class="form-check-label" for="B_1_1_v5">
                    (5)參加就業講座
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_1_1[]" id="B_1_1_v6" value="6"
                  :required="B_1==1 && B_1_1.length<1"
                  :disabled="B_1!=1" 
                  v-model="B_1_1" ref="B_1_1">
                  <label class="form-check-label" for="B_1_1_v6">
                    (6)其他(請說明)
                  </label>
                  <input type="text" class="form-control" name="B_1_2" :disabled="B_1!=1">
                </div>
              </div>
            </div>
            <div class="form-check">
              <input type="radio" name="B_1" value="2" id="B_1_v2" class="form-check-input" 
              v-model="B_1" ref="B_1">
              <label class="form-check-label" for="B_1_v2">
                 2.沒有
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="B_1" value="3" id="B_1_v3" class="form-check-input" 
              v-model="B_1" ref="B_1">
              <label class="form-check-label" for="B_1_v3">
                  3.目前仍為學生，且只有打工經驗<span class="text-danger">(跳答第參項第一題)</span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- B_2 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>二、請問您初次尋職時選擇工作考慮的因素有哪些？<span class="badge badge-pill badge-warning">可複選</span></h3>
        <div class="form-gruop">
          <div class="qa-box">
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="1" id="B_2_v1" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v1">
                1.能學以致用的工作
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="2" id="B_2_v2" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v2">
                2.能學習到知識技能
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="3" id="B_2_v3" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v3">
                3.工作穩定性
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="4" id="B_2_v4" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v4">
                4.有發展前景
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="5" id="B_2_v5" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v5">
                5.薪資及福利
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="6" id="B_2_v6" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v6">
                6.通勤方便
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="7" id="B_2_v7" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v7">
                7.符合自己興趣的工作
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="8" id="B_2_v8" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v8">
                8.工作負擔較輕
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="9" id="B_2_v9" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v9">
                9.有挑戰性
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="10" id="B_2_v10" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v10">
                10.有升遷機會
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_2[]" value="11" id="B_2_v11" class="form-check-input"
              :required="B_1!=3&&B_2.length<1" 
              v-model="B_2" ref="B_2">
              <label class="form-check-label" for="B_2_v11">
                11.其他(請說明)
              </label>
              <input type="text" class="form-control" name="B_2_1">
            </div>
          </div>
        </div>
      </div>
      <!-- B_3 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>三、請問您初次尋職有沒有遭遇到困難？</h3>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
              <input type="radio" name="B_3" value="1" id="B_3_v1" class="form-check-input"
              :required="B_1!=3" 
              v-model="B_3" ref="B_3">
              <label class="form-check-label" for="B_3_v1">
                1.有遇到困難，遇到的困難為：<span class="badge badge-pill badge-warning">可複選</span>
              </label>
              <div class="qa-box">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v1" value="1"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v1">
                    (1)求職管道不足
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v2" value="2"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v2">
                    (2)求職面試技巧不足或不會寫履歷
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v3" value="3"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v3">
                    (3)工作內容要求不了解
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v4" value="4"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v4">
                    (4)不知道自己適合做哪方面工作
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v5" value="5"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v5">
                    (5)技能不足
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v6" value="6"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v6">
                    (6)學歷不足
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v7" value="7"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v7">
                    (7)經歷不足
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v8" value="8"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v8">
                    (8)適合的職缺少
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B_3_1[]" id="B_3_1_v9" value="9"
                  :required="B_1!=3&& B_3==1 && B_3_1.length<1"
                  :disabled="B_3!=1" 
                  v-model="B_3_1" ref="B_3_1">
                  <label class="form-check-label" for="B_3_1_v9">
                    (9)其他(請說明)
                  </label>
                  <input type="text" class="form-control" name="B_3_2" :disabled="B_3!=1">
                </div>
              </div>
            </div>
            <div class="form-check">
              <input type="radio" name="B_3" value="2" id="B_3_v2" class="form-check-input"
              v-model="B_3" ref="B_3">
              <label class="form-check-label" for="B_3_v2">
                2.沒有遇到困難
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- B_4 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>四、請問您畢業後，找到的第一份工作花了幾個月。<span class="text-danger">
          (小數點後1位；畢業前即找到工作請填0)  
        </span></h3>
        <div class="form-group">
          <div class="qa-box">
            <input min="0" max="12" step="0.1" class="input-inline" type="number" name="B_4" :required="B_1!=3">
          </div>
        </div>
      </div>
      <!-- B_5 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>五、請問您畢業(含兵役結束)後，在找到第一份工作前，主要在做什麼？</h3>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
              <input type="radio" name="B_5" value="1" id="B_5_v1" class="form-check-input"
              :required="B_1!=3"
              v-model="B_5" ref="B_5">
              <label class="form-check-label" for="B_5_v1">
                1.畢業前即找到工作(含在自家經營場所每週工作15小時以上)
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="B_5" value="2" id="B_5_v2" class="form-check-input"
              :required="B_1!=3"
              v-model="B_5" ref="B_5">
              <label class="form-check-label" for="B_5_v2">
                2.一直在找工作(含準備就業考試)
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="B_5" value="3" id="B_5_v3" class="form-check-input"
              :required="B_1!=3"
              v-model="B_5" ref="B_5">
              <label class="form-check-label" for="B_5_v3">
                3.畢業後未立即找工作，
              </label>
              <div class="qa-box">
                <div class="form-check">
                  <span>
                    (1)請問您是在畢業後
                    <input min="0" max="12" step="0.1" class="input-inline" type="number" name="B_5_1"
                    :required="B_1!=3&&B_5==3"
                    :disabled="B_5!=3">
                    個月(小數點1位)開始找？
                  </span>
                </div>
                <div class="form-check">
                  <span>
                    (2)從畢業至開始找工作之期間，主要從事之活動為：
                    <span class="badge badge-pill badge-warning">可複選</span>
                  </span>
                  <div class="qa-box">
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="1" id="B_5_2_v1" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v1">
                        ①旅遊活動
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="2" id="B_5_2_v2" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v2">
                        ②準備考試(含證照、升學)
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="3" id="B_5_2_v3" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v3">
                        ③短期進修
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="4" id="B_5_2_v4" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v4">
                        ④參加職業訓練
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="5" id="B_5_2_v5" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v5">
                        ⑤在自家經營場所幫忙(每週未滿15小時)
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="6" id="B_5_2_v6" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v6">
                        ⑥照顧家人
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="7" id="B_5_2_v7" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v7">
                        ⑦宅居在家
                      </label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" name="B_5_2[]" value="8" id="B_5_2_v8" class="form-check-input"
                      :required="B_1!=3&&B_5==3&&B_5_2.length<1"
                      :disabled="B_5!=3"
                      v-model="B_5_2" ref="B_5_2">
                      <label class="form-check-label" for="B_5_2_v8">
                        ⑧其他(請說明)
                      </label>
                      <input type="text" name="B_5_3" class="form-control" :disabled="B_5!=3">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- B_6 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>六、請問下列哪些就業資訊對您初次尋職有幫助？<span class="badge badge-pill badge-warning">可複選</span></h3>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
              <input type="checkbox" name="B_6[]" value="1" id="B_6_v1" class="form-check-input"
              :required="B_1!=3&&B_6.length<1"
              v-model="B_6" ref="B_6">
              <label class="form-check-label" for="B_6_v1">
                1.就業市場與情勢分析
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_6[]" value="2" id="B_6_v2" class="form-check-input"
              :required="B_1!=3&&B_6.length<1"
              v-model="B_6" ref="B_6">
              <label class="form-check-label" for="B_6_v2">
                2.面試或求職技巧
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_6[]" value="3" id="B_6_v3" class="form-check-input"
              :required="B_1!=3&&B_6.length<1"
              v-model="B_6" ref="B_6">
              <label class="form-check-label" for="B_6_v3">
                3.熱門行職業介紹
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_6[]" value="4" id="B_6_v4" class="form-check-input"
              :required="B_1!=3&&B_6.length<1"
              v-model="B_6" ref="B_6">
              <label class="form-check-label" for="B_6_v4">
                4.創業資訊
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_6[]" value="5" id="B_6_v5" class="form-check-input"
              :required="B_1!=3&&B_6.length<1"
              v-model="B_6" ref="B_6">
              <label class="form-check-label" for="B_6_v5">
                5.職業訓練訊息
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_6[]" value="6" id="B_6_v6" class="form-check-input"
              :required="B_1!=3&&B_6.length<1"
              v-model="B_6" ref="B_6">
              <label class="form-check-label" for="B_6_v6">
                6.其他(請說明)
              </label>
              <input type="text" class="form-control" name="B_6_1">
            </div>
            <div class="form-check">
              <input type="checkbox" name="B_6[]" value="7" id="B_6_v7" class="form-check-input"
              :required="B_1!=3&&B_6.length<1"
              v-model="B_6" ref="B_6">
              <label class="form-check-label" for="B_6_v7">
                7.都沒有幫助
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- B_7 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>七、請問目前的工作是否是您的第一份工作？</h3>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
              <input type="radio" name="B_7" value="1" id="B_7_v1" class="form-check-input"
              :required="B_1!=3"
              v-model="B_7" ref="B_7">
              <label class="form-check-label" for="B_7_v1">
                1.是<span class="text-danger">(跳答第九題)</span>
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="B_7" value="2" id="B_7_v2" class="form-check-input"
              v-model="B_7" ref="B_7">
              <label class="form-check-label" for="B_7_v2">
                2.不是，第一份工作做了
                <input min="0" type="number" class="input-inline"
                :required="B_7==2"
                :disabled="B_7!=2"
                name="B_7_1"
                >
                年
                <input min="0" max="12" type="number" class="input-inline"
                :required="B_7==2"
                :disabled="B_7!=2"
                name="B_7_2"
                >
                個月
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- B_8 -->
      <div class="col-12" v-show="B_1!=3&&B_7==2">
        <h3>八、請問您第一份工作於應徵時有無提出薪資期望？</h3>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
              <input type="radio" name="B_8" value="1" id="B_8_v1" class="form-check-input"
              :required="B_1!=3&&B_7==2">
              <label class="form-check-label" for="B_8_v1">
                1.有
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="B_8" value="2" id="B_8_v2" class="form-check-input">
              <label class="form-check-label" for="B_8_v2">
                2.沒有
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- B_9 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>九、請問您第一份工作<span class="text-danger">開始時</span>的工作性質是否與現在相同？(工作性質不同指全時/部分工時不同，或一般僱用/派遣人力之不同)</h3>
        <div class="form-group">
          <div class="qa-box">
            <div class="form-check">
              <input type="radio" name="B_9" value="1" id="B_9_v1" class="form-check-input"
              :required="B_1!=3"
              v-model="B_9" ref="B_9">
              <label class="form-check-label" for="B_9_v1">
                1.是<span class="text-danger">(跳答第十一題)</span>
              </label>
            </div>
            <div class="form-check">
              <input type="radio" name="B_9" value="2" id="B_9_v2" class="form-check-input"
              v-model="B_9" ref="B_9">
              <label class="form-check-label" for="B_9_v2">
                2.不是
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- B_10 -->
      <div class="col-12" v-show="B_1!=3&&B_9==2">
        <h3>十、請問您第一份工作開始時的工作性質：</h3>
        <div class="form-group">
          <div class="qa-box">
            <span>(一)全時或部分工時：</span>
            <div class="qa-box">
              <div class="form-check">
                <input type="radio" name="B_10" value="1" id="B_10_v1" class="form-check-input"
                :required="B_1!=3&&B_9==2">
                <label class="form-check-label" for="B_10_v1">
                  1.全時工作
                </label>
              </div>
              <div class="form-check">
                <input type="radio" name="B_10" value="2" id="B_10_v2" class="form-check-input"
                :required="B_1!=3&&B_9==2">
                <label class="form-check-label" for="B_10_v2">
                  2.部分時間工作 (指較場所單位規定全時勞工正常上班時數有相當程度縮短者)
                </label>
              </div>
            </div>
            <span>(二)一般僱用或派遣人力：</span>
            <div class="qa-box">
              <div class="form-check">
                <input type="radio" name="B_10_1" value="1" id="B_10_1_v1" class="form-check-input"
                :required="B_1!=3&&B_9==2">
                <label class="form-check-label" for="B_10_1_v1">
                  1.一般僱用
                </label>
              </div>
              <div class="form-check">
                <input type="radio" name="B_10_1" value="2" id="B_10_1_v2" class="form-check-input"
                :required="B_1!=3&&B_9==2">
                <label class="form-check-label" for="B_10_1_v2">
                  2.派遣人力 (指派遣事業單位與要派單位約定，由派遣事業單位指派所僱用之勞工至要派單位提供勞務，並接受要派單位指揮監督管理之關係。)
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- B_11 -->
      <div class="col-12" v-show="B_1!=3">
        <h3>十一、請問您第一份工作的<span class="text-danger">起薪</span>：</h3>
        <div class="form-group">
          <div class="qa-box">
            <span>1.計薪方式：</span>
            <div class="qa-box">
              <div class="form-check">
                <input type="checkbox" name="B_11[]" value="1" id="B_11_v1" class="form-check-input"
                :required="B_1!=3&&B_11.length<1"
                v-model="B_11" ref="B_11">
                <label class="form-check-label" for="B_11_v1">
                  (1)月薪制(不論出勤日數或時數，每月可以領取固定的金額，而不是指每個月發一次薪水)
                </label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="B_11[]" value="2" id="B_11_v2" class="form-check-input"
                :required="B_1!=3&&B_11.length<1"
                v-model="B_11" ref="B_11">
                <label class="form-check-label" for="B_11_v2">
                  (2)日薪制(指依出勤日數計給薪水)
                </label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="B_11[]" value="3" id="B_11_v3" class="form-check-input"
                :required="B_1!=3&&B_11.length<1"
                v-model="B_11" ref="B_11">
                <label class="form-check-label" for="B_11_v3">
                  (3)時薪制(指依出勤時數計給薪水)
                </label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="B_11[]" value="4" id="B_11_v4" class="form-check-input"
                :required="B_1!=3&&B_11.length<1"
                v-model="B_11" ref="B_11">
                <label class="form-check-label" for="B_11_v4">
                  (4)按件計酬(依完成的件數計給薪水)
                </label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="B_11[]" value="5" id="B_11_v5" class="form-check-input"
                :required="B_1!=3&&B_11.length<1"
                v-model="B_11" ref="B_11">
                <label class="form-check-label" for="B_11_v5">
                  (5)底薪加業績獎金(指除有約定固定底薪外，會再依績效或件數發給獎金)
                </label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="B_11[]" value="6" id="B_11_v6" class="form-check-input"
                :required="B_1!=3&&B_11.length<1"
                v-model="B_11" ref="B_11">
                <label class="form-check-label" for="B_11_v6">
                  (6)無底薪之績效制 (指無約定固定底薪，僅依績效發給薪水或獎金)
                </label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="B_11[]" value="7" id="B_11_v7" class="form-check-input"
                :required="B_1!=3&&B_11.length<1"
                v-model="B_11" ref="B_11">
                <label class="form-check-label" for="B_11_v7">
                  (7)其他(請說明)
                </label>
                <input type="text" name="B_11_1" class="form-control">
              </div>
            </div>
            <span>2.平均每月薪資為
              <input min="0" class="input-inline" type="number" name="B_11_2" :required="B_1!=3">
              元(指受僱人員經常性收入，如本薪、加班費、固定津貼及獎金，非月薪制者，請換算成平均每月之薪資。)</span>
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
  $(function(){
    var text = ['B_1_2', 'B_2_1', 'B_3_2', 'B_5_3', 'B_6_1', 'B_11_1'];
    makeTextRequired(text)
  })
</script>
@endsection
