<!--svg sprite-->

<div class="svg-wrap">
  <svg xml:space="preserve">
    <g id="phone">
      <path d="M256,32c123.5,0,224,100.5,224,224S379.5,480,256,480S32,379.5,32,256S132.5,32,256,32 M256,0C114.625,0,0,114.625,0,256
		s114.625,256,256,256s256-114.625,256-256S397.375,0,256,0L256,0z M398.719,341.594l-1.438-4.375
		c-3.375-10.062-14.5-20.562-24.75-23.375L334.688,303.5c-10.25-2.781-24.875,0.969-32.405,8.5l-13.688,13.688
		c-49.75-13.469-88.781-52.5-102.219-102.25l13.688-13.688c7.5-7.5,11.25-22.125,8.469-32.406L198.219,139.5
		c-2.781-10.25-13.344-21.375-23.406-24.75l-4.313-1.438c-10.094-3.375-24.5,0.031-32,7.563l-20.5,20.5
		c-3.656,3.625-6,14.031-6,14.063c-0.688,65.063,24.813,127.719,70.813,173.75c45.875,45.875,108.313,71.345,173.156,70.781
		c0.344,0,11.063-2.281,14.719-5.938l20.5-20.5C398.688,366.062,402.062,351.656,398.719,341.594z"/>
    </g>
  </svg>
</div>
<!--/svg sprite-->
<div class="header-top">
  <div class="container">
    <div class="header-top-left"><span id="fontSize">Font size 
        <a href="javascript:void(0)" id="decreaseFont">A- </a>
        <a href="javascript:void(0)" id="increaseFont">A+ </a>
        <a href="javascript:void(0)" id="dincreaseFont">A++ </a>
        <a href="javascript:void(0)" id="resetFont">Reset </a> 
      </span>
    </div>
    <div class="header-top-right"> <a class="top-mail" href="mailto:enquiry@frontiersupport.co.uk">enquiry@frontiersupport.co.uk</a> 
    <a href="tel:020-8603-7230" class="header-call"> <svg viewBox="0 0 512 512" class="phone-icon">
    <use xlink:href="#phone"></use>
    </svg> <?php echo Configure::read('Site.contact'); ?></a> </div>
  </div>
</div>

