<div class="d-flex flex-column justify-content-center align-items-center">
    <p>{{ $user['firstname'] }}, вы уверены, что хотите удалить свой аккаунт? Все данные сотрутся навсегда</p>
    <button class="btn btn-outline-danger js-remove-btn">
        <div class="spinner-border text-danger spinner-border-sm d-none js-btn-spinner" role="status"></div>
        <span class="sr-only js-btn-text">Удалить свой аккаунт</span>
    </button>
</div>