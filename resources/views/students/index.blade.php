<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap css links --}}
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Laravel | CRUD</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laravel 8 CRUD
                            <a class="btn btn-primary float-end" href="{{ url('add-students') }}">Add Students</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- bootstrap js links --}}
    <script src="assets/bootstrap/css/bootstrap.bundle.min.js"></script>
</body>
</html>
