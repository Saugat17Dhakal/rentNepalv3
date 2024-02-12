    function handleProduct(action, id) {
        var confirmed = confirm("Are you sure you want to " + (action === 'book' ? 'book' : 'cancel') + " this product?");

        if (confirmed) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "handle_product.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert((action === 'book' ? 'Booked' : 'Cancelled') + " successfully!");
                        // Reload the page or update the UI as needed
                        location.reload();
                    } else {
                        alert("Failed to " + (action === 'book' ? 'book' : 'cancel') + " the product: " + response.message);
                    }
                }
            };

            var formData = new FormData();
            formData.append('action', action);

            if (action === 'book') {
                formData.append('product_id', id);
            } else if (action === 'cancel') {
                formData.append('order_id', id);
            }

            xhr.send(formData);
        }
    }
