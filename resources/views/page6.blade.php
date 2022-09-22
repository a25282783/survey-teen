@extends('layouts.app')
@section('content')
@include('mixin.header')
<style>
  .form-group{
    display: flex;
  }
  .qa-box{
    display: flex;
    flex-direction: row;
  }
  .form-check{
    margin-right: 0.7rem;
  }
</style>
<main class="container">
  <form id="form" action="{{ route('finish') }}" method="POST" onsubmit="return checkForm()">
    @csrf
      <h2>伍、僱用管理概況</h2>
      <div class="row" id="app">
          <div class="col-12">
              <!-- 5-1 -->
              <h3>一、請問貴單位(公司)對以下各職類之錄用情形：</h3>
              <h4>1.管理職</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-1" id="5-1-1-1" value="1" required>
                          <label class="form-check-label" for="5-1-1-1">
                              (1)僅用女性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-1" id="5-1-1-2" value="2">
                          <label class="form-check-label" for="5-1-1-2">
                              (2)僅用男性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-1" id="5-1-1-3" value="3">
                          <label class="form-check-label" for="5-1-1-3">
                              (3)男女都會錄用
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-1" id="5-1-1-4" value="4">
                          <label class="form-check-label" for="5-1-1-4">
                              (4)沒有此職務
                          </label>
                      </div>
                  </div>
              </div>
              <h4>2.事務職</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-2" id="5-1-2-1" value="1" required>
                          <label class="form-check-label" for="5-1-2-1">
                              (1)僅用女性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-2" id="5-1-2-2" value="2">
                          <label class="form-check-label" for="5-1-2-2">
                              (2)僅用男性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-2" id="5-1-2-3" value="3">
                          <label class="form-check-label" for="5-1-2-3">
                              (3)男女都會錄用
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-2" id="5-1-2-4" value="4">
                          <label class="form-check-label" for="5-1-2-4">
                              (4)沒有此職務
                          </label>
                      </div>
                  </div>
              </div>
              <h4>3.銷售職</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-3" id="5-1-3-1" value="1" required>
                          <label class="form-check-label" for="5-1-3-1">
                              (1)僅用女性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-3" id="5-1-3-2" value="2">
                          <label class="form-check-label" for="5-1-3-2">
                              (2)僅用男性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-3" id="5-1-3-3" value="3">
                          <label class="form-check-label" for="5-1-3-3">
                              (3)男女都會錄用
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-3" id="5-1-3-4" value="4">
                          <label class="form-check-label" for="5-1-3-4">
                              (4)沒有此職務
                          </label>
                      </div>
                  </div>
              </div>
              <h4>4.專業技術職</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-4" id="5-1-4-1" value="1" required>
                          <label class="form-check-label" for="5-1-4-1">
                              (1)僅用女性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-4" id="5-1-4-2" value="2">
                          <label class="form-check-label" for="5-1-4-2">
                              (2)僅用男性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-4" id="5-1-4-3" value="3">
                          <label class="form-check-label" for="5-1-4-3">
                              (3)男女都會錄用
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-4" id="5-1-4-4" value="4">
                          <label class="form-check-label" for="5-1-4-4">
                              (4)沒有此職務
                          </label>
                      </div>
                  </div>
              </div>
              <h4>5.危險及耗體力工作</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-5" id="5-1-5-1" value="1" required>
                          <label class="form-check-label" for="5-1-5-1">
                              (1)僅用女性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-5" id="5-1-5-2" value="2">
                          <label class="form-check-label" for="5-1-5-2">
                              (2)僅用男性
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-5" id="5-1-5-3" value="3">
                          <label class="form-check-label" for="5-1-5-3">
                              (3)男女都會錄用
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-1-5" id="5-1-5-4" value="4">
                          <label class="form-check-label" for="5-1-5-4">
                              (4)沒有此職務
                          </label>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12" v-show="onlymale">
              <!-- 5-2 -->
              <small >（於問項伍、一之任何職類勾選 <b >「僅用男性」</b>者才需回答本問項）</small>
              <h3>二、請問貴單位(公司)對上列各職類僅錄用男性的主要原因為何？<span class="badge badge-pill badge-warning">單選</span></h3>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-2" id="5-2-1" value="1">
                  <label class="form-check-label" for="5-2-1">
                      1.無女性應徵
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-2" id="5-2-2" value="2">
                  <label class="form-check-label" for="5-2-2">
                      2.雖有女性應徵，惟未能錄用
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-2" id="5-2-3" value="3">
                  <label class="form-check-label" for="5-2-3">
                      3.雖有女性應徵，單位(公司)內部未做成決定前中途退出
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-2" id="5-2-4" value="4">
                  <label class="form-check-label" for="5-2-4">
                      4.雖有女性錄取，但未應聘或事後離退只剩男性
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-2" id="5-2-5" value="5">
                  <label class="form-check-label" for="5-2-5">
                      5.部分職務必須處理重物或具有危險性，女性員工不適合擔任
                  </label>
              </div>
              <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="E-2" id="5-2-6" value="6">
                  <label class="form-check-label" for="5-2-6">
                      6.其他
                  </label>
                  <input name="E-2-A" type="text" class="form-control" placeholder="請說明">
              </div>
          </div>
          <div class="col-12" v-show="onlyfemale">
              <!-- 5-3 -->
              <small >（於問項伍、一之任何職類勾選 <b >「僅用女性」</b>者才需回答本問項）</small>
              <h3>三、請問貴單位(公司)對上列各職類僅錄用女性的主要原因為何？<span class="badge badge-pill badge-warning">單選</span></h3>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-3" id="5-3-1" value="1">
                  <label class="form-check-label" for="5-3-1">
                      1.無男性應徵
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-3" id="5-3-2" value="2">
                  <label class="form-check-label" for="5-3-2">
                      2.雖有男性應徵，惟未能錄用
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-3" id="5-3-3" value="3">
                  <label class="form-check-label" for="5-3-3">
                      3.雖有男性應徵，單位(公司)內部未做成決定前中途退出
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-3" id="5-3-4" value="4">
                  <label class="form-check-label" for="5-3-4">
                      4.雖有男性錄取，但未應聘或事後離退只剩女性
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="E-3" id="5-3-5" value="5">
                  <label class="form-check-label" for="5-3-5">
                      5.部分職務男性員工不適合擔任
                  </label>
              </div>
              <div class="form-check mb-2">
                  <input class="form-check-input" type="radio" name="E-3" id="5-3-6" value="6">
                  <label class="form-check-label" for="5-3-6">
                      6.其他
                  </label>
                  <input name="E-3-A" type="text" class="form-control" placeholder="請說明">
              </div>
          </div>
          <div class="col-12">
              <!-- 5-4 -->
              <h3>四、請問貴單位(公司)辦理下列各項業務時，對於同職務者會不會有<b >「性別」</b>的考量？</h3>
              <h4>1. 工作分配</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-1" id="5-4-1-1" value="1" required>
                          <label class="form-check-label" for="5-4-1-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-1" id="5-4-1-2" value="2">
                          <label class="form-check-label" for="5-4-1-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>2. 薪資給付標準</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-2" id="5-4-2-1" value="1" required>
                          <label class="form-check-label" for="5-4-2-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-2" id="5-4-2-2" value="2">
                          <label class="form-check-label" for="5-4-2-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>3. 調薪幅度</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-3" id="5-4-3-1" value="1" required>
                          <label class="form-check-label" for="5-4-3-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-3" id="5-4-3-2" value="2">
                          <label class="form-check-label" for="5-4-3-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>4. 考核(考績或獎金)</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-4" id="5-4-4-1" value="1" required>
                          <label class="form-check-label" for="5-4-4-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-4" id="5-4-4-2" value="2">
                          <label class="form-check-label" for="5-4-4-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>5. 陞遷</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-5" id="5-4-5-1" value="1" required>
                          <label class="form-check-label" for="5-4-5-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-5" id="5-4-5-2" value="2">
                          <label class="form-check-label" for="5-4-5-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>6. 訓練、進修</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-6" id="5-4-6-1" value="1" required>
                          <label class="form-check-label" for="5-4-6-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-6" id="5-4-6-2" value="2">
                          <label class="form-check-label" for="5-4-6-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>7. 資遣、離職或解僱</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-7" id="5-4-7-1" value="1" required>
                          <label class="form-check-label" for="5-4-7-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-7" id="5-4-7-2" value="2">
                          <label class="form-check-label" for="5-4-7-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>8. 員工福利措施之提供</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-8" id="5-4-8-1" value="1" required>
                          <label class="form-check-label" for="5-4-8-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-8" id="5-4-8-2" value="2">
                          <label class="form-check-label" for="5-4-8-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>9. 育嬰留職停薪</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-9" id="5-4-9-1" value="1" required>
                          <label class="form-check-label" for="5-4-9-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-9" id="5-4-9-2" value="2">
                          <label class="form-check-label" for="5-4-9-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>10.退休權利</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-10" id="5-4-10-1" value="1" required>
                          <label class="form-check-label" for="5-4-10-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-10" id="5-4-10-2" value="2">
                          <label class="form-check-label" for="5-4-10-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>11.僱用招募、甄試、進用</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-11" id="5-4-11-1" value="1" required>
                          <label class="form-check-label" for="5-4-11-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-4-11" id="5-4-11-2" value="2">
                          <label class="form-check-label" for="5-4-11-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12">
              <!-- 5-5 -->
              <h3>五、請問貴單位(公司)辦理下列各項業務時，對於同職務者會不會有<b >「跨性別」(自我性別認同與其生理性別不同)</b>或<b >「性傾向」</b>的考量？</h3>
              <h4>1. 工作分配</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-1" id="5-5-1-1" value="1" required>
                          <label class="form-check-label" for="5-5-1-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-1" id="5-5-1-2" value="2">
                          <label class="form-check-label" for="5-5-1-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>

              <h4>2. 薪資給付標準</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-2" id="5-5-2-1" value="1" required>
                          <label class="form-check-label" for="5-5-2-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-2" id="5-5-2-2" value="2">
                          <label class="form-check-label" for="5-5-2-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>3. 調薪幅度</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-3" id="5-5-3-1" value="1" required>
                          <label class="form-check-label" for="5-5-3-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-3" id="5-5-3-2" value="2">
                          <label class="form-check-label" for="5-5-3-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>4. 考核(考績或獎金)</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-4" id="5-5-4-1" value="1" required>
                          <label class="form-check-label" for="5-5-4-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-4" id="5-5-4-2" value="2">
                          <label class="form-check-label" for="5-5-4-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>5. 陞遷</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-5" id="5-5-5-1" value="1" required>
                          <label class="form-check-label" for="5-5-5-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-5" id="5-5-5-2" value="2" >
                          <label class="form-check-label" for="5-5-5-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>6. 訓練、進修</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-6" id="5-5-6-1" value="1" required>
                          <label class="form-check-label" for="5-5-6-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-6" id="5-5-6-2" value="2">
                          <label class="form-check-label" for="5-5-6-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>7. 資遣、離職或解僱</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-7" id="5-5-7-1" value="1" required>
                          <label class="form-check-label" for="5-5-7-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-7" id="5-5-7-2" value="2">
                          <label class="form-check-label" for="5-5-7-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>8. 員工福利措施之提供</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-8" id="5-5-8-1" value="1" required>
                          <label class="form-check-label" for="5-5-8-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-8" id="5-5-8-2" value="2">
                          <label class="form-check-label" for="5-5-8-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>9. 育嬰留職停薪</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-9" id="5-5-9-1" value="1" required>
                          <label class="form-check-label" for="5-5-9-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-9" id="5-5-9-2" value="2">
                          <label class="form-check-label" for="5-5-9-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>10.退休權利</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-10" id="5-5-10-1" value="1" required>
                          <label class="form-check-label" for="5-5-10-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-10" id="5-5-10-2" value="2">
                          <label class="form-check-label" for="5-5-10-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>11.僱用招募、甄試、進用</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-11" id="5-5-11-1" value="1" required>
                          <label class="form-check-label" for="5-5-11-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-5-11" id="5-5-11-2" value="2">
                          <label class="form-check-label" for="5-5-11-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-12">
              <!-- 5-6 -->
              <h3>六、請問貴單位(公司)僱用招募、甄試、進用新進人員或對員工辦理配置、考績、陞遷、提供教育訓練、福利措施、退休、資遣等各項業務時，會不會有下列因素的考量？</h3>
              <h4>1. 種族</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-1" id="5-6-1-1" value="1" required>
                          <label class="form-check-label" for="5-6-1-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-1" id="5-6-1-2" value="2">
                          <label class="form-check-label" for="5-6-1-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>2. 階級(含職位區隔)</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-2" id="5-6-2-1" value="1" required>
                          <label class="form-check-label" for="5-6-2-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-2" id="5-6-2-2" value="2">
                          <label class="form-check-label" for="5-6-2-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>3. 語言</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-3" id="5-6-3-1" value="1" required>
                          <label class="form-check-label" for="5-6-3-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-3" id="5-6-3-2" value="2">
                          <label class="form-check-label" for="5-6-3-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>4. 思想</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio"  name="E-6-4" id="5-6-4-1" value="1" required>
                          <label class="form-check-label" for="5-6-4-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-4" id="5-6-4-2" value="2">
                          <label class="form-check-label" for="5-6-4-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>5. 宗教</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-5" id="5-6-5-1" value="1" required>
                          <label class="form-check-label" for="5-6-5-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-5" id="5-6-5-2" value="2">
                          <label class="form-check-label" for="5-6-5-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>6. 黨派</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-6" id="5-6-6-1" value="1" required>
                          <label class="form-check-label" for="5-6-6-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-6" id="5-6-6-2" value="2">
                          <label class="form-check-label" for="5-6-6-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>7. 籍貫</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-7" id="5-6-7-1" value="1" required>
                          <label class="form-check-label" for="5-6-7-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-7" id="5-6-7-2" value="2">
                          <label class="form-check-label" for="5-6-7-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>8. 出生地</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-8" id="5-6-8-1" value="1" required>
                          <label class="form-check-label" for="5-6-8-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-8" id="5-6-8-2" value="2">
                          <label class="form-check-label" for="5-6-8-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>9. 年齡</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-9" id="5-6-9-1" value="1" required>
                          <label class="form-check-label" for="5-6-9-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-9" id="5-6-9-2" value="2">
                          <label class="form-check-label" for="5-6-9-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>10.婚姻</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-10" id="5-6-10-1" value="1" required>
                          <label class="form-check-label" for="5-6-10-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-10" id="5-6-10-2" value="2">
                          <label class="form-check-label" for="5-6-10-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>11.容貌(含五官、身高及體重)</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-11" id="5-6-11-1" value="1" required>
                          <label class="form-check-label" for="5-6-11-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-11" id="5-6-11-2" value="2">
                          <label class="form-check-label" for="5-6-11-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>12.身心障礙</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-12" id="5-6-12-1" value="1" required>
                          <label class="form-check-label" for="5-6-12-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-12" id="5-6-12-2" value="2">
                          <label class="form-check-label" for="5-6-12-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>13.曾為工會會員身分</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-13" id="5-6-13-1" value="1" required>
                          <label class="form-check-label" for="5-6-13-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-13" id="5-6-13-2" value="2">
                          <label class="form-check-label" for="5-6-13-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>14.星座</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-14" id="5-6-14-1" value="1" required>
                          <label class="form-check-label" for="5-6-14-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-14" id="5-6-14-2" value="2">
                          <label class="form-check-label" for="5-6-14-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
              <h4>15.血型</h4>
              <div class="form-group">
                  <div class="qa-box">
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-15" id="5-6-15-1" value="1" required>
                          <label class="form-check-label" for="5-6-15-1">
                              (1)會
                          </label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="E-6-15" id="5-6-15-2" value="2">
                          <label class="form-check-label" for="5-6-15-2">
                              (2)不會
                          </label>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- 頁碼+按鈕 -->
      @include('mixin.section-footer',['current'=>6])
  </form>
</main>
@include('mixin.footer')
<script src="js/page6.js?v={{ $assets_version }}"></script>
<script>
  $(function(){
    var text = ["E-2-A","E-3-A"];
    makeTextRequired(text)
  })
</script>
@endsection
