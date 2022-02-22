$('#checkout').click(function(){
	let name = $('#name').val();
	let email = $('#email').val();
	let phone = $('#phone').val();
	let address = $('#address').val();

	// Send a POST request
	axios({
	  method: 'post',
	  url:'/cart/checkout',
	  data: {
	    name: name,
	    email: email,
	    phone: phone,
	    address: address,
	  }
	}).then(function (res) {
	    if (res.data.status === true) {
	    	alert('Ban da gui don hang thanh cong');
	    	window.location.reload(true);
	    }
	})
	  .catch(function (error) {
	    console.log(error);
	});
	})

$('.product-modal-detail').click(function(){
	let productId = $(this).data('id')
	
		// Send a POST request
	axios({
	  method: 'GET',
	  url:`/product/show/${productId}`, 
	}).then(function (res) {
	   $(`.modal`).html(res.data)
	})
	  .catch(function (error) {
	    console.log(error);
	});
	})


