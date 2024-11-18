@extends('Layouts.App')
@section('content')
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('sair') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" role="button">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <img src="https://uniguacu.com.br/wp-content/uploads/2022/05/Nova-Logo-Faculdade-UNIGUACU_09.png" alt="Uniguaçu Logo" class="brand-image elevation-6 mx-auto d-block" style="border-bottom: none; width: 100px; height: 100px; margin-top: 20px;">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('Administracao') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Tela Inicial
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Produtos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('produtos.create') }}" class="nav-link">
                                        <p>Cadastrar Produto</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('produtos') }}" class="nav-link">
                                        <p>Listar Produto</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Salas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('salas.create') }}" class="nav-link">
                                        <p>Cadastrar Sala</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('salas') }}" class="nav-link">
                                        <p>Listar Sala</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>
                                    Fornecedor
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('fornecedores.create') }}" class="nav-link">
                                        <p>Cadastrar Fornecedor</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('fornecedores') }}" class="nav-link">
                                        <p>Listar Fornecedor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Relatório
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../relatorio/cadastrar.html" class="nav-link">
                                        <p>Cadastrar Relatório</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../relatorio/listar.html" class="nav-link">
                                        <p>Listar Relatório</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @can('view-users')
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Usuários
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('usuarios.create') }}" class="nav-link">
                                        <p>Cadastrar Usuário</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('usuarios') }}" class="nav-link">
                                        <p>Listar Usuário</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tela Inicial</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tela Inicial</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Produtos</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Produtos Cadastrados</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <a href="{{ route('produtos') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Cadastrar Produto</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-box"></i>
                                    </div>
                                    <a href="{{ route('produtos.create') }}" class="small-box-footer">Cadastrar <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Buscar Produto</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <a href="#" class="small-box-footer" onclick="toggleSearchForm('search-form')">Buscar <i class="fas fa-arrow-circle-right"></i></a>
                                    <form id="search-form" action="{{ route('produtos.search') }}" method="GET" class="small-box-footer" style="display:none;">
                                        <div class="input-group">
                                            <input type="text" name="query" placeholder="Digite o nome do produto" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info"><i class="fas fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

                <!-- Card Fornecedores -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Fornecedores</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <p>Fornecedores Cadastrados</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <a href="{{ route('fornecedores') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <p>Cadastrar Fornecedor</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <a href="{{ route('fornecedores.create') }}" class="small-box-footer">Cadastrar <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <p>Buscar Fornecedor</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <a href="#" class="small-box-footer" onclick="toggleSearchForm('search-form-fornecedor')">Buscar <i class="fas fa-arrow-circle-right"></i></a>
                                    <form id="search-form-fornecedor" action="{{ route('fornecedores.search') }}" method="GET" class="small-box-footer" style="display:none;">
                                        <div class="input-group">
                                            <input type="text" name="query" placeholder="Digite o nome do fornecedor" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info"><i class="fas fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

                <!-- Card Salas -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Salas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <p>Salas Cadastradas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <a href="{{ route('salas') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <p>Cadastrar Sala</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <a href="{{ route('salas.create') }}" class="small-box-footer">Cadastrar <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <p>Buscar Sala</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <a href="#" class="small-box-footer" onclick="toggleSearchForm('search-form-sala')">Buscar <i class="fas fa-arrow-circle-right"></i></a>
                                    <form id="search-form-sala" action="{{ route('salas.search') }}" method="GET" class="small-box-footer" style="display:none;">
                                        <div class="input-group">
                                            <input type="text" name="query" placeholder="Digite o nome da sala" class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info"><i class="fas fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>

    <script>
        function toggleSearchForm(formId) {
            var form = document.getElementById(formId);
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>

</body>
@endsection