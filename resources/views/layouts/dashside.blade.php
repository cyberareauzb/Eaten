<a href="#" class="utf_dashboard_nav_responsive"><i class="fa fa-reorder"></i> Dashboard Sidebar Menu</a>
<div class="utf_dashboard_navigation js-scrollbar">
  <div class="utf_dashboard_navigation_inner_block">
    <ul>
      <li class="{{ (request()-> is('dashboard')) ? 'active' : '' }}"><a href="/dashboard"><i class="sl sl-icon-layers"></i> Kabinet</a></li>
      <li class="{{ (request()-> is('add-listing')) ? 'active' : '' }}"><a href="/add-listing"><i class="sl sl-icon-plus"></i> E'lon joylash</a></li>
      @if(auth()->user()->role=='vendor')
      <li class="{{ (request()-> is('bookings')) ? 'active' : '' }}"><a href="/bookings"><i class="sl sl-icon-docs"></i> Buyurtmalar</a></li>
      @endif
      <li class="{{ (request()-> is('myorders')) ? 'active' : '' }}"><a href="/myorders"><i class="sl sl-icon-docs"></i> Mening Buyurtmalarim</a></li>
      <li class="{{ (request()-> is('messages')) ? 'active' : '' }}"><a href="/messages"><i class="sl sl-icon-envelope-open"></i> Xabarlar</a></li>
      @if(auth()->user()->role=='vendor')
      <li class="{{ (request()-> is('wallet')) ? 'active' : '' }}"><a href="/wallet"><i class="sl sl-icon-wallet"></i> Xamyon</a></li>
      <li class="{{ (request()-> is('comments')) ? 'active' : '' }}"><a href="/comments"><i class="sl sl-icon-star"></i> Fikrlar va Izohlar</a></li>
      @endif
      <li class="{{ (request()-> is('profile')) ? 'active' : '' }}"><a href="/profile"><i class="sl sl-icon-user"></i> Mening profilim</a></li>
      <li class="{{ (request()-> is('logout')) ? 'active' : '' }}"><a href="/logout"><i class="sl sl-icon-power"></i> Chiqish</a></li>
    </ul>
  </div>
</div>
