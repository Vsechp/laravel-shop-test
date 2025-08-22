<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Интернет-магазин')</title>
    <meta name="description" content="@yield('description', 'Лучшие товары по выгодным ценам')">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Верхняя полоса */
        .top-bar {
            background-color: #6c757d;
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }
        
        .logo-placeholder {
            background-color: #5a6268;
            color: white;
            padding: 5px 15px;
            border-radius: 3px;
            font-weight: bold;
        }
        
        .contact-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .contact-info i {
            margin-right: 5px;
        }
        
        .cart-icon {
            font-size: 18px;
            color: white;
        }
        
        /* Основная навигация */
        .main-nav {
            background-color: white;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
        
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 15px;
            position: relative;
        }
        
        .nav-link:hover {
            color: #007bff !important;
        }
        
        .dropdown-toggle::after {
            margin-left: 5px;
        }
        
        .dropdown-menu {
            border-radius: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: 1px solid #dee2e6;
            display: none;
        }
        
        .dropdown-menu {
            transition: opacity 0.3s ease;
            display: none;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
        
        /* Карточки товаров */
        .product-card {
            border: 1px solid #dee2e6;
            border-radius: 0;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .product-card a:hover {
            text-decoration: none;
        }
        
        .product-image-placeholder {
            background-color: #17a2b8;
            color: white;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .product-id {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        
        .add-to-cart-btn {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 0;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .add-to-cart-btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        
        /* Карточка товара (детальная) */
        .product-detail-image {
            background-color: #17a2b8;
            color: white;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .product-detail-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        
        .product-description {
            background-color: #f8f9fa;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }
        
        .footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            margin-top: 3rem;
        }
    </style>
</head>
<body>
    <!-- Верхняя полоса -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo-placeholder">
                        <i class="fas fa-shopping-bag"></i> SHOP
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-info justify-content-center">
                        <span><i class="fas fa-map-marker-alt"></i> Москва, Кремль</span>
                        <span><i class="fas fa-phone"></i> <a href="tel:8-800-555-35-35" style="color: white; text-decoration: none;">8-800-555-35-35</a></span>
                    </div>
                </div>
                <div class="col-md-3 text-right">
                    <a href="#" class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Основная навигация -->
    <nav class="main-nav">
        <div class="container">
            <ul class="nav justify-content-start">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        Каталог
                    </a>
                    <div class="dropdown-menu">
                        @foreach($categories ?? [] as $category)
                            <a class="dropdown-item" href="{{ route('category', $category) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">О нас</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container my-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Контакты</h5>
                    <p><i class="fas fa-phone"></i> 8-800-555-35-35</p>
                    <p><i class="fas fa-envelope"></i> info@shop.ru</p>
                </div>
                <div class="col-md-6 text-right">
                    <h5>Мы в соцсетях</h5>
                    <a href="#" class="text-dark mr-3"><i class="fab fa-vk fa-2x"></i></a>
                    <a href="#" class="text-dark mr-3"><i class="fab fa-telegram fa-2x"></i></a>
                    <a href="#" class="text-dark"><i class="fab fa-instagram fa-2x"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var productId = $(this).data('product-id');
            
            console.log('Добавление товара в корзину:', productId);
            $('#cartModal').modal('show');
        });
        
        var dropdownTimeout;
        
        $('.dropdown').hover(
            function() {
                clearTimeout(dropdownTimeout);
                $(this).find('.dropdown-menu').show();
            },
            function() {
                var $this = $(this);
                dropdownTimeout = setTimeout(function() {
                    $this.find('.dropdown-menu').hide();
                }, 300);
            }
        );
        
        $('.dropdown-menu').hover(
            function() {
                clearTimeout(dropdownTimeout);
            },
            function() {
                var $this = $(this);
                dropdownTimeout = setTimeout(function() {
                    $this.hide();
                }, 300);
            }
        );
    });
    </script>
    
    <!-- Модальное окно "Товар добавлен в корзину" -->
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Товар добавлен в корзину</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Товар добавлен в корзину!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
