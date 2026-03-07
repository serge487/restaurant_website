{{-- Cart FAB --}}
<button class="cart-fab" id="cartFab" onclick="openCart()" aria-label="View order">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
        <line x1="3" y1="6" x2="21" y2="6"/>
        <path d="M16 10a4 4 0 01-8 0"/>
    </svg>
    <span class="cart-fab-badge" id="cartBadge" style="display:none">0</span>
</button>

{{-- Overlay --}}
<div class="cart-overlay" id="cartOverlay" onclick="closeCart()"></div>

{{-- Drawer --}}
<div class="cart-drawer" id="cartDrawer" role="dialog" aria-label="Your order">

    <div class="cart-header">
        <span class="cart-title">Your Order</span>
        <button class="cart-close" onclick="closeCart()" aria-label="Close">✕</button>
    </div>

    <div class="cart-body" id="cartBody">
        <div class="cart-empty" id="cartEmpty">
            <div class="cart-empty-icon">🛒</div>
            <p class="cart-empty-text">Your order is empty</p>
            <p style="font-size:0.65rem;color:var(--muted);margin-top:0.5rem;letter-spacing:0.05em;">Tap any item to add it</p>
        </div>
        <div id="cartItemsList"></div>
    </div>

    <div class="cart-footer" id="cartFooter" style="display:none">
        <div class="cart-summary-row">
            <span class="cart-summary-label">Total</span>
            <span class="cart-summary-val" id="cartTotal">$0.00</span>
        </div>
        <p class="cart-items-count" id="cartItemsCount">0 items</p>
    </div>

</div>