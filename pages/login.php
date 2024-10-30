<div class="user" id="user">
    <img src="../img/user.svg" alt="user" />
    <p>Войти</p>
    <div id="modal" class="modal">
        <div class="login">
            <div class="modal-content">
                <b>Войти<br />или зарегистрироваться</b>
                <div class="close-container">
                    <span class="close">&times;</span>
                </div>
                <form id="loginForm" class="loginForm" method="POST" action="validate_login.php">
                    <div class="input-container <?= isset($errors['login-email']) ? 'error' : '' ?>">
                        <input
                            type="text"
                            id="login-email"
                            name="login-email"
                            placeholder="e-mail"
                            value="<?= isset($_POST['login-email']) ? htmlspecialchars($_POST['login-email']) : '' ?>"
                            oninput="toLowerCase(this)"
                        />
                    </div>
                    <span class="error-message" id="login-email-error-message">
                        <?= isset($errors['login-email']) ? htmlspecialchars($errors['login-email']) : '' ?>
                    </span>

                    <div class="input-container <?= isset($errors['login-password']) ? 'error' : '' ?>">
                        <input
                            type="password"
                            id="login-password"
                            name="login-password"
                            placeholder="Пароль"
                        />
                        <button
                            id="login-togglePassword"
                            type="button"
                            class="toggle-password-button"
                        >
                            <i class="fa fa-eye-slash" style="font-size: 20px"></i>
                        </button>
                    </div>
                    <span class="error-message" id="login-password-error-message">
                        <?= isset($errors['login-password']) ? htmlspecialchars($errors['login-password']) : '' ?>
                    </span>

                    <div class="sign-in">
                        <p>Впервые на сайте? <a href="#" id="show-registration">Зарегистрируйтесь</a></p>
                    </div>

                    <button type="submit" class="login-button">
                        Войти
                    </button>
                </form>
            </div>
        </div>

        <div class="registration">
            <div class="modal-content">
                <b>Зарегистрироваться<br />или войти</b>
                <div class="close-container">
                    <span class="close">&times;</span>
                </div>
                <form id="registrationForm" class="loginForm" method="POST" action="validate_registration.php">
                    <div class="input-container <?= isset($errors['registration-email']) ? 'error' : '' ?>">
                        <input
                            type="text"
                            id="registration-email"
                            name="registration-email"
                            placeholder="e-mail"
                            value="<?= isset($_POST['registration-email']) ? htmlspecialchars($_POST['registration-email']) : '' ?>"
                            oninput="toLowerCase(this)"
                        />
                    </div>
                    <div class="error-message" id="registration-email-error-message">
                        <?= isset($errors['registration-email']) ? htmlspecialchars($errors['registration-email']) : '' ?>
                    </div>

                    <div class="input-container <?= isset($errors['registration-password']) ? 'error' : '' ?>">
                        <input
                            type="password"
                            id="registration-password"
                            name="registration-password"
                            placeholder="Пароль"
                        />
                        <button
                            id="registration-togglePassword"
                            type="button"
                            class="toggle-password-button"
                        >
                            <i class="fa fa-eye-slash" style="font-size: 20px"></i>
                        </button>
                    </div>
                    <div class="error-message" id="registration-password-error-message">
                        <?= isset($errors['registration-password']) ? htmlspecialchars($errors['registration-password']) : '' ?>
                    </div>

                    <div class="input-container <?= isset($errors['confirm-password']) ? 'error' : '' ?>">
                        <input
                            type="password"
                            id="confirm-password"
                            name="confirm-password"
                            placeholder="Подтвердите пароль"
                        />
                        <button
                            id="confirm-togglePassword"
                            type="button"
                            class="toggle-password-button"
                        >
                            <i class="fa fa-eye-slash" style="font-size: 20px"></i>
                        </button>
                    </div>
                    <div class="error-message" id="confirm-password-error-message">
                        <?= isset($errors['confirm-password']) ? htmlspecialchars($errors['confirm-password']) : '' ?>
                    </div>

                    <div class="sign-in">
                        <p>Уже зарегистрированы? <a href="#" id="show-login">Войти</a></p>
                    </div>

                    <button type="submit" class="login-button">
                        Зарегистрироваться
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../scripts/login.js"></script>

