<?php
// Minimal demo handling (no real auth). Remove in production.
$loginMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $userId = trim($_POST['user_id'] ?? '');
  $password = $_POST['password'] ?? '';
  if ($userId !== '' && $password !== '') {
    $loginMessage = 'Submitted for user: ' . htmlspecialchars($userId, ENT_QUOTES, 'UTF-8');
  } else {
    $loginMessage = 'Please enter both User ID and Password.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Custom Styles -->
  <link rel="stylesheet" href="/workspace/login.css" />
</head>
<body>
  <!-- Top bar -->
  <nav class="topbar navbar navbar-expand-sm px-3">
    <div class="container-fluid">
      <div class="ms-auto d-flex align-items-center gap-3">
        <a class="text-dark text-decoration-none" href="#">FAQ</a>
        <a class="btn btn-outline-dark rounded-pill py-1 px-3" href="#">Log in</a>
      </div>
    </div>
  </nav>

  <main class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">
        <div class="card login-card shadow-sm">
          <div class="card-header d-flex justify-content-between align-items-center py-2">
            <span>Log in</span>
            <button class="btn btn-sm btn-link text-dark text-decoration-none p-0" type="button" aria-label="Close">×</button>
          </div>
          <div class="card-body">
            <?php if ($loginMessage !== ''): ?>
              <div class="alert alert-info py-2" role="alert"><?php echo $loginMessage; ?></div>
            <?php endif; ?>

            <form method="post" action="">
              <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="" required />
              </div>

              <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" name="password" required />
                  <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Show password" data-toggle="password">
                    <i class="bi bi-eye" aria-hidden="true"></i>
                  </button>
                </div>
              </div>

              <div class="d-flex align-items-center justify-content-between mt-2">
                <div class="form-check small">
                  <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" />
                  <label class="form-check-label" for="remember">Remember Me</label>
                </div>
              </div>

              <div class="d-grid mt-3">
                <button type="submit" class="btn btn-salmon">Log in</button>
              </div>

              <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="#" class="small text-decoration-none">Admin Log in</a>
                <i class="bi bi-chevron-right text-muted"></i>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    // Password visibility toggle
    (function () {
      var toggleBtn = document.querySelector('[data-toggle="password"]');
      var passwordInput = document.getElementById('password');
      if (!toggleBtn || !passwordInput) return;
      toggleBtn.addEventListener('click', function () {
        var isHidden = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isHidden ? 'text' : 'password');
        var icon = this.querySelector('i');
        if (icon) {
          icon.classList.toggle('bi-eye');
          icon.classList.toggle('bi-eye-slash');
        }
        this.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
      });
    })();
  </script>
</body>
</html>