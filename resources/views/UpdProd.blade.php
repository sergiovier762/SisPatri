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
                                    <h3 class="card-title">Atualizar Produto</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $produto->descricao }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <input type="text" class="form-control" id="marca" name="marca" value="{{ $produto->marca }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="preco">Preço</label>
                                            <input type="number" class="form-control" id="preco" name="preco" value="{{ $produto->preco }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sala_id">Sala</label>
                                            <select class="form-control" id="sala_id" name="sala_id" required>
                                                @foreach($salas as $sala)
                                                    <option value="{{ $sala->id }}" {{ $sala->id == $produto->sala_id ? 'selected' : '' }}>{{ $sala->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fornecedor_id">Fornecedor</label>
                                            <select class="form-control" id="fornecedor_id" name="fornecedor_id" required>
                                                @foreach($fornecedores as $fornecedor)
                                                    <option value="{{ $fornecedor->id }}" {{ $fornecedor->id == $produto->fornecedor_id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="numero_fatura">Número da Fatura</label>
                                            <input type="text" class="form-control" id="numero_fatura" name="numero_fatura" value="{{ $produto->numero_fatura }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="numero_patrimonio">Número do Patrimônio</label>
                                            <input type="text" class="form-control" id="numero_patrimonio" name="numero_patrimonio" value="{{ $produto->numero_patrimonio }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="data_aquisicao">Data de Aquisição</label>
                                            <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" value="{{ $produto->data_aquisicao }}" required>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                            <a href="{{ route('produtos') }}" class="btn btn-secondary">Cancelar</a>
                                                                               </div>
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
