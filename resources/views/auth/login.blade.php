@extends('layouts.app')
@section('content')
<style>
  .invalid-feedback{
    display: block !important;
    font-size: 1rem !important;
  }
</style>
<body class="index-body d-flex flex-column" style="min-height: 100vh">
  <div class="index-wrap">
      <div class="content">
          <img src="images/統計調查logo.png" alt="統計調查logo">
          <h1 class="index-title">勞動部<br>15-29歲青年勞工就業狀況調查問卷</h1>
          <span>資料時間:中華民國111年10月</span>
          <br>
          <div class="info-box text-left">
            <span>為了解事業單位對15-29歲青年勞工就業狀況調查問卷實施現況，作為推動相關業務及制定政策之參考，特委託故鄉市場調查股份有限公司辦理「15-29歲青年勞工就業狀況調查問卷」，敬請惠予撥冗填答。請於收到調查表後<span class="text-danger">一星期內</span>填妥調查表。</span>
            <br>
            <span>若對調查作業有任何疑義，請電洽:故鄉市場調查股份有限公司(02)2571-6999 分機21 吳小姐/22 張小姐或勞動部統計處(02)8995-6866 分機2905/2906/2904。
            </span>
            <br>
            <span>
              請填入帳號、密碼可進入正式問卷，帳號、密碼位於紙本問卷
              <span class="text-danger">QR Code旁，若遺失或未收到調查表，請電洽</span>
              張小姐查詢。
            </span>
          </div>
          <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">帳號</span>
                </div>
                <input name="name" type="text" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">密碼</span>
                </div>
                <input name="password" type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-info btn-login">登入</button>
          </form>
      </div>
  </div>
  <footer class="footer">
    <ul class="footer-info">
        <li>核定機關：行政院主計總處 ｜ </li>
        <li>核定文號：主普管字第1110400960 號 ｜ </li>
        <li>調查類別：一般統計調查 ｜ </li>
        <li>有效期間：至民國111 年12月底止</li>
    </ul>
    <ul class="footer-info">
      <li>1. 統計法第15條規定「統計調查之受查者無論為個人、住戶、事業單位、機關或團體，均應依限據實答覆」。</li>
    </ul>
    <ul class="footer-info">
      <li>2. 本表所填資料，僅供整體決策與統計分析應用，個別資料絕對保密，如有損害受訪者權益時，依法應予議處</li>
    </ul>
  </footer>
</body>
@endsection
