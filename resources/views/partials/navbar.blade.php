<nav class="navbar navbar-expand-md navbar-white fixed-top bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/shop') }}">
            <img class="navbar-brand" src="https://umg.edu.gt/assets/umg.png" style="width: 50px">
            TIENDA I.S.
        </a>
        <div id="nav-busqueda"><input id="txtBusquedaPrincipal" autocomplete="off" type="text" placeholder="Buscar algun Producto"><svg id="btnBuscar" width="40" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="15" cy="15" r="15" fill="#F0761D"></circle><path d="M21.7854 20.5947L18.6117 17.421C19.3758 16.4038 19.7883 15.1657 19.7869 13.8934C19.7869 10.6438 17.1431 8 13.8934 8C10.6438 8 8 10.6438 8 13.8934C8 17.1431 10.6438 19.7869 13.8934 19.7869C15.1657 19.7883 16.4038 19.3758 17.421 18.6117L20.5947 21.7854C20.7554 21.929 20.9649 22.0057 21.1803 21.9997C21.3957 21.9936 21.6006 21.9054 21.753 21.753C21.9054 21.6006 21.9936 21.3957 21.9997 21.1803C22.0057 20.9649 21.929 20.7554 21.7854 20.5947ZM9.68384 13.8934C9.68384 13.0609 9.93073 12.247 10.3933 11.5547C10.8558 10.8624 11.5133 10.3229 12.2825 10.0043C13.0517 9.68566 13.8981 9.6023 14.7147 9.76473C15.5313 9.92715 16.2814 10.3281 16.8701 10.9168C17.4588 11.5055 17.8597 12.2556 18.0222 13.0722C18.1846 13.8888 18.1012 14.7352 17.7826 15.5044C17.464 16.2736 16.9244 16.931 16.2322 17.3936C15.5399 17.8562 14.726 18.103 13.8934 18.103C12.7774 18.1017 11.7074 17.6578 10.9183 16.8686C10.1291 16.0794 9.68518 15.0095 9.68384 13.8934Z" fill="white"></path></svg></div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop') }}">TIENDA</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color:white">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
