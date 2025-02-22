<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/png" href="<?=base_url('favicon.ico');?>">
        <title>
            <?php echo esc($title); ?>
        </title>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/@fortawesome/fontawesome-free@5.10.2/css/all.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/style.css" />
        <script>
            const token = localStorage.getItem('token');
            if (token !== null) {
                location.href = '/';
            }
        </script>
    </head>

    <body>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <div class="alert alert-danger d-none" id="errmessage"></div>
                            <form>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" />
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" id="loginbutton" name="loginbutton">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="https://unpkg.com/jquery@3.6.1/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');
    const form = document.querySelector('form');
    const errmessage = document.querySelector('#errmessage');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        errmessage.classList.add('d-none');
        if (email.value === '' || password.value === '' || password.value.length < 8) {
            errmessage.textContent = 'Masukkan email and password';
            errmessage.classList.remove('d-none');
            return;
        }

        // console.log(email.value, password.value);

        try {
            const req = await fetch('<?=base_url("auth/login");?>', {
                method: 'POST',
                body: JSON.stringify({
                    email: email.value,
                    password: password.value
                }),
                headers: { 'Content-Type': 'application/json' }
            });
            // const res = await req.text();
            // console.log(res);

            const res = await req.json();
            // const res = await req.text();
            // console.log(res);
            if (!res.success) {
                errmessage.classList.remove('d-none');
                errmessage.textContent = res.message;
                console.log('failed')
                return;
            } else {
                // location.href = '<?=base_url();?>';
                console.log(res);
                console.log('success')
                localStorage.setItem('token', res.token);
                location.href = '/';
            }
        } catch (e) {
            console.log(e);
            alert('Error', e.message || 'Something went wrong');
        }
    });

    email.addEventListener('input', e => {
        email.classList.toggle('is-invalid', email.value === '');
    });

    password.addEventListener('input', e => {
        password.classList.toggle('is-invalid', password.value === '' || password.value.length < 8);
    });

    </script>

</html>
