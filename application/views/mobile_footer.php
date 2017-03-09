<div class="black"></div>
<footer>
  <div class="footer">
    Copyright © 2012 - 2016 中盛溯源生物科技有限公司.<br>All rights reserved. 皖ICP备16011195号
  </div>
</footer>

<script>
  var mySwiper = new Swiper('#swiper1', {
    paginationClickable: true,
    paginationBulletRender: function (index, className) {
      return '<p class="' + className + '"><span></span></p>';
    },
    autoplay: 5000//可选选项，自动滑动
  });
  var mySwiper = new Swiper('#swiper2', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    paginationClickable: true,
    paginationBulletRender: function (index, className) {
      return '<p class="' + className + '"><span></span></p>';
    },
    autoplay: 5000//可选选项，自动滑动
  });
  var mySwiper = new Swiper('#swiper3', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    paginationClickable: true,
    paginationBulletRender: function (index, className) {
      return '<p class="' + className + '"><span></span></p>';
    },
    autoplay: 5000//可选选项，自动滑动
  })

</script>
</body>
</html>