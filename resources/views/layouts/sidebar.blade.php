<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
  <div>
    <div class="logo-wrapper"><a href="/"><img class="img-fluid for-light" style="height: 40px; width: auto;" src="{{ asset('assets/images/logo/rkive.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="/"><img class="img-fluid" style="height: 20px; width: auto;" src="{{ asset('assets/images/logo/logo1.png') }}" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn">
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>

          <li class="sidebar-main-title">
            <div>
              <h6>Home</h6>
            </div>
          </li>

          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="/">
              <svg class="stroke-icon">
                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
              </svg><span>Dashboard</span></a></li>

          <li class="sidebar-main-title">
            <div>
              <h6 class="lan-8">Applications</h6>
            </div>
          </li>

          <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="/document-management">
              <svg class="stroke-icon">
                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-file') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-social') }}"></use>
              </svg><span>Document Management</span></a></li>
          <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
              <svg class="stroke-icon">
                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"></use>
              </svg><span>Legal Management</span></a>
              <ul class="sidebar-submenu">
                <li><a href="/legal-contract">Contract Request</a></li>
                <li><a href="/document-request">Document Request</a></li>
            </ul>
            </li>
      </div>
    </nav>
  </div>
</div>