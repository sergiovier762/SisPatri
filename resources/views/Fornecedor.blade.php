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
                        <!-- <li class="nav-item">
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
                        </li> -->
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
                                    <h3 class="card-title">Fornecedores Cadastrados</h3>
                                    <div class="float-right">
                                        <form action="{{ route('fornecedores') }}" method="GET" class="form-inline">
                                        <input type="text" name="query" class="form-control mr-2" placeholder="Buscar Fornecedor">
                                        <button type="submit" class="btn btn-primary mr-2">Buscar</button>
                                        <a href="{{ route('fornecedores.create') }}" class="btn btn-success">Cadastrar Fornecedor</a>
                                    </form>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>CNPJ</th>
                                                <th>Telefone</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fornecedores as $fornecedor)
                                            <tr>
                                                <td>{{ $fornecedor->nome }}</td>
                                                <td>{{ formatarCNPJ($fornecedor->cnpj) }}</td>
                                                <td>{{ $fornecedor->telefone }}</td>
                                                <td>
                                                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">Excluir</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
