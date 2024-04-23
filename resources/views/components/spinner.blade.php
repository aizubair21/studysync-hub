<style>
    .spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 99999;
        background-color: lightgray;
    }

    .spin {
        width: 50px;
        height: 50px;
        background-color: transparent;
        border-style: solid;
        border-width: 8px;
        border-color: transparent, transparent, rgb(10, 92, 10), transparent;
        animation: spin 2s linear infinite;
        border-radius: 50%;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg)
        }
    }
</style>

{{-- livewire navigating spinner --}}
<div class="spinner d-none">
    <div class="spin"></div>
</div>
{{-- livewire navigating spinner --}}
