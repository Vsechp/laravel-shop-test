<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление категориями - Админ панель</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.index') }}">
                <i class="fas fa-cog"></i> Админ панель
            </a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('admin.index') }}">Главная</a>
                <a class="nav-link" href="{{ route('home') }}">На сайт</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1>Управление категориями</h1>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Добавить категорию</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Название</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Список категорий</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Slug</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            <span class="category-name">{{ $category->name }}</span>
                                            <input type="text" class="form-control category-edit" value="{{ $category->name }}" style="display: none;">
                                        </td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary edit-category" data-id="{{ $category->id }}">Редактировать</button>
                                            <button class="btn btn-sm btn-outline-success save-category" data-id="{{ $category->id }}" style="display: none;">Сохранить</button>
                                            <button class="btn btn-sm btn-outline-secondary cancel-edit" style="display: none;">Отмена</button>
                                            <form action="{{ route('admin.categories.delete', $category) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Удалить категорию?')">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-category').click(function() {
                var row = $(this).closest('tr');
                row.find('.category-name').hide();
                row.find('.category-edit').show();
                row.find('.edit-category').hide();
                row.find('.save-category').show();
                row.find('.cancel-edit').show();
            });

            $('.cancel-edit').click(function() {
                var row = $(this).closest('tr');
                row.find('.category-name').show();
                row.find('.category-edit').hide();
                row.find('.edit-category').show();
                row.find('.save-category').hide();
                row.find('.cancel-edit').hide();
            });

            $('.save-category').click(function() {
                var id = $(this).data('id');
                var name = $(this).closest('tr').find('.category-edit').val();
                
                $.ajax({
                    url: '/admin/categories/' + id,
                    method: 'PUT',
                    data: {
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
