
<nav class="nav">
<ul class="nav__items">
    <li class="nav__item {{ request()->routeIs('main')? 'nav__item-active':''}}  "><a href="{{route('main')}}"> Main  </a></li>
    <li class="nav__item {{ request()->routeIs('gertz')? 'nav__item-active':''}}  "><a href="{{route('gertz')}}"> Gertz</a> </li>
    <li class="nav__item {{ request()->routeIs('axel')? 'nav__item-active':''}}  "><a href="{{route('axel')}}"> Axel </a> </li>
</ul>
</nav>
