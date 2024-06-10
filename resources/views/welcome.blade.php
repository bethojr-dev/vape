<!DOCTYPE HTML>
<html>

<head>
    <title>My Vape Store</title>
    <meta charset="utf-8" />
    <meta name="theme-color" content="#EA60D6">
    <link rel="icon" href="images/logo-sem-fundo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <meta name="description"
        content="Sua Loja Vape Store: Sua jornada para um vape extraordinário. Explore nossa seleção incomparável de e-líquidos, dispositivos de alta qualidade e muito mais.">
    <meta name="description"
        content="Sua Loja Vape Store: Encontre os melhores vapes e e-líquidos do mercado. Explore nossa seleção incomparável de produtos e desfrute de uma experiência de vape excepcional.">

</head>

<body class="is-preload">
    @vite(['resources/js/app.js'])
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <header id="header">
                    <a href="index.html" class="logo"><strong>My Vape</strong> Store</a>
                    <ul class="icons">
                        <li><a target="_blank" href="https://www.instagram.com/myvapestoree_/"
                                class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a target="_blank"
                                href="https://wa.me/5588997471277?text=Ol%C3%A1%2C+peguei+esse+contato+atrav%C3%A9s+do+seu+site"
                                class="icon brands fa-whatsapp"><span class="label">Whats app</span></a></li>
                        {{-- <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li> --}}
                    </ul>
                </header>

                <!-- Banner -->
                <section id="banner">
                    <div class="content">
                        <header>
                            <h1>A Sua Loja Vape Store:<br /></h1>
                            <p>Sua Jornada para um Vape Extraordinárioe</p>
                            <hr>
                        </header>
                        <p>
                            Mergulhe em um Universo de Sabores
                            Descubra uma seleção incomparável de e-líquidos, com uma variedade de sabores que agradam a
                            todos os paladares. Explore desde clássicos blends de tabaco até misturas frutadas e
                            mentoladas refrescantes. Se você é um vaper experiente ou está começando, temos algo para
                            você se deliciar.
                            <br>
                        </p>
                        Dispositivos de Vape de Alta Qualidade
                        Eleve sua experiência de vape com nossa seleção cuidadosamente curada de dispositivos de alta
                        qualidade. De pods mods elegantes e compactos a box mods potentes e personalizáveis, oferecemos
                        uma ampla variedade para atender ao seu estilo e preferências de vape.
                        </p>
                        <p>
                            Orientação e Suporte Especializados
                            Nossa equipe experiente e amigável está sempre à disposição para ajudá-lo a encontrar os
                            produtos de vape perfeitos para suas necessidades e preferências. Guiamos você por nossa
                            seleção, respondemos às suas perguntas e garantimos que você tenha uma experiência de compra
                            positiva.
                        </p>
                        <ul class="actions">
                            <li><a href="#" class="button big">Ver produtos</a></li>
                        </ul>
                    </div>
                    <span class="image object">
                        <img src="images/logo-sem-fundo.png" alt="" />
                    </span>
                </section>

                <!-- Section -->
                <section>
                    <header class="major">
                        <h2>Algumas das nossas melhores marcas</h2>
                    </header>
                    <div class="features">
                        <article>
                            <span class="icon fa-gem"></span>
                            <div class="content">
                                <h3>SMOKA SMOK</h3>
                                <p>É uma das marcas de vape mais populares do mundo e é conhecida por seus mods e
                                    tanques de vape inovadores e de alta qualidade. A empresa oferece uma ampla gama de
                                    produtos para atender a todos os tipos de vapers, desde iniciantes até experientes.
                                </p>
                            </div>
                        </article>
                        <article>
                            <span class="icon solid fa-paper-plane"></span>
                            <div class="content">
                                <h3>Vaporesso</h3>
                                <p>Vaporesso é outra marca de vape popular que é conhecida por seus produtos confiáveis
                                    ​​e fáceis de usar. A empresa oferece uma variedade de mods e tanques de vape, bem
                                    como pods de vape pré-preenchidos.</p>
                            </div>
                        </article>
                        <article>
                            <span class="icon solid fa-rocket"></span>
                            <div class="content">
                                <h3>UwellA Uwell </h3>
                                <p>é uma marca de vape que está rapidamente ganhando popularidade graças a seus produtos
                                    inovadores e de alta qualidade. A empresa oferece uma variedade de mods e tanques de
                                    vape, bem como pods de vape pré-preenchidos.</p>
                            </div>
                        </article>
                        <article>
                            <span class="icon solid fa-signal"></span>
                            <div class="content">
                                <h3>Ignite</h3>
                                <p>A Ignite é uma marca global de estilo de vida conhecida por seus produtos de alta
                                    qualidade. A Ignite entrou no mercado de vape oferecendo vape pens descartáveis com
                                    uma variedade de sabores. Eles também oferecem bolsas e acessórios. A marca ganhou
                                    reconhecimento devido à sua associação com o cofundador Dan Bilzerian.</p>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Section -->
                <section>
                    <header class="major">
                        <h2>Produtos</h2>
                    </header>
                    <div class="posts">
                        @foreach ($products as $product)
                            <article>
                                @if($product->stock == 0)
                                    <p><b>
                                        Indisponível
                                    </b></p>
                                @else
                                    <p>Em estoque: {{ $product->stock }}</p>
                                @endif

                                <a class="image"><img width="30" height="30" src="{{ asset('storage/' . $product->image) }}" /></a>
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <hr>
                                <p><b>Valor: R${{$product->value}} </b></p>
                                <ul class="actions">
                                    @if($product->stock == 0)
                                        <li><a onclick="alert('Produto indisponível')" class="button">Não disponível</a></li>
                                    @else
                                        <li><a onclick="addToBag('{{ $product->id }}', '{{ $product->name }}', '{{ $product->value }}')" class="button">Adicionar a sacola</a></li>
                                    @endif

                                </ul>
                            </article>
                        @endforeach
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h4>Meu carrinho</h4>
                                <hr>
                                <div style="padding-top: 4vw" id="content-bag"></div>
                                <h5>Seus dados</h5>
                                <input type="text" placeholder="Nome" name="name" id="costumer-name">
                                <br>
                                <input type="tel" placeholder="Telefone" name="telefone" id="costumer-tel">
                                <br>
                                <input type="tel" placeholder="Endereço" name="endereco" id="costumer-address">
                                <br>
                                <li style="display: flex; justify-content: center; align-items: center"><a onclick="closeSale()" class="button">Finalizar compra</a></li>
                            </div>
                        </div>
                        <div class="openModalBtn" id="floating-cart-button">
                            <a><i class="fas fa-shopping-cart"></i></a>
                        </div>

                    </div>
                </section>

            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">

                <!-- Search -->
                <section id="search" class="alt">
                    <form method="post" action="#">
                        <input type="text" name="query" id="query" placeholder="Search" />
                    </form>
                </section>

                <!-- Menu -->
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="index.html">Homepage</a></li>
                        <li><a href="generic.html">Generic</a></li>
                        <li><a href="generic.html">Elements</a></li>
                        <li>
                            <span class="opener">Submenu</span>
                            <ul>
                                <li><a href="#">Lorem Dolor</a></li>
                                <li><a href="#">Ipsum Adipiscing</a></li>
                                <li><a href="#">Tempus Magna</a></li>
                                <li><a href="#">Feugiat Veroeros</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Etiam Dolore</a></li>
                        <li><a href="#">Adipiscing</a></li>
                        <li>
                            <span class="opener">Another Submenu</span>
                            <ul>
                                <li><a href="#">Lorem Dolor</a></li>
                                <li><a href="#">Ipsum Adipiscing</a></li>
                                <li><a href="#">Tempus Magna</a></li>
                                <li><a href="#">Feugiat Veroeros</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Maximus Erat</a></li>
                        <li><a href="#">Sapien Mauris</a></li>
                        <li><a href="#">Amet Lacinia</a></li>
                    </ul>
                </nav>

                <!-- Section -->
                <section>
                    <header class="major">
                        <h2>Ultimos lançamentos</h2>
                    </header>
                    <div class="mini-posts">
                        @foreach($products as $product)
                            <article>
                                <a href="#" class="image"><img src="{{ asset('storage/' . $product->image) }}" alt="" /></a>
                                <p>{{$product->name }} - <b>R$ {{ $product->value }}</b></p>
                            </article>
                        @endforeach
                    </div>
                </section>

                <!-- Section -->
                <section>
                    <header class="major">
                        <h2>Entre em contato</h2>
                    </header>
                    <p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem
                        ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat
                        tempus aliquam.</p>
                    <ul class="contact">
                        <li class="icon solid fa-phone"><a href="">(85) 9 9425-3764</a></li>
                        <li class="icon solid fa-instagram"><a href="">@myvape_store</a></li>
                    </ul>
                </section>

                <!-- Footer -->
                <footer id="footer">
                    <p class="copyright">&copy; Madgic. All rights reserved. Design: <a
                            href="https://madgic.com.br">Madgic</a>.</p>
                </footer>

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bag.js"></script>

</body>

</html>
