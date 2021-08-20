async function addToCart(data) {
    try {
        $('.overlay').toggleClass('show');
        let response = await $.post('/add-cart', data);
        alert('Berhasil Menambahkan Ke Keranjang');
        window.location.reload();
    } catch (e) {
        if (e.status === 401) {
            alert('Silahkan Login Terlebih Dahulu');
        } else {
            alert('Gagal Menambahkan Ke Keranjang');
        }
    } finally {
        $('.overlay').toggleClass('show');
    }
}

async function getCartCount() {
    try {
        let response = await $.get('/ajax/countCart');
        $('#cart-item').html('<span >[ '+response+' ]</span> <span class="icon-shopping-cart"></span>');
        console.log(response)
    } catch (e) {
        alert('Gagal Menampilkan Data Keranjang');
    }
}

function formatUang(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}
