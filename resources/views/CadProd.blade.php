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
                                    <h3 class="card-title">Cadastrar Produto</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form id="produtoForm" action="{{ route('produtos.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $produto['nome'] ?? '') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $produto['descricao'] ?? '') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="preco">Preço</label>
                                            <input type="number" class="form-control" id="preco" name="preco" value="{{ old('preco', $produto['preco'] ?? '') }}" required onwheel="this.blur()">
                                        </div>
                                        <div class="form-group">
                                            <label for="sala_id">Sala</label>
                                            <select class="form-control" id="sala_id" name="sala_id" required>
                                                @foreach($salas as $sala)
                                                <option value="{{ $sala->id }}" {{ (old('sala_id', $produto['sala_id'] ?? '') == $sala->id) ? 'selected' : '' }}>{{ $sala->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fornecedor_id">Fornecedor</label>
                                            <select class="form-control" id="fornecedor_id" name="fornecedor_id" required>
                                                @foreach($fornecedores as $fornecedor)
                                                <option value="{{ $fornecedor->id }}" {{ (old('fornecedor_id', $produto['fornecedor_id'] ?? '') == $fornecedor->id) ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="numero_fatura">Número da Fatura</label>
                                            <input type="text" class="form-control" id="numero_fatura" name="numero_fatura" value="{{ old('numero_fatura', $produto['numero_fatura'] ?? '') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="numero_patrimonio">Número do Patrimônio</label>
                                            <input type="text" class="form-control" id="numero_patrimonio" name="numero_patrimonio" value="{{ old('numero_patrimonio') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="data_aquisicao">Data de Aquisição</label>
                                            <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" value="{{ old('data_aquisicao', $produto['data_aquisicao'] ?? '') }}" required>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Exibir mensagens de sucesso ou erro -->
    @if(session('success') && session('produto_id'))
    <script>
        $(document).ready(function() {
        Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: '{{ session("success") }}',
            showCancelButton: true,
            confirmButtonText: 'Duplicar Produto',
            cancelButtonText: 'Cadastrar Outro Produto',
            showDenyButton: true,
            denyButtonText: 'Fechar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('produtos.duplicate', session('produto_id')) }}";
            }
            });
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: '{{ session("error") }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
</body>

@endsection