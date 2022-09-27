<!-- 頁碼+按鈕 -->
<section class="form-footer">
  <p class="form-page">
      第 <span id="current">{{ $current }}</span> 頁，共 4 頁
  </p>
  <div class="form-btn">
      @if (request()->path() != 'page1')
      <button id="go-back" type="button" class="btn btn-info footer-btn">上一頁</button>
      @endif
      <button type="reset" class="btn btn-info footer-btn">清除全部</button>

      @if (request()->path() == 'page6')
      <button type="submit" class="btn btn-info footer-btn">填寫完畢，確定送出(無法再修正與檢視)</button>
      @else
      <button type="submit" class="btn btn-info footer-btn">下一頁</button>
      @endif
  </div>
</section>
