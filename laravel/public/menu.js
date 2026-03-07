/*   RESTO — menu.js */
/* ── Cart State ── */
let cart = {};

/* ── Category Switch ── */
function setActiveCategory(el, catId) {
    // highlight tile
    document.querySelectorAll('.cat-tile').forEach(t => t.classList.remove('active'));
    el.classList.add('active');

    // show correct category content
    document.querySelectorAll('.cat-content').forEach(s => s.classList.remove('active'));
    const content = document.getElementById('cat-content-' + catId);
    if (content) content.classList.add('active');

    // show correct subcategory pill row
    document.querySelectorAll('.subcat-row').forEach(r => r.classList.remove('active'));
    const row = document.getElementById('subcat-row-' + catId);
    if (row) {
        row.classList.add('active');
        // auto-activate first pill
        const firstPill = row.querySelector('.subcat-pill');
        if (firstPill) {
            row.querySelectorAll('.subcat-pill').forEach(p => p.classList.remove('active'));
            firstPill.classList.add('active');
            // show first sub-panel of this category
            const firstSubId = firstPill.dataset.subId;
            showSubPanel(catId, firstSubId);
        }
    }
}

/* ── Subcategory Switch ── */
function setActiveSub(el, catId, subId) {
    // highlight pill
    const row = document.getElementById('subcat-row-' + catId);
    if (row) row.querySelectorAll('.subcat-pill').forEach(p => p.classList.remove('active'));
    el.classList.add('active');

    showSubPanel(catId, subId);
}

function showSubPanel(catId, subId) {
    // hide all sub-panels in this category
    const content = document.getElementById('cat-content-' + catId);
    if (content) {
        content.querySelectorAll('.sub-panel').forEach(p => p.classList.remove('active'));
        const panel = document.getElementById('sub-panel-' + subId);
        if (panel) panel.classList.add('active');
    }
}

const backToTopBtn = document.getElementById("backToTop");

window.onscroll = function() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        backToTopBtn.style.display = "flex";
    } else {
        backToTopBtn.style.display = "none";
    }
};

backToTopBtn.addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

/* ── Cart: Add ── */
function addToCart(id, name, price, image) {
    if (cart[id]) {
        cart[id].qty++;
    } else {
        cart[id] = { id, name, price: parseFloat(price), image, qty: 1 };
    }
    renderCart();
    updateAddBtn(id);
    showToast(name + ' added');
}

/* ── Cart: Remove ── */
function removeFromCart(id) {
    delete cart[id];
    renderCart();
    updateAddBtn(id);
}

/* ── Cart: Change Qty ── */
function changeQty(id, delta) {
    if (!cart[id]) return;
    cart[id].qty += delta;
    if (cart[id].qty <= 0) removeFromCart(id);
    else renderCart();
}

/* ── Cart: Clear ── */
function clearCart() {
    const ids = Object.keys(cart);
    cart = {};
    ids.forEach(id => updateAddBtn(id));
    renderCart();
}

/* ── Update Add Button ── */
function updateAddBtn(id) {
    const btn = document.getElementById('add-btn-' + id);
    if (!btn) return;
    if (cart[id]) {
        btn.classList.add('in-cart');
        btn.textContent = cart[id].qty;
    } else {
        btn.classList.remove('in-cart');
        btn.textContent = '+';
    }
}

/* ── Render Cart UI ──*/
function renderCart() {
    const items = Object.values(cart);
    const total = items.reduce((s, i) => s + i.price * i.qty, 0);
    const count = items.reduce((s, i) => s + i.qty, 0);

    // Badge
    const badge = document.getElementById('cartBadge');
    if (badge) {
        if (count > 0) {
            badge.style.display = 'flex';
            badge.textContent = count;
            badge.classList.remove('pop');
            void badge.offsetWidth;
            badge.classList.add('pop');
        } else {
            badge.style.display = 'none';
        }
    }

    // Empty / footer
    const emptyEl  = document.getElementById('cartEmpty');
    const footerEl = document.getElementById('cartFooter');
    if (emptyEl)  emptyEl.style.display  = items.length ? 'none'  : 'block';
    if (footerEl) footerEl.style.display = items.length ? 'block' : 'none';

    // Items list
    const list = document.getElementById('cartItemsList');
    if (list) {
        list.innerHTML = items.map(item => `
            <div class="cart-item">
                ${item.image
                    ? `<img src="${item.image}" alt="${esc(item.name)}" class="cart-item-img">`
                    : `<div class="cart-item-img-placeholder">🍽</div>`}
                <div class="cart-item-info">
                    <div class="cart-item-name">${esc(item.name)}</div>
                    <div class="cart-item-price">$${(item.price * item.qty).toFixed(2)}</div>
                </div>
                <div class="cart-item-controls">
                    <button class="qty-btn" onclick="changeQty(${item.id}, -1)">−</button>
                    <span class="qty-val">${item.qty}</span>
                    <button class="qty-btn" onclick="changeQty(${item.id}, 1)">+</button>
                </div>
            </div>
        `).join('');
    }

    // Total
    const totalEl = document.getElementById('cartTotal');
    const countEl = document.getElementById('cartItemsCount');
    if (totalEl) totalEl.textContent = '$' + total.toFixed(2);
    if (countEl) countEl.textContent = count + (count === 1 ? ' item' : ' items');
}

/* ── Open / Close Cart ── */
function openCart() {
    document.getElementById('cartDrawer').classList.add('open');
    document.getElementById('cartOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';
}
function closeCart() {
    document.getElementById('cartDrawer').classList.remove('open');
    document.getElementById('cartOverlay').classList.remove('open');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeCart(); });

/* ── Submit Order (stub) ── */

/* ── Toast ── */
let toastTimer;
function showToast(msg) {
    const t = document.getElementById('toast');
    if (!t) return;
    t.textContent = msg;
    t.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => t.classList.remove('show'), 2200);
}

/* ── Escape HTML ── */
function esc(str) {
    return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

/* ── Init: activate first category on load ── */
document.addEventListener('DOMContentLoaded', () => {
    const firstTile = document.querySelector('.cat-tile');
    if (firstTile) {
        const catId = firstTile.dataset.catId;
        setActiveCategory(firstTile, catId);
    }
});