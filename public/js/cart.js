
async function getLoggedCustomer() {
    try {
        const response = await fetch(`/customer/check`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // Se necessário
            }
        });

        const data = await response.json();

        if (data.success && data.customer_id) {
            console.log('Cliente logado:', data.customer_id);
            return data.customer_id;
        } else {
            console.warn('Nenhum cliente logado.');                      
        }
    } catch (error) {
        console.error('Erro ao verificar cliente logado:', error);
        return null;
    }
}

async function getCartQuantity(customerId) {
    try {
        const response = await fetch(`/cart/quantity/${customerId}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // Se necessário
            }
        });

        const data = await response.json();

        if (data.success) {
            return data.quantity ?? 0; // Retorna 0 se `quantity` for indefinido
        } else {
            alert('Erro ao obter a quantidade do carrinho.');
            window.location.href = '/cliente/login'; // Redireciona se necessário
            return 0;
        }
    } catch (error) {
        console.error('Erro:', error);
        return 0;
    }
}

async function updateCartQuantity() {
    const customerId = await getLoggedCustomer(); // Espera o customerId ser obtido
    if (customerId) {
        const quantity = await getCartQuantity(customerId); // Obtém a quantidade do carrinho
        console.log('Quantidade no carrinho:', quantity);
        let cart = document.querySelector('#cart');
        cart.innerHTML = quantity; // Atualiza a quantidade do carrinho na página inicial
        // Aqui você pode atualizar a UI com a quantidade
    } else {
        console.log('Nenhum cliente logado. Não é possível obter a quantidade do carrinho.');
    }
}

// Exemplo de uso:
updateCartQuantity(); // Chama a função para atualizar a quantidade do carrinho

let addCartBtns = document.querySelectorAll('.add-cart');


addCartBtns.forEach(button => {
    button.addEventListener('click', function (e) {
        const productId = e.target.id;
        const quantity = 1;        


        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // CSRF token necessário
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity,                
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Item adicionado ao carrinho!');
                    // Atualiza a quantidade no carrinho (opcional)
                    updateCartQuantity();
                } else {
                    alert('Erro ao adicionar item ao carrinho.');
                    window.location.href = '/cliente/login'; // 🔹 Redireciona o usuário para a página de login
                }
            })
            .catch(error => {
                console.error('Erro:', error);
            });

    });
});

function updateCart() {
    // Aqui você pode atualizar a UI do carrinho com a quantidade atualizada
    // Exemplo:
    fetch('/cart')
        .then(response => response.json())
        .then(data => {
            document.querySelector('#cart-quantity').innerText = data.cartItems.length;
        });
}
