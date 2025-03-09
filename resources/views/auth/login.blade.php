<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PuskemasDelanggu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

<div class="container-fluid">
    <div class="box">
        <div class="box-body">
            <main class="form-signin w-100 m-auto">
                <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email">
                    <label for="floatingInput">email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Sign in</button>
                
                <a href="javascript:history.back()" class="btn btn-danger w-100 py-2 mb-2">Back</a>
                                
                <div class="col-12">
                    <p class="small mb-0">Belum Punya Akun ? <a href="/register">Buat Akun</a></p>
                </div>
                <p class="mt-5 mb-3 text-body-secondary">&copy; SIKonsultasi</p>
                </form>
            </main>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
