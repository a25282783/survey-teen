@extends('layouts.app')
@section('content')
@include('mixin.header')
<main class="container" id="app">
  <form id="form" action="{{ route('page5') }}" method="POST" onsubmit="return checkForm()">
      @csrf
      <h2>肆、政府施政措施意見</h2>
      <div class="row">
        <div class="col-12">
            <h3 style="background-color: transparent;">一、請問您是否知道勞動部勞動力發展署所提供之各項就業服務？
            </h3>
            <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">1. 公立就業服務機構(就業中心/就業服務站/就業服務台)登記求職服務</h4>
            <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="D_1" id="D_1_v1" value="1" required 
                        v-model="D_1" ref="D_1">
                        <label class="form-check-label" for="D_1_v1">
                            (1)知道，有沒有利用這項管道求職？
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="D_1_1" id="D_1_1_v1" value="1"
                                :required="D_1==1"
                                :disabled="D_1!=1"
                                v-model="D_1_1" ref="D_1_1">
                                <label class="form-check-label" for="D_1_1_v1">
                                    ①沒有
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="D_1_1" id="D_1_1_v2" value="2"
                                :disabled="D_1!=1"
                                v-model="D_1_1" ref="D_1_1">
                                <label class="form-check-label" for="D_1_1_v2">
                                    ②有，有沒有找到工作？
                                </label>
                                <div class="qa-box">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="D_1_2" id="D_1_2_v1" value="1"
                                        :required="D_1_1==2"
                                        :disabled="D_1_1!=2">
                                        <label class="form-check-label" for="D_1_2_v1">
                                            A.有
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="D_1_2" id="D_1_2_v2" value="2"
                                        :disabled="D_1_1!=2">
                                        <label class="form-check-label" for="D_1_2_v2">
                                            B.沒有
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="D_1" id="D_1_v2" value="2" 
                        v-model="D_1" ref="D_1">
                        <label class="form-check-label" for="D_1_v2">
                            (2)不知道
                        </label>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">2.『台灣就業通www.taiwanjobs.gov.tw』登記求職服務</h4>
            <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="D_2" id="D_2_v1" value="1" required 
                        v-model="D_2" ref="D_2">
                        <label class="form-check-label" for="D_2_v1">
                            (1)知道，有沒有利用這項管道求職？
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="D_2_1" id="D_2_1_v1" value="1"
                                :required="D_2==1"
                                :disabled="D_2!=1"
                                v-model="D_2_1" ref="D_2_1">
                                <label class="form-check-label" for="D_2_1_v1">
                                    ①沒有
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="D_2_1" id="D_2_1_v2" value="2"
                                :disabled="D_2!=1"
                                v-model="D_2_1" ref="D_2_1">
                                <label class="form-check-label" for="D_2_1_v2">
                                    ②有，有沒有找到工作？
                                </label>
                                <div class="qa-box">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="D_2_2" id="D_2_2_v1" value="1"
                                        :required="D_2_1==2"
                                        :disabled="D_2_1!=2">
                                        <label class="form-check-label" for="D_2_2_v1">
                                            A.有
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="D_2_2" id="D_2_2_v2" value="2"
                                        :disabled="D_2_1!=2">
                                        <label class="form-check-label" for="D_2_2_v2">
                                            B.沒有
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="D_2" id="D_2_v2" value="2" 
                        v-model="D_2" ref="D_2">
                        <label class="form-check-label" for="D_2_v2">
                            (2)不知道
                        </label>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 1rem;background-color: #b2d7fb;padding: 0.5rem;border-radius: 4px;">3.『就業博覽會』現場徵才活動</h4>
            <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="D_3" id="D_3_v1" value="1" required 
                        v-model="D_3" ref="D_3">
                        <label class="form-check-label" for="D_3_v1">
                            (1)知道，有沒有利用這項管道求職？
                        </label>
                        <div class="qa-box">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="D_3_1" id="D_3_1_v1" value="1"
                                :required="D_3==1"
                                :disabled="D_3!=1"
                                v-model="D_3_1" ref="D_3_1">
                                <label class="form-check-label" for="D_3_1_v1">
                                    ①沒有
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="D_3_1" id="D_3_1_v2" value="2"
                                :disabled="D_3!=1"
                                v-model="D_3_1" ref="D_3_1">
                                <label class="form-check-label" for="D_3_1_v2">
                                    ②有，有沒有找到工作？
                                </label>
                                <div class="qa-box">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="D_3_2" id="D_3_2_v1" value="1"
                                        :required="D_3_1==2"
                                        :disabled="D_3_1!=2">
                                        <label class="form-check-label" for="D_3_2_v1">
                                            A.有
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="D_3_2" id="D_3_2_v2" value="2"
                                        :disabled="D_3_1!=2">
                                        <label class="form-check-label" for="D_3_2_v2">
                                            B.沒有
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="D_3" id="D_3_v2" value="2" 
                        v-model="D_3" ref="D_3">
                        <label class="form-check-label" for="D_3_v2">
                            (2)不知道
                        </label>
                    </div>
                </div>
            </div>

            <h3>二、請問您建議或希望政府提供哪些服務以促進青年就業？<span class="badge badge-pill badge-warning">可複選</span>
            </h3>
            <div class="form-group">
                <div class="qa-box">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v1" value="1"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v1">
                            1.提供就業服務及資訊
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v2" value="2"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v2">
                            2.辦理徵才活動
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v3" value="3"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v3">
                            3.提供面試技巧及產業趨勢等研習課程
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v4" value="4"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v4">
                            4.提供法令宣導及工作權益等說明課程
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v5" value="5"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v5">
                            5.辦理專業技能訓練
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v6" value="6"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v6">
                            6.結合學校辦理在學青年職場見習
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v7" value="7"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v7">
                            7.辦理畢業青年職場見習
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v8" value="8"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v8">
                            8.提供職涯諮詢或職業心理測驗
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v9" value="9"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v9">
                            9.提供創業資訊及課程輔導
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v10" value="10"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v10">
                            10.提供創業貸款
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v11" value="11"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v11">
                            11.提供成功案例以供學習
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v12" value="12"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v12">
                            12.其他建議(請說明)
                        </label>
                        <input type="text" class="form-control" name="D_5_1">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="D_5[]" id="D_5_v13" value="13"
                        :required="D_5.length<1"
                        v-model="D_5" ref="D_5">
                        <label class="form-check-label" for="D_5_v13">
                            13.沒有意見
                        </label>
                    </div>
                </div>
            </div>
        </div>
      </div>
      @include('mixin.section-footer',['current'=>4])
  </form>
</main>
@include('mixin.footer')
<script src="js/page4.js?v={{ $assets_version }}"></script>
<script>
  $(function(){
    var text = ['D_5_1'];
    makeTextRequired(text)
  })
</script>
@endsection
