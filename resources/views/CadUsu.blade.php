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
                    <a class="nav-link" href="{{ route('sair') }}" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
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
                        
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Cadastrar Usuário</h3>
                                    
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="usuarioForm" action="{{ route('usuarios') }}" method="POST">
                                        {{ csrf_field() }}
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="usuario">Usuário</label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="senha">Senha</label>
                                            <input type="password" class="form-control" id="senha" name="senha" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </form>
                                </div>

                            
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
</body>

@endsection