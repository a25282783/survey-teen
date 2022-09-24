@extends('layouts.app')
@section('content')
<body class="index-body d-flex flex-column" style="min-height: 100vh">
  <div class="index-wrap">
      <div class="content">
          <img src="images/統計調查logo.png" alt="統計調查logo">
          <h1 class="index-title">問卷到此結束，感謝您的填答</h1>
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
