<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> lehuuvinh159@gmail.com</li>
                            <li>Miễn Phí Giao Hàng Hóa Đơn Trên 100k</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-pinterest"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{ asset('images/language.png') }}" alt="">
                            <div>Vietnamese</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Vietnamese</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @if (!Auth::check())
                                {{-- <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a> --}}
                            @else
                                <div class="header__top__right__language">
                                    <div>{{ Auth::user()->name }}</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="admin">My Order</a></li>
                                        <form method="post" action="{{ route('logout') }}" id="formLogout">
                                            @csrf
                                            <li><a href="#" onclick="document.getElementById('formLogout').submit();">Logout</a></li>
                                        </form>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="https://i.pinimg.com/originals/be/4a/c8/be4ac831924de42758e6e9efa5edcf2d.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('aboutus.list') }}">Shop</a></li>
                        <li><a href="{{ route('tongsanpham') }}">Sản phẩm</a>
                            {{-- <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>
                                <li><a href="/shopping-cart">Shoping Cart</a></li>
                                <li><a href="{{ route('checkout') }}">Check Out</a></li>
                                <li><a href="#">Blog Details</a></li>
                            </ul> --}}
                        </li>
                        <li><a href="./contact.html">Khuyến Mãi</a></li>
                        <li><a href="{{ route('blog.list') }}">Blog</a></li>
                        <li><a href="{{ route('contact.list') }}">Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="header__cart">
                    @php
                        $cart = session()->get('cart') ?? [];
                        $total = 0;
                        foreach ($cart as $item) {
                            $total += $item['price'] * $item['qty'];
                        }
                    @endphp
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li>
                            <a href="{{ route('shopping.cart') }}"><i class="fa fa-shopping-bag"></i>
                            <span id="total-items-cart">
                                {{ is_array(session()->get('cart')) ? count(session()->get('cart')) : 0 }}
                            </span>
                            </a>
                            </li>
                    </ul>
                    <div class="header__cart__price">Tổng: <span id="total-price-cart">{{ number_format($total, 2) }}vnđ</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

@section('my-script')
<script type="text/javascript">
    function submitLogoutForm(){
        $('#formLogout').submit();
    }
</script>
@endsection
