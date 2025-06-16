<div>
    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-card animate__fadeIn">
                    <h2>Login Admin</h2>

                    <form wire:submit="login">
                        <x-input model="email" label="Email" type="email" placeholder="Masukkan email"
                :description="$errors->has('email') ? $errors->first('email') : null"
 />
                        <x-input model="password" label="Password" type="password" placeholder="Masukkan password"
                :description="$errors->has('password') ? $errors->first('password') : null"
 />
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
