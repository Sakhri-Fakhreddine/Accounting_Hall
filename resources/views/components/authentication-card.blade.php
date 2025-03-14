<div style="min-height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 1.5rem; background: linear-gradient(to bottom right, black, red);">
    <div>
        {{ $logo }}
    </div>

    <div style="width: 100%; max-width: 28rem; margin-top: 1.5rem; padding: 1.5rem; background: white; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 0.5rem; overflow: hidden;">
        {{ $slot }}
    </div>
</div>
