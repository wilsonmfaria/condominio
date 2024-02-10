<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Atualizar a senha de acesso
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-label for="current_password" value="Senha atual" />
            <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-danger" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" value="Nova Senha" />
            <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-danger" />
        </div>

        <div class="mb-3">
            <x-input-label for="password_confirmation" value="Confirme a nova senha" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-danger" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary btn-sm" type="submit">Salvar</button>

            @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ 'Saved' }}
                <button type="button" class="btn btn-sm float-end float-right" data-bs-dismiss="alert"
                    aria-label="Close">&times;</button>
            </div>
            @endif
        </div>
    </form>
</section>
